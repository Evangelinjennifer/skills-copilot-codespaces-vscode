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
        body {
        background-image: url('library.jpg');
        background-size: cover; /* Ensures the image covers the full page */
        background-position: center; /* Centers the image */
        background-repeat: no-repeat; /* Prevents tiling */
        height: 100vh;  /* Green gradient background */
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
            color: green;
        }
        .container a {
            color: #3498db;
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
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    $con = new mysqli('localhost', 'root', '', '');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

  
    
    $email=$_POST['mail'];
    $password=$_POST['pass'];
   }
   $con=new mysqli('localhost','root','','config_db');
   if($con){
    
       $sql="insert into sign1(mail,pass)values('$email','$password')";
       $result=mysqli_query($con,$sql);
       if($result){
           if($result){
               echo "<p> login done. Click <a href='home.html'>here</a> to continue.</p>";
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