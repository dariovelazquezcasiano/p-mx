param(
    [string] $BaseUrl = "http://localhost/demo2",
    [string] $Login = $env:PEAJE_SMOKE_LOGIN,
    [string] $Password = $env:PEAJE_SMOKE_PASSWORD,
    [string] $MysqlPath = "C:\xampp\mysql\bin\mysql.exe",
    [string] $Database = "demo",
    [string] $DbUser = "root",
    [string] $DbPassword = $env:PEAJE_DB_PASSWORD,
    [switch] $IncludeFilePdfChecks
)

$ErrorActionPreference = "Stop"

if ([string]::IsNullOrWhiteSpace($Login) -or [string]::IsNullOrEmpty($Password)) {
    throw "Indica -Login/-Password o define PEAJE_SMOKE_LOGIN y PEAJE_SMOKE_PASSWORD."
}

if (-not (Test-Path -LiteralPath $MysqlPath)) {
    throw "No existe MySQL en $MysqlPath."
}

function ConvertTo-QueryString([hashtable] $Values) {
    return (($Values.GetEnumerator() | Sort-Object Name | ForEach-Object {
        [uri]::EscapeDataString([string] $_.Key) + "=" + [uri]::EscapeDataString([string] $_.Value)
    }) -join "&")
}

function Get-HiddenInputValue([string] $Html, [string] $Name) {
    $pattern = '<input\b[^>]*\bname="' + [regex]::Escape($Name) + '"[^>]*\bvalue="([^"]*)"'
    $value = ""

    foreach ($match in [regex]::Matches($Html, $pattern, "IgnoreCase")) {
        if ($match.Groups[1].Value -ne "") {
            $value = [System.Net.WebUtility]::HtmlDecode($match.Groups[1].Value)
        }
    }

    return $value
}

function Invoke-MysqlQuery([string] $Sql) {
    $mysqlArgs = @("-u$DbUser", "-N", "-B")

    if (-not [string]::IsNullOrEmpty($DbPassword)) {
        $mysqlArgs += "-p$DbPassword"
    }

    $mysqlArgs += @($Database, "-e", $Sql)
    $output = & $MysqlPath @mysqlArgs

    if ($LASTEXITCODE -ne 0) {
        throw "La consulta MySQL fallo con codigo $LASTEXITCODE."
    }

    return $output
}

function Get-TurnoMuestra {
    $hasModoOperacionColumn = @(Invoke-MysqlQuery "SHOW COLUMNS FROM carril LIKE 'ModoOperacion'" | Where-Object {
        -not [string]::IsNullOrWhiteSpace($_)
    }).Count -gt 0
    $modoOperacionSql = "'ECT'"

    if ($hasModoOperacionColumn) {
        $modoOperacionSql = "COALESCE((SELECT c.ModoOperacion FROM carril c WHERE c.CasetaID = d.CasetaID AND c.CarrilID = d.CarrilID LIMIT 1), 'ECT')"
    }

    $sql = @"
SELECT
    d.CasetaID,
    d.FechaOperacion,
    d.TurnoID,
    d.CarrilID,
    d.Cuerpo,
    d.OperacionID,
    CONCAT(d.FechaOperacion,' ',d.HoraInicio) AS FHI,
    CONCAT(d.FechaFin,' ',d.HoraFin) AS FHF,
    COALESCE(d.FolioInicialEAP, 0) AS SecIni,
    COALESCE(d.FolioFinalEAP, 0) AS SecFin,
    COALESCE(d.IngresoELU_PRE, 0) AS IELUP,
    $modoOperacionSql AS ModoOperacion,
    (SELECT COUNT(*)
     FROM aforo a
     WHERE a.CasetaID = d.CasetaID
       AND a.FechaOperacion = d.FechaOperacion
       AND a.TurnoID = d.TurnoID
       AND a.CarrilID = d.CarrilID
       AND a.Cuerpo = d.Cuerpo
       AND a.OperacionID = d.OperacionID
       AND CONCAT(a.FechaTurno,' ',a.HoraEvento)
           BETWEEN CONCAT(d.FechaOperacion,' ',d.HoraInicio)
               AND CONCAT(d.FechaFin,' ',d.HoraFin)) AS AforoRows
FROM detalleturno d
ORDER BY AforoRows DESC, d.FechaOperacion DESC, d.TurnoID DESC, d.CarrilID ASC
LIMIT 1
"@

    $line = @(Invoke-MysqlQuery $sql | Where-Object { -not [string]::IsNullOrWhiteSpace($_) } | Select-Object -First 1)

    if ($line.Count -eq 0) {
        throw "No hay registros en detalleturno para armar el flujo."
    }

    $fields = [string] $line[0] -split "`t", 13

    if ($fields.Count -lt 13) {
        throw "La muestra de detalleturno no regreso las 13 columnas esperadas."
    }

    return [pscustomobject]@{
        CasetaID       = $fields[0]
        FechaOperacion = $fields[1]
        TurnoID        = $fields[2]
        CarrilID       = $fields[3]
        Cuerpo         = $fields[4]
        OperacionID    = $fields[5]
        FHI            = $fields[6]
        FHF            = $fields[7]
        SecIni         = $fields[8]
        SecFin         = $fields[9]
        IELUP          = $fields[10]
        ModoOperacion  = $fields[11]
        AforoRows      = $fields[12]
    }
}

