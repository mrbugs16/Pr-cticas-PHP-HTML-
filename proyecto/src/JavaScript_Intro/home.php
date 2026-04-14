<?php
// #region agent log
$debugPayload = json_encode([
    "sessionId" => "50b21a",
    "runId" => "pre-fix",
    "hypothesisId" => "H6",
    "location" => "home.php:php-entry",
    "message" => "home.php requested",
    "data" => [
        "request_uri" => $_SERVER["REQUEST_URI"] ?? "",
        "method" => $_SERVER["REQUEST_METHOD"] ?? ""
    ],
    "timestamp" => round(microtime(true) * 1000)
], JSON_UNESCAPED_SLASHES);
@file_put_contents("/Users/santiagotr/Documents/code/Pr-cticas-PHP-HTML-/.cursor/debug-50b21a.log", $debugPayload . PHP_EOL, FILE_APPEND);
// #endregion
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Intro</title>
</head>
<body>
    <h1>JavaScript Intro</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="tbl_datos"></tbody>
    </table>
    <script>
        // #region agent log
        fetch('http://127.0.0.1:7618/ingest/347d3c80-225e-4cd1-985f-3488c8ffb93a',{method:'POST',headers:{'Content-Type':'application/json','X-Debug-Session-Id':'50b21a'},body:JSON.stringify({sessionId:'50b21a',runId:'pre-fix',hypothesisId:'H1',location:'home.php:inline-script',message:'home.php loaded',data:{path:window.location.pathname,readyState:document.readyState},timestamp:Date.now()})}).catch(()=>{});
        window.addEventListener('error', function (event) {
            fetch('http://127.0.0.1:7618/ingest/347d3c80-225e-4cd1-985f-3488c8ffb93a',{method:'POST',headers:{'Content-Type':'application/json','X-Debug-Session-Id':'50b21a'},body:JSON.stringify({sessionId:'50b21a',runId:'pre-fix',hypothesisId:'H2',location:'home.php:window-error',message:'javascript runtime/parse error',data:{message:event.message,source:event.filename,line:event.lineno,column:event.colno},timestamp:Date.now()})}).catch(()=>{});
        });
        document.addEventListener('DOMContentLoaded', function () {
            var tableBody = document.getElementById('tbl_datos');
            fetch('http://127.0.0.1:7618/ingest/347d3c80-225e-4cd1-985f-3488c8ffb93a',{method:'POST',headers:{'Content-Type':'application/json','X-Debug-Session-Id':'50b21a'},body:JSON.stringify({sessionId:'50b21a',runId:'pre-fix',hypothesisId:'H3',location:'home.php:dom-content-loaded',message:'home table body presence',data:{tbl_datos_exists:!!tableBody},timestamp:Date.now()})}).catch(()=>{});
        });
        // #endregion
    </script>
    <script src="js/home.js"></script>
</body>
</html>