<?php
$conn = new mysqli("localhost", "root", "", "register");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM issued_books");

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>BOOK TAKEN</title>
    <link rel='stylesheet' href='manage.css'> <!-- Link to external CSS -->
</head>
<body>

   <div class='manage'>
     <nav>
        <ul>
            <li><a href='admin_dashboard.php'>Dashboard</a></li>
            
        </ul>
    </nav>
    </div>
    <div class='main'>
   
        <h2>Book taken list</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Selected Books</th>
            </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['issue_date']}</td>
            <td>{$row['return_date']}</td>
            <td>{$row['book_list']}</td>
          </tr>";
}

echo "    </table>
</body>
</html>";

$conn->close();
?>
