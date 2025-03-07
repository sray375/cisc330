<?php
//associative array
$person = [
    "name" => "Lana Del Rey",
    "age" => 39,
    "email" => "lana@honeymoon.com",
    "country" => "USA"
];

//loop through the array and echo key-value pairs
foreach ($person as $key => $value) {
    echo ucfirst($key) . ": " . $value . "<br>";
}

//function with required features
function greetUser(string $name, string $greeting = "Hello"): string {
    return "$greeting, $name!";
}

//call function with correct types
echo greetUser("Sandhya") . "<br>"; // Uses default greeting
echo greetUser("Sarah", "Hi") . "<br>"; // Uses custom greeting
?>
