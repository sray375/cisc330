<?php

//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?'); 

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);

if ($uri === '/html') {
    header("Content-Type: text/html");
    echo "<html>
            <head><title>HTML</title></head>
            <body>
                <h1>This is an HTML page</h1>
                <p>Outputting HTML</p>
            </body>
          </html>";
    exit();
}

if ($uri === '/json') {
    header("Content-Type: application/json");
    $data = [
        'message' => 'This is a JSON response',
        'status" => "success'
    ];
    echo json_encode($data);
    exit();
}

?>
