<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <a href="user.php">Back to Users</a>

    <?php
    // Check if the user ID is provided in the URL
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Fetch user details based on the user ID from your database
        require 'db.php'; // Include your database connection file

        $sql = "SELECT * FROM user WHERE id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
    ?>
    <form method="post" action="update_user.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="text" name="password" value="<?php echo $user['password']; ?>" required>
        <br>
        <input type="submit" value="Update User">
    </form>
    <?php
        } else {
            echo "User not found.";
        }

        $conn->close();
    } else {
        echo "User ID not provided.";
    }
    ?>
</body>
</html>
