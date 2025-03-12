<?php
include 'config.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name=$_POST["name"];

    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Password validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash password before storing
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO sign (name,email, password) VALUES (?,?, ?)");
    $stmt->bind_param("sss", $name,$email, $hashed_password);
    
    if ($stmt->execute()) 
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Signup successful!'); window.location.href='login.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: " . $stmt->error . "');</script>";
        }
        
        $stmt->close();
        $conn->close();
    }

        ?>
        

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="sign.css">
    
</head>
<body>
<div class="signup-container">
    <h2>Signup</h2>
    <form method="POST" action="">
    <div class="form-group">
        Name:<input type="name" name="name" required><br>
        </div>
        <div class="form-group">
        Email: <input type="email" name="email" required><br>
        </div>
        <div class="form-group">
        Password: <input type="password" name="password" required><br>
        </div>
        <div class="form-group">
        Confirm Password: <input type="password" name="confirm_password" required><br>
        </div>
        <button type="submit" class="signup-btn">Sign Up</button>
    </form><br>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
