<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    require 'db.php';

    // Retrieve data from the request body
    $data = json_decode(file_get_contents("php://input"));

    // Check if the required data is present
    if (isset($data->id, $data->email, $data->password)) {
        $user_id = $data->id;
        $new_email = $data->email;
        $new_password = $data->password;

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE user SET email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_email, $new_password, $user_id);

        if ($stmt->execute()) {
            echo json_encode(array('message' => 'User updated successfully'));
        } else {
            echo json_encode(array('message' => 'Failed to update user'));
        }

        $stmt->close();
    } else {
        echo json_encode(array('message' => 'Incomplete data'));
    }

    $conn->close();
} else {
    echo json_encode(array('message' => 'Invalid request'));
}
?>
