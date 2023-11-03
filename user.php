<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>
    <h2>User Management</h2>
    <a href="signup.html">Add User</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <!-- Fetch and display user data here -->
        <?php
require 'db.php'; // Include your database connection file

// Query to retrieve user data
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo '<td>
                <a href="edit_user.php?id=' . $row["id"] . '">Edit</a> |
                <a href="delete_user.php?id=' . $row["id"] . '">Delete</a>
              </td>';
        echo "</tr>";
    }
} else {
    echo "No users found";
}

$conn->close();
?>

    </table>
</body>
</html>