function Test-HttpResponse([string] $Name, [string] $Url, $Session, [int] $MinBytes = 1, [string] $ExpectedContentType = "") {
    try {
        $sw = [Diagnostics.Stopwatch]::StartNew()
        $response = Invoke-WebRequest -Uri $Url -WebSession $Session -UseBasicParsing -TimeoutSec 30 -MaximumRedirection 5
        $sw.Stop()

        $body = [string] $response.Content
        $contentType = [string] $response.Headers["Content-Type"]
        $hasPhpError = $body -match "(?is)<b>\s*(Fatal error|Parse error|Warning|Notice|Deprecated)\b|^\s*(Fatal error|Parse error):"
        $hasInvalid = $body -match "Datos inv[aá]lidos|Variables no definidas|Undefined (variable|index|array key)"
        $hasExpectedContentType = [string]::IsNullOrWhiteSpace($ExpectedContentType) `
            -or ($contentType -match $ExpectedContentType) `
            -or ($body.StartsWith("%PDF") -and $ExpectedContentType -match "pdf")
        $ok = ($response.StatusCode -lt 400) `
            -and -not $hasPhpError `
            -and -not $hasInvalid `
            -and $hasExpectedContentType `
            -and ($body.Length -ge $MinBytes)

        if ($ok) {
            Write-Host ("OK   {0} {1,6} ms {2,7} bytes {3}" -f $response.StatusCode, $sw.ElapsedMilliseconds, $body.Length, $Name)
        }
        else {
            Write-Host ("FAIL {0} {1,6} ms {2,7} bytes {3}" -f $response.StatusCode, $sw.ElapsedMilliseconds, $body.Length, $Name)
            if (-not $hasExpectedContentType) {
                Write-Host ("INFO {0} Content-Type inesperado: {1}" -f $Name, $contentType)
            }
            $preview = ($body -replace "\s+", " ").Trim()
            if ($preview.Length -gt 1600) {
                $preview = $preview.Substring(0, 1600)
            }
            if ($preview.Length -gt 0 -and -not $body.StartsWith("%PDF")) {
                Write-Host ("INFO {0} Respuesta: {1}" -f $Name, $preview)
            }
        }

        return $ok
    }
    catch {
        Write-Host ("FAIL ---- {0} :: {1}" -f $Name, $_.Exception.Message)
        return $false
    }
}

function Invoke-Login($Session, [string] $Base) {
    $response = Invoke-WebRequest -Uri ($Base + "/acceso/") -WebSession $Session -UseBasicParsing -TimeoutSec 30
    $html = [string] $response.Content
    $scriptCaseInit = Get-HiddenInputValue $html "script_case_init"
    $csrfToken = Get-HiddenInputValue $html "csrf_token"

    if ([string]::IsNullOrWhiteSpace($scriptCaseInit) -or [string]::IsNullOrWhiteSpace($csrfToken)) {
        throw "No se pudo leer script_case_init o csrf_token desde acceso/."
    }

    $argsList = @($Login, $Password, "1", "", "", "", "", "", $scriptCaseInit, $csrfToken)
    $ajaxBody = "rs=ajax_seg_Login_submit_form&" + (($argsList | ForEach-Object {
        "rsargs[]=" + [uri]::EscapeDataString([string] $_)
    }) -join "&")

    $ajax = Invoke-WebRequest `
        -Uri ($Base + "/acceso/") `
        -Method Post `
        -Body $ajaxBody `
        -ContentType "application/x-www-form-urlencoded; charset=UTF-8" `
        -Headers @{ "X-Requested-With" = "XMLHttpRequest"; "Referer" = ($Base + "/acceso/") } `
        -WebSession $Session `
        -UseBasicParsing `
        -TimeoutSec 30

    $ajaxText = [string] $ajax.Content
    $resultOk = $ajaxText -match '(\\"result\\":\\"OK\\"|"result":"OK")'
    $hasLoginError = $ajaxText -match "errList.+geral_seg_Login|CSRF|lang_error_login|Error al iniciar"
    $hasMenuRedirect = $ajaxText -match "menu"

    if (-not $resultOk -or $hasLoginError -or -not $hasMenuRedirect) {
        throw "El login AJAX no devolvio una sesion valida."
    }

    Write-Host ("OK   200      - ms {0,7} bytes login_ajax" -f $ajaxText.Length)
    return $scriptCaseInit
}

