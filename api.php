<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = array('message' => 'Hello from your PHP API!');
    echo json_encode($data);
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Invalid HTTP method'));
}
?>
