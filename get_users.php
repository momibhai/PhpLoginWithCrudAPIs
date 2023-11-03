<?php
// include 'db.php'; // Include your database connection configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'uniexpo';

$mysqli = new mysqli($host, $username, $password, $database);
// Query to retrieve user data
$sql = "SELECT * FROM user";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $users = array();

    while ($row = $result->fetch_assoc()) {
        // Create an associative array for each user
        $user = array(
            'id' => $row['id'],
            'email' => $row['email'],
            'password' => $row['password'],
            // Add more fields if needed
        );

        // Add the user data to the users array
        $users[] = $user;
    }

    // Encode the array as JSON and send the response
    echo json_encode($users);
} else {
    // No users found
    echo json_encode('No users found');
}

$mysqli->close(); // Close the database connection
?>