$base = $BaseUrl.TrimEnd("/")
$session = New-Object Microsoft.PowerShell.Commands.WebRequestSession
$turno = Get-TurnoMuestra
$scriptCaseInit = Invoke-Login $session $base
$failed = $false

$modoOperacion = $turno.ModoOperacion.ToUpperInvariant()
if ($modoOperacion -ne "EAP") {
    $modoOperacion = "ECT"
}

$flowParams = @{
    NM_contr_var_session = "Yes"
    script_case_init = $scriptCaseInit
    CasetaID         = $turno.CasetaID
    FechaOperacion   = $turno.FechaOperacion
    TurnoID          = $turno.TurnoID
    CarrilID         = $turno.CarrilID
    Cuerpo           = $turno.Cuerpo
    OperacionID      = $turno.OperacionID
    FHI              = $turno.FHI
    FHF              = $turno.FHF
    modoOperacion    = $modoOperacion
    sqlmodoOperacion = $modoOperacion
    IELUP            = $turno.IELUP
    FechaAforo       = $turno.FechaOperacion
    CasetaAforo      = $turno.CasetaID
    Fecha            = $turno.FechaOperacion
    Caseta           = $turno.CasetaID
    Carril           = $turno.CarrilID
    ejesRemolque     = "0"
    modoImagen       = $modoOperacion
    Sec_iniL         = $turno.SecIni
    Sec_finL         = $turno.SecFin
    sm_global_login  = $Login
}

$queryString = ConvertTo-QueryString $flowParams
$pdfParams = @{
    NM_contr_var_session = "Yes"
    script_case_init     = $scriptCaseInit
    FechaOperacionDT     = $turno.FechaOperacion
    TurnoDT              = $turno.TurnoID
    CasetaDT             = $turno.CasetaID
    CarrilDT             = $turno.CarrilID
}
$pdfQueryString = ConvertTo-QueryString $pdfParams
$legacyPdfParams = @{
    NM_contr_var_session = "Yes"
    script_case_init     = $scriptCaseInit
    caseta               = $turno.CasetaID
    fecha_op             = $turno.FechaOperacion
    turno                = $turno.TurnoID
    carril               = $turno.CarrilID
}
$legacyPdfQueryString = ConvertTo-QueryString $legacyPdfParams

