<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Deposite</title>
</head>
   <?php
   
    session_start();
    $_SESSION['isLoggedIn'] = true;
    require 'partials/_nav.php';
    require 'partials/_nav2.php';
    include("connection.php");
  
   
     date_default_timezone_set('Asia/Kolkata');


    if(!isset($_SESSION['uname'])){
        header("location: login.php"); 
        exit(); 
    }
    $uname = $_SESSION['uname'];
    $query = "SELECT * FROM user_data WHERE uname ='$uname'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if(isset($_POST['deposit'])) {
        $Damount = $_POST['Damount'];

        if($Damount <= 0){
           echo "<script>alert('Invalid deposite amount');window.location='deposite.php';</script>";
           exit();
        }
        else{
           $new_balance = $user['amount'] + $Damount;
           $update_query = "UPDATE user_data SET amount = $new_balance WHERE uname = '$uname'";
            mysqli_query($conn,$update_query);

     
        $timestamp = date("Y-m-d H:i:s");
        $insert_transaction_query = "INSERT INTO transaction (uname,dep_amount, timestamp) VALUES ('$uname', '$Damount', '$timestamp')";
        mysqli_query($conn, $insert_transaction_query);
        }
        echo "<script>alert('deposite successful');window.location='welcome.php';</script>";
        exit();
    }

 ?>

<body>
   <h1>Deposite Funds</h1>
   <form action="" method="post">
    <label for="amount">Amount</label>
    <input type="number" id="amount" name="Damount" required>
    <button type="submit" name="deposit">Deposit</button>
   </form> 
</body>
<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>   
</html>


