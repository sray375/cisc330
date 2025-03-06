<?php

require_once 'PostsController.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET' && $requestUri === '/posts') {
    $controller = new PostsController();
    $controller->index();
    exit;
}

// Handle 404 Not Found
http_response_code(404);
echo json_encode(["error" => "Route not found"]);
