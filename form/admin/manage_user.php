<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register"; // Update to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from the database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="manage.css"> <!-- Link to external CSS for styling -->
</head>
<body>
    <div class="manage">

<nav>
    <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        
    </ul>
</nav>
</div>

<div class="main">
    <h2>User List</h2>
    
    <!-- Display User Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registration Date</th>
        </tr>
        

        <?php
        // Check if there are any users to display
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["email"]. "</td>
                        <td>" . $row["registration_date"]. "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</div>

</body>
</html>
