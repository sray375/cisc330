<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the request
    $data = json_decode(file_get_contents("php://input"), true);

    $name = isset($data['name']) && !empty($data['name']) ? $data['name'] : "Anonymous";
    $animal = isset($data['animal']) && !empty($data['animal']) ? $data['animal'] : "Unknown";

    $response = [
        'message' => "Form submitted successfully! Hello, $name! Your favorite animal is $animal.",
        'received_name' => $name,
        'received_animal' => $animal
    ];

    echo json_encode($response);
    exit();
}

echo json_encode(['error' => 'Invalid request method. Use POST.']);
exit();
?>
