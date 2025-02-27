<?php

include 'inclass13.html';

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $clients = [
        [
            'name' => 'Pinecone',
            'age' => 12
        ],
        [
            'name' => 'Matilda',
            'age' => 6
        ]
    ];

    echo json_encode($clients);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}
?>
