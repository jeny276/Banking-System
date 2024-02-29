

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <title>Transfer Funds</title>
</head>
 
   <?php
    session_start();
    
    include("connection.php");
   
    $_SESSION['isLoggedIn'] = true;
    require 'partials/_nav.php';
    require 'partials/_nav2.php';
    date_default_timezone_set('Asia/Kolkata');

    if(!isset($_SESSION['uname'])){
        header("location: login.php"); 
        exit(); 
    }
    $sender_username = $_SESSION['uname'];
    $query = "SELECT * FROM user_data WHERE uname ='$sender_username'";
    $result = mysqli_query($conn, $query);
    $sender_user = mysqli_fetch_assoc($result);

    if(isset($_POST['transfer'])){
        $amount = $_POST['amount'];
        $rec_username = $_POST['recipient'];

        $recipient_query = "SELECT * FROM user_data WHERE uname ='$rec_username'";
        $recipient_result = mysqli_query($conn, $recipient_query);
        if(mysqli_num_rows($recipient_result) == 0) {
            echo "<script>alert('Recipient username not found');window.location='transfer.php';</script>";
            exit();

    }
    if($Tamount <=0 && $sender_user['amount']< $amount){
        echo "<script>alert('Insufficient balance or invalid amount');window.location='transfer.php';</script>";
        exit();
    }

    $rec_user = mysqli_fetch_assoc($recipient_result);
    $new_sender_balance = $sender_user['amount'] - $amount;
    $new_recipient_balance = $rec_user['amount'] + $amount;

    $update_sender_query = "UPDATE user_data SET amount = $new_sender_balance WHERE  uname = '$sender_username'";
    mysqli_query($conn, $update_sender_query);

    $update_receiver_query ="UPDATE user_data SET amount = $new_recipient_balance WHERE uname = '$rec_username'";
    $timestamp = date("Y-m-d  H:i:s");

    $insert_sender_transaction_query = "INSERT INTO transaction (uname,sent_amount,timestamp,rec_name)VALUE ('$sender_username', '$amount','$timestamp','$rec_username' ) ";
    mysqli_query($conn, $insert_sender_transaction_query);

    $insert_receiver_transaction_query ="INSERT INTO transaction (uname,received_amount,timestamp,sender_name) VALUE('$rec_username' ,'$amount','$timestamp','$sender_username')";
    mysqli_query($conn, $insert_receiver_transaction_query);

    echo "<script>alert('Transfer successful');window.location='welcome.php'</script>";
    exit();

}
 ?>
 <body>
   <h1>Transfer Funds</h1>
   <form action="" method="post">
    <label for="amount">Amount</label>
    <input type="number" id="amount" name="amount" required>
    <label for="recipient">Recipient Username</label>
    <input type="text" id="recipient" name="recipient" required>
    <button type="submit" name="transfer">Transfer</button>
   </form>
</body>
<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>   
</html>

    
    
    
    
       

