<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    
<?php

session_start();
require 'partials/_nav.php';
$_SESSION['isLoggedIn'] = true;
include("connection.php");
require 'partials/_nav2.php';

date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['uname'])){
    header("location: login.php"); 
    exit(); 
}
$uname = $_SESSION['uname'];
$sql = "SELECT * FROM transaction WHERE uname = '$uname'";
$result = mysqli_query($conn, $sql);
if (!$result){
    echo "Error Fetching Transaction History :";
}else{
    if(mysqli_num_rows($result)>0){
        echo "<h2>Transaction History</h2>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Withdraw Amount</th>";
        echo "<th>Deposit Amount</th>";
        echo "<th>Username</th>";
        echo "<th>Sender Name</th>";
        echo "<th>Receiver Name</th>";
        echo "<th>Sent Amount</th>";
        echo "<th>Received Amount</th>";
        echo "<th>Timestamp</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            
            $timestamp = strtotime($row['timestamp']);
            $ist_timestamp = date('Y-m-d H:i:s', $timestamp);
            echo "<tr>";
            echo "<td>" . $row['with_amount'] . "</td>";
            echo "<td>" . $row['dep_amount'] . "</td>";
            echo "<td>" . $row['uname'] . "</td>";
            echo "<td>" . $row['sender_name'] . "</td>";
            echo "<td>" . $row['rec_name'] . "</td>";
            echo "<td>" . $row['sent_amount'] . "</td>";
            echo "<td>" . $row['received_amount'] . "</td>";
            echo "<td>" . $ist_timestamp . "</td>";
            echo "</tr>";
        }  
        echo "</tbody>";
        echo "</table>";
    }
    else {
        echo "No transaction history available.";
    }
}

?>
</body>
<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>   
</html>
