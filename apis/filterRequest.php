<?php

// Check if the request method is POST and content type is JSON
if (($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') && 
    stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    
    // Get the raw JSON data from the request body
    $jsonData = file_get_contents('php://input');

    // Parse the JSON data into a PHP associative array
    $clean = json_decode($jsonData, true);
    
    if ($clean === null) {
        // JSON data parsing failed
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Invalid JSON data']);
        exit;
    }
} else {
    // Invalid request method or content type
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid request']);
    exit();
}
?>