Write-Host ("INFO Turno Caseta={0} Fecha={1} Turno={2} Carril={3} Cuerpo={4} Operacion={5} AforoRows={6}" -f `
    $turno.CasetaID, $turno.FechaOperacion, $turno.TurnoID, $turno.CarrilID, $turno.Cuerpo, $turno.OperacionID, $turno.AforoRows)

$checks = @(
    @{ Name = "menu"; Url = $base + "/menu/?script_case_init=$scriptCaseInit"; MinBytes = 1000 },
    @{ Name = "grid_aforo"; Url = $base + "/grid_aforo/?script_case_init=$scriptCaseInit"; MinBytes = 1000 },
    @{ Name = "grid_trafico"; Url = $base + "/grid_trafico/?script_case_init=$scriptCaseInit"; MinBytes = 1000 },
    @{ Name = "grid_aforo_liquidacionCR"; Url = $base + "/grid_aforo_liquidacionCR/?$queryString"; MinBytes = 1000 },
    @{ Name = "aforo_liquidacion_vw"; Url = $base + "/aforo_liquidacion_vw/?$queryString"; MinBytes = 1000 },
    @{ Name = "form_aforo_liquidacionCR"; Url = $base + "/form_aforo_liquidacionCR/?$queryString"; MinBytes = 1000 },
    @{ Name = "form_aforo_liquidacionVW"; Url = $base + "/form_aforo_liquidacionVW/?$queryString"; MinBytes = 1000 },
    @{ Name = "grid_preliquidacion_fs"; Url = $base + "/grid_preliquidacion_fs/?$queryString"; MinBytes = 1000 },
    @{ Name = "grid_preliquidacion_fs_ok"; Url = $base + "/grid_preliquidacion_fs_ok/?$queryString"; MinBytes = 1000 },
    @{ Name = "grid_liquidacion_fs"; Url = $base + "/grid_liquidacion_fs/?$queryString"; MinBytes = 1000 },
    @{ Name = "grid_liquidacion_fs_v2"; Url = $base + "/grid_liquidacion_fs_v2/?$queryString"; MinBytes = 1000 },
    @{ Name = "grid_reversaliquidacion"; Url = $base + "/grid_reversaliquidacion/?$queryString"; MinBytes = 1000 },
    @{ Name = "Liquidacion"; Url = $base + "/Liquidacion/?$queryString"; MinBytes = 1000 },
    @{ Name = "LiquidacionPDF_gen"; Url = $base + "/LiquidacionPDF_gen/?$pdfQueryString"; MinBytes = 1000; ExpectedContentType = "pdf" },
    @{ Name = "PreliqPDF_genIL"; Url = $base + "/PreliqPDF_genIL/?$legacyPdfQueryString"; MinBytes = 1000; ExpectedContentType = "pdf" }
)

if ($IncludeFilePdfChecks) {
    $checks += @(
        @{ Name = "PreliqPDF_gen"; Url = $base + "/PreliqPDF_gen/?$legacyPdfQueryString"; MinBytes = 100 },
        @{ Name = "PreLiqPDF_new"; Url = $base + "/PreLiqPDF_new/?$legacyPdfQueryString"; MinBytes = 1000; ExpectedContentType = "pdf" }
    )
}
else {
    Write-Host "INFO Saltando PDFs que escriben archivos en C:/reportes. Usa -IncludeFilePdfChecks para incluirlos."
}

foreach ($check in $checks) {
    $expectedContentType = ""
    if ($check.ContainsKey("ExpectedContentType")) {
        $expectedContentType = $check.ExpectedContentType
    }

    if (-not (Test-HttpResponse $check.Name $check.Url $session $check.MinBytes $expectedContentType)) {
        $failed = $true
    }
}

$exportChecks = @(
    @{ Name = "grid_aforo_liquidacionCR_export_csv"; Grid = "grid_aforo_liquidacionCR"; Ctrl = "grid_aforo_liquidacionCR_export_ctrl.php" },
    @{ Name = "aforo_liquidacion_vw_export_csv"; Grid = "aforo_liquidacion_vw"; Ctrl = "aforo_liquidacion_vw_export_ctrl.php" }
)

foreach ($export in $exportChecks) {
    Invoke-WebRequest -Uri ($base + "/" + $export.Grid + "/?$queryString") -WebSession $session -UseBasicParsing -TimeoutSec 30 -MaximumRedirection 5 | Out-Null

    $body = @{
        script_case_init = $scriptCaseInit
        nmgp_opcao      = "csv"
        nm_delim_line   = "1"
        nm_delim_col    = "1"
        nm_delim_dados  = "1"
        nm_label_csv    = "N"
        SC_module_export = "grid"
        nmgp_password   = ""
    }

    try {
        $sw = [Diagnostics.Stopwatch]::StartNew()
        $response = Invoke-WebRequest `
            -Uri ($base + "/" + $export.Grid + "/" + $export.Ctrl) `
            -Method Post `
            -Body $body `
            -WebSession $session `
            -UseBasicParsing `
            -TimeoutSec 30 `
            -MaximumRedirection 5
        $sw.Stop()

        $html = [string] $response.Content
        $ok = ($response.StatusCode -lt 400) `
            -and ($html -match "<iframe") `
            -and -not ($html -match "(?is)<b>\s*(Fatal error|Parse error|Warning|Notice|Deprecated)\b|^\s*(Fatal error|Parse error):|Datos inv[aá]lidos")

        if ($ok) {
            Write-Host ("OK   {0} {1,6} ms {2,7} bytes {3}" -f $response.StatusCode, $sw.ElapsedMilliseconds, $html.Length, $export.Name)
        }
        else {
            Write-Host ("FAIL {0} {1,6} ms {2,7} bytes {3}" -f $response.StatusCode, $sw.ElapsedMilliseconds, $html.Length, $export.Name)
            $failed = $true
        }
    }
    catch {
        Write-Host ("FAIL ---- {0} :: {1}" -f $export.Name, $_.Exception.Message)
        $failed = $true
    }
}

if ($failed) {
    exit 1
}

exit 0
