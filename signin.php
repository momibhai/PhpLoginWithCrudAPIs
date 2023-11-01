<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the request
    $data = json_decode(file_get_contents('php://input'));
    $email = $data->email;
    $password = $data->password;

    // Check if the provided email and password match a record in the database
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo json_encode(array('message' => 'Sign-in successful'));
    } else {
        echo json_encode(array('error' => 'Invalid email or password'));
    }
}

$conn->close();
?>
