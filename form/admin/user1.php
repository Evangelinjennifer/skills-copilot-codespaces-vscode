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
    $bk_name =$_POST['bk_name'];

    // Set registration date to current timestamp
    $issue_date = date('Y-m-d H:i:s ');
$return_date = date('Y-m-d H:i:s', strtotime('+5 days'));

    
    $sql = "INSERT INTO book (name,email,bk_name,issue_date,return_date ) VALUES ('$name', '$email','$bk_name', '$issue_date','$return_date')";
    if ($conn->query($sql) === TRUE) {
        echo "New book issued successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update a user
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $name = $_POST['name'];

 $bk_name =$_POST['bk_name'];
;

    $sql = "UPDATE book SET name='$name', email='$email',bk_name='$bk_name' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo " updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete a user
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM book WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue book</title>
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
    text-align: center;
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
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form input[type="text"],
form input[type="email"],
form input[type="number"],
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

form input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #0073e6;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    font-weight: bold;
    border-radius: 5px;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
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

/* Drop-down Styling */
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #fff;
    appearance: none;
    background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"%3E%3Cpolygon points="5,8 10,13 15,8" fill="%23333"/%3E%3C/svg%3E');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 10px;
    transition: border-color 0.3s ease;
}

select:hover {
    border-color: #777;
}

select:focus {
    outline: none;
    border-color: #0056b3;
}

    </style>
</head>
<body>
<center>
<h2>Issue book</h2>


<h3>Add </h3>
<form method="post">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required> 
<select name="bk_name" required>
    <option value="" disabled selected>Select a book</option> <!-- Placeholder option -->
    <option value="The Elements of Computing Systems">The Elements of Computing Systems</option>
    <option value="Introduction to the Theory of Computation">Introduction to the Theory of Computation</option>
    <option value="Artificial Intelligence: A Modern Approach">Artificial Intelligence: A Modern Approach</option>
    <option value="Clean Code: A Handbook of Agile Software Craftsmanship">Clean Code: A Handbook of Agile Software Craftsmanship</option>
    <option value="Design Patterns: Elements of Reusable Object-Oriented Softwar">Design Patterns: Elements of Reusable Object-Oriented Softwar</option>
    <option value="Introduction to Algorithms">Introduction to Algorithms</option>
    <option value="The Pragmatic Programmer">The Pragmatic Programmer</option>
    <option value="The Mythical Man-Month: Essays on Software Engineering">The Mythical Man-Month: Essays on Software Engineering</option>
    <option value="Code Complete: A Practical Handbook of Software Construction">Code Complete: A Practical Handbook of Software Construction</option>
    <option value="Computer Networking: A Top-Down Approach">Computer Networking: A Top-Down Approach</option>
    <option value="Operating System Concepts">Operating System Concepts</option>
    <option value="Computer Vision: Algorithms and Applications">Computer Vision: Algorithms and Applications</option>
    <option value="Artificial Intelligence: Foundations of Computational Agents">Artificial Intelligence: Foundations of Computational Agents</option>
    <option value="The Art of Computer Programming">The Art of Computer Programming</option>
    <option value=";Cryptography and Network Security">;Cryptography and Network Security</option>
    <option value="Computer Architecture: A Quantitative Approach">Computer Architecture: A Quantitative Approach</option>
    <option value="The C Programming Language">The C Programming Language</option>
    <option value="Modern Operating Systems">Modern Operating Systems</option>
    <option value="Introduction to the Theory of Computation">Introduction to the Theory of Computation</option>
     <!-- Add more options as needed -->
</select></br>

</br> <input type="submit" name="add" value="Add to table">
</form>

<h3>Update </h3>
<form method="post">
    ID: <input type="number" name="id" required>
    New Name: <input type="text" name="name" required>
    New Email: <input type="email" name="email" required>
New  book Name: <input type="text" name="bk_name" required>

    <input type="submit" name="update" value="Update ">
</form>


<h3>Delete </h3>
<form method="post">
    ID: <input type="number" name="id" required>
    <input type="submit" name="delete" value="Delete ">
</form>


<h3>Issued book List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Book Name</th>
        <th>Issued Date</th>
        <th>Return Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['bk_name']}</td>
                    <td>{$row['issue_date']}</td>
                    <td>{$row['return_date']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No books issued</td></tr>";
    }
    ?>
</table>
</center>

<li><a href="admin_dashboard.php">GO BACK </a></li>

</body>
</html>

