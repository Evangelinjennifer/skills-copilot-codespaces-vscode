<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch complaints
$sql = "SELECT * FROM complaint ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Complaints</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <h2>Library Complaints</h2>
    <table border="1">
        <tr>
            
            <th>Name</th>
            <th>Complaint</th>
            <th>Submitted At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                     
                        <td>{$row['name']}</td>
                        <td>{$row['complaint']}</td>
                        <td>{$row['date']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No complaints found.</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
