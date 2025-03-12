<?php
include 'config.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user from database
    $stmt = $conn->prepare("SELECT password FROM sign WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            echo "<script type='text/javascript'>alert('login successful!'); window.location.href='home.html';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Invalid email or password');window.location.href='login.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('User not found');window.location.href='signup.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="log.css"> <!-- Add your CSS file -->
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="form-group">
                Email: <input type="email" name="email" required><br>
            </div>
            <div class="form-group">
                Password: <input type="password" name="password" required><br>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form><br>
        <p>Don't have an account? <a href="signup.php">Signup</a></p>
    </div>
</body>
</html>
