<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Database connection
    $con = new mysqli('localhost', 'root', '', 'register');

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Retrieving form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $complaint = $_POST['complaint'];

    // Insert query
    $sql = "INSERT INTO complaint (id, name, complaint) VALUES ('$id', '$name', '$complaint')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<p>Complaint registered. Click <a href='home.html'>here</a> to continue.</p>";
    } else {
        die("Error: " . mysqli_error($con));
    }

    // Close connection
    $con->close();
}
?>
