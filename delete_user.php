<?php
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    require 'db.php'; // Include your database connection file

    // Delete the user from the database
    $sql = "DELETE FROM user WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'User deleted successfully'));
    } else {
        echo json_encode(array('message' => 'Error deleting user: ' . $conn->error));
    }

    $conn->close();
}
?>
