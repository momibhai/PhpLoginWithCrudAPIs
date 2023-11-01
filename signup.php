<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the form
    
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    $data = json_decode(file_get_contents('php://input'));
    $email = $data->email;
    $password = $data->password;

    // Perform validation (e.g., checking if the email already exists)

    // Insert user data into the database
    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'Sign-Up successful'));
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        echo json_encode(array('message' => 'Error!'));
    }
}

$conn->close();
?>
