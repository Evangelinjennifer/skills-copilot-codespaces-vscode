<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register"; // Change this to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add a user
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Set registration date to current timestamp
    $registration_date = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO user (name, email, registration_date) VALUES ('$name', '$email', '$registration_date')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update a user
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE user SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete a user
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM user WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <center>
    <title>Manage Users</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f9f9f9;
    padding: 20px;
    color: #333;
}

 h3 {
    color: #2c3e50;
    margin-bottom: 15px;
}
h2 {
    font-size: 28px;
    font-weight: bold;
    color: #0073e6;
    text-align: center;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    border-bottom: 3px solid #0073e6;
    display: inline-block;
    padding-bottom: 5px;
}

form {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 900px;
}

form input[type="text"],
form input[type="email"],
form input[type="number"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

form input[type="submit"] {
    background-color: #1e90ff;
    color: white;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    font-weight: bold;
}

form input[type="submit"]:hover {
    background-color: #0073e6;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #0073e6;
    color: white;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e9f5ff;
}

li {
    list-style: none;
    margin: 15px 0;
    text-align: center;
}

a {
    text-decoration: none;
    color: #0073e6;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
}


    </style>
</head>
<body>

<h2>Manage Users</h2>


<h3>Add User</h3>
<form method="post">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    <input type="submit" name="add" value="Add User">
</form>

<h3>Update User</h3>
<form method="post">
    ID: <input type="number" name="id" required>
    New Name: <input type="text" name="name" required>
    New Email: <input type="email" name="email" required>
    <input type="submit" name="update" value="Update User">
</form>


<h3>Delete User</h3>
<form method="post">
    ID: <input type="number" name="id" required>
    <input type="submit" name="delete" value="Delete User">
</form>


<h3>User List</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Date</th>
    </tr>
    </center>

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
<li><a href="admin_dashboard.php">GO BACK </a></li>

</body>
</html>

