param(
    [string[]]$AppName = @(),
    [string]$MysqlPath = "C:\xampp\mysql\bin\mysql.exe",
    [string]$Database = "demo",
    [string]$User = "root",
    [string]$Password = ""
)

$ErrorActionPreference = "Stop"
$root = Resolve-Path (Join-Path $PSScriptRoot "..")
Set-Location $root

function Invoke-PeajeMysqlValue {
    param([string]$Sql)

    if (-not (Test-Path -LiteralPath $MysqlPath)) {
        return $null
    }

    $args = @("-N", "-B", "-u$User")
    if ($Password -ne "") {
        $args += "-p$Password"
    }
    $args += @($Database, "-e", $Sql)

    $result = & $MysqlPath @args 2>$null
    if ($LASTEXITCODE -ne 0) {
        return $null
    }

    if ($null -eq $result) {
        return $null
    }

    return (($result | Select-Object -First 1) -as [string]).Trim()
}

function Get-PeajeCodeReferenceCount {
    param([string]$Name)

    $pattern = "(^|[^A-Za-z0-9_])" + [regex]::Escape($Name) + "([^A-Za-z0-9_]|$)"
    $rgArgs = @(
        "-n",
        "-c",
        $pattern,
        "--glob",
        "index.php",
        "--glob",
        "*_grid.class.php",
        "--glob",
        "*_apl.php",
        "--glob",
        "!$Name/**",
        "--glob",
        "!_lib/**",
        "."
    )

    $refs = & rg @rgArgs 2>$null
    if ($LASTEXITCODE -eq 1) {
        return 0
    }
    if ($LASTEXITCODE -ne 0) {
        throw "rg failed while searching references for $Name"
    }

    $count = 0
    foreach ($line in @($refs)) {
        $value = ($line -split ":", 2)[-1]
        $number = 0
        if ([int]::TryParse($value, [ref]$number)) {
            $count += $number
        }
    }

    return $count
}

if ($AppName.Count -eq 0) {
    $AppName = Get-ChildItem -Directory |
        Where-Object {
            $_.Name -match '(_[0-9]+|_bkp|bkp|backup|nuevo|new|old|prueba|test)$' -or
            $_.Name -match '^(blank_[0-9]+|burbuja_[0-9]+)$'
        } |
        Select-Object -ExpandProperty Name
}

$AppName |
    Sort-Object -Unique |
    ForEach-Object {
        $name = $_
        $safeName = $name.Replace("'", "''")
        $inSegApps = Invoke-PeajeMysqlValue "SELECT COUNT(1) FROM seg_apps WHERE app_name = '$safeName';"
        $activeAccess = Invoke-PeajeMysqlValue "SELECT COALESCE(SUM(priv_access = 'Y'), 0) FROM seg_groups_apps WHERE app_name = '$safeName';"
        $referenceCount = Get-PeajeCodeReferenceCount $name

        $risk = "revisar"
        if (($activeAccess -eq "0" -or $null -eq $activeAccess) -and $referenceCount -eq 0) {
            $risk = "candidato_alto"
        } elseif ($referenceCount -eq 0) {
            $risk = "sin_referencias_codigo"
        } elseif ($activeAccess -eq "0" -or $null -eq $activeAccess) {
            $risk = "sin_acceso_activo"
        }

        [pscustomobject]@{
            AppName            = $name
            FolderExists       = Test-Path -LiteralPath (Join-Path $root $name)
            InSegApps          = $inSegApps
            ActiveAccessGroups = $activeAccess
            CodeReferences     = $referenceCount
            Risk               = $risk
        }
    } |
    Format-Table -AutoSize
