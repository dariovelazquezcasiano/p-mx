param(
    [string] $BaseUrl = "http://localhost/demo2"
)

$ErrorActionPreference = "Stop"

$paths = @(
    "/",
    "/acceso/",
    "/menu/",
    "/grid_aforo/",
    "/grid_trafico/",
    "/grid_aforo_liquidacionCR/",
    "/form_aforo_liquidacionCR/",
    "/form_aforo_liquidacionVW/",
    "/aforo_liquidacion_vw/",
    "/dashboard_liquidacionVW/",
    "/dashboard_panel/"
)

$base = $BaseUrl.TrimEnd("/")
$failed = $false

foreach ($path in $paths) {
    $url = $base + $path

    try {
        $response = Invoke-WebRequest -Uri $url -UseBasicParsing -TimeoutSec 20 -MaximumRedirection 5
        $body = [string] $response.Content
        $hasPhpError = $body -match "(?is)<b>\s*(Fatal error|Parse error|Warning|Notice|Deprecated)\b|^\s*(Fatal error|Parse error):"
        $ok = ($response.StatusCode -lt 400) -and -not $hasPhpError

        if ($ok) {
            Write-Host ("OK   {0} {1} bytes {2}" -f $response.StatusCode, $body.Length, $path)
        }
        else {
            $failed = $true
            Write-Host ("FAIL {0} {1} bytes {2}" -f $response.StatusCode, $body.Length, $path)
        }
    }
    catch {
        $failed = $true
        Write-Host ("FAIL ---- {0} :: {1}" -f $path, $_.Exception.Message)
    }
}

if ($failed) {
    exit 1
}

exit 0
