<?php
include 'config.php';

// Read the JSON data from the POST request
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$name = $obj['name'];
$email = $obj['email'];
$password = $obj['password'];

if ($obj['email'] != "") {
    $result = $mysqli->query("SELECT * FROM users where email='$email'");
    if ($result->num_rows > 0) {
        echo json_encode('Email already exists');
    } else {
        $add = $mysqli->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        if ($add) {
            echo json_encode('User Registered Successfully');
        } else {
            echo json_encode('Check internet connection');
        }
    }
} else {
    echo json_encode('Try again');
}
?>
