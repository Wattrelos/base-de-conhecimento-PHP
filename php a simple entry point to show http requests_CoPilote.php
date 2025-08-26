<?php
/*
Here's a simple PHP script that acts as an entry point to display HTTP request data in a readable format. This script will output details about the HTTP request, including headers, query parameters, POST data, and more.
*/
// Set content type for better readability
header('Content-Type: application/json');

// Get HTTP request method
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Get HTTP headers
$headers = getallheaders();

// Get query parameters
$queryParams = $_GET;

// Get POST data
$postData = file_get_contents('php://input');

// Prepare response array
$response = [
    'method' => $requestMethod,
    'headers' => $headers,
    'query_params' => $queryParams,
    'post_data' => json_decode($postData, true) ?? $postData, // Decode JSON if applicable
];

// Output the response as JSON
echo json_encode($response, JSON_PRETTY_PRINT);


/*
Usage

    Save this file as index.php in a directory accessible by your web server.
    Access the file via a browser or a tool like curl or Postman.
    You will see the details of the HTTP request, such as the method, headers, query parameters, and body.

Example

    GET Request: http://your-server/index.php?name=John&age=30
    Output:
*/


/*
//POST Request: Use Postman or curl:
curl -X POST http://your-server/index.php -H "Content-Type: application/json" -d '{"key":"value"}'
*/