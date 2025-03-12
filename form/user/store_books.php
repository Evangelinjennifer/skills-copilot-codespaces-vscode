
<!-- detail.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="store.css">
</head>
<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "register");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$issue_date = $_POST['issue_date'];
$return_date = $_POST['return_date'];
$selectedBooks = json_decode($_POST['selectedBooks'], true);

// Insert user details and selected books into the database
$stmt = $mysqli->prepare("INSERT INTO issued_books (name, email, issue_date, return_date, book_list) VALUES (?, ?, ?, ?, ?)");
$bookListString = implode(", ", $selectedBooks);
$stmt->bind_param("sssss", $name, $email, $issue_date, $return_date, $bookListString);
$stmt->execute();
$stmt->close();

// Display all details for the admin
echo "<h1> Summary Details</h1>";
echo "<div class='details-box'>";
echo "<p>Name: $name</p>";
echo "<p>Email: $email</p>";
echo "<p>Issue Date: $issue_date</p>";
echo "<p>Return Date: $return_date</p>";
echo "<p>Selected Books: $bookListString</p>";
echo "</div>";

echo "<div style='margin-top: 20px;'>";
echo "<button onclick='history.back()' style='padding: 10px 15px; font-size: 16px; cursor: pointer; margin-right: 10px;'>Go Back</button>";
echo "<a href='logout.php' style='text-decoration: none;'><button style='padding: 10px 15px; font-size: 16px; cursor: pointer; background-color: red; color: white; border: none;'>Logout</button></a>";
echo "</div>";
$mysqli->close();
?>
