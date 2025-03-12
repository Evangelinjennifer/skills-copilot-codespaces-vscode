<?php
$servername = "localhost"; // Change if using a remote database
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$database = "register"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
