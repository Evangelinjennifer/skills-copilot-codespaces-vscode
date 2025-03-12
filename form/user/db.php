<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container p {
            color: #1eb0bb;
        }
        .container a {
            color: #1eb0bb;
            text-decoration: none;
        }
        .container a:hover {
            text-decoration: underline;
        }
        .alert {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
 $name=$_POST['name'];
 $email=$_POST['mail'];
 $password=$_POST['pass'];
 $conpassword=$_POST['con_pass'];
 
}
$con=new mysqli('localhost','root','','config_db');
if($con){
    //echo"connection success";
    $sql="insert into sign(name,mob,mail,pass,con_pass)values('$name','$mobile','$email','$password','$conpassword')";
    $result=mysqli_query($con,$sql);
    if($result){
        if($result){
            echo "<p>Registered successfully. Click <a href='home.html'>here</a> to continue.</p>";
        }
        echo '</body></html>';
    }else{
        die(mysqli_error($con));
    }
}
else{
    die(mysqli_error($con));
}

?>
