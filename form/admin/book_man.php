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
$sql = "SELECT * FROM Book"; // Make sure your table name is correct
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
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
        <h2>Issued book List</h2>
        
        <!-- Display User Table -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Book Name</th> <!-- Corrected here -->
                <th>Issued Date</th>
                <th>Return Date</th>
            </tr>

            <?php
            // Check if there are any users to display
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["id"]) . "</td>
                            <td>" . htmlspecialchars($row["name"]) . "</td>
                            <td>" . htmlspecialchars($row["email"]) . "</td>
                            <td>" . htmlspecialchars($row["bk_name"]) . "</td>
                            <td>" . htmlspecialchars($row["issue_date"]) . "</td>
                            <td>" . htmlspecialchars($row["return_date"]) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No users found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
