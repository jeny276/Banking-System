<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>


<?php
 
session_start();
$_SESSION['isLoggedIn'] = true;
require 'partials/_nav.php';
require 'partials/_nav2.php';
include("connection.php");
if(!isset($_SESSION['uname'])){
    header("location: login.php"); 
    exit(); 
}
$uname = $_SESSION['uname'];
$sql = "SELECT amount FROM user_data WHERE uname = '$uname'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$account_balance = $user['amount'];
echo "<h3>your account balance is $account_balance </h3>";
?>

</body>
<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>   
</html>