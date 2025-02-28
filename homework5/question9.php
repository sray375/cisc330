<?php
header('Content-Type: application/json');

// Sample data about cats
$data = [
    ["name" => "Persian Cat", "price" => "$1,200"],
    ["name" => "Maine Coon", "price" => "$1,500"],
    ["name" => "Siamese Cat", "price" => "$900"],
    ["name" => "Bengal Cat", "price" => "$2,000"]
];

// Check if it's a GET request to return cat data
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode($data);
    exit;
}

// Handle POST request (Simulating form submission success response)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = ["message" => "Form submitted successfully! Cats are awesome!"];
    echo json_encode($response);
    exit;
}
?>
