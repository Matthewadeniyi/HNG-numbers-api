<?php

header("Access-Control-Allow-Origin: *"); // Enable CORS
header("Content-Type: application/json"); // Set JSON response type

// To check if 'number' parameter is present in the request
if (!isset($_GET['number'])) {
    http_response_code(400);
    echo json_encode([
        "number" => "alphabet", 
        "error" => true
    ]);
    exit;
}

$number = intval($_GET['number']);

// Function to check if a number is prime
function is_prime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i === 0) return false;
    }
    return true;
}

// Function to check if a number is a perfect number
function is_perfect($num) {
    if ($num < 1) return false;
    $sum = 0;
    for ($i = 1; $i < $num; $i++) {
        if ($num % $i === 0) $sum += $i;
    }
    return $sum === $num;
}

// Function to check if a number is an Armstrong number
function is_armstrong($num) {
    $sum = 0;
    $digits = str_split(strval($num));
    $power = count($digits);
    foreach ($digits as $digit) {
        $sum += pow(intval($digit), $power);
    }
    return $sum === $num;
}

// Function to get the sum of digits
function digit_sum($num) {
    return array_sum(str_split(strval($num)));
}

// Determine the properties of the number
$properties = [];
if (is_armstrong($number)) {
    $properties[] = "armstrong";
}
$properties[] = ($number % 2 === 0) ? "even" : "odd";

// Fetch a fun fact from Numbers API
$fun_fact = file_get_contents("http://numbersapi.com/$number?json");
$fun_fact_data = json_decode($fun_fact, true);
$fun_fact_text = $fun_fact_data["text"] ?? "No fact available";

// JSON Response
$response = [
    "number" => $number,
    "is_prime" => is_prime($number),
    "is_perfect" => is_perfect($number),
    "properties" => $properties,
    "digit_sum" => digit_sum($number),
    "fun_fact" => $fun_fact_text
];

echo json_encode($response);
