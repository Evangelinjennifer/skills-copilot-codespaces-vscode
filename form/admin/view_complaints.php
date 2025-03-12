<!DOCTYPE html>
<ht lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
    <style>
      
/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #333;
}

/* Navigation Bar */
nav {
    background-color:#1eb0bb;
    overflow: hidden;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline-block;
    margin-right: 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    padding: 14px 20px;
    display: inline-block;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #575757;
    border-radius: 5px;
}

/* Manage Section */
.manage {
    margin: 20px;
    padding: 10px;
}

/* Main Content */
.main {
    max-width: 1000px;
    margin: 20px auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table th, table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color:#1eb0bb ;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

</style>
</head>
<body>
<div class="manage">
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
        </div>
        <div class="main">
      
        <h2>Complaint List</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Complaint</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "register";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM complaints ORDER BY name DESC";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["complaint"] . "</td>
                      </tr>";
            }
            $conn->close();
            ?>
             
        </table>
    
       
    </div></br></br>
   
 
</body>
        </div>

</html>
