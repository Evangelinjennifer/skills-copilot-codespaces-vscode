<?php
$servername = "localhost";  // Change if needed
$username = "root";         // Change to your MySQL username
$password = "";             // Change to your MySQL password
$database = "register";      // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$complaint = $_POST['complaint'];
$date=$_POST['date'];

// Insert into the 'complaint' table
$sql = "INSERT INTO complaint (name, complaint,date) VALUES ('$name','$complaint','$date' )";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $complaint,$date);

if ($stmt->execute()) {
    echo "<script>alert('Complaint submitted successfully!'); window.location.href='comp.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
