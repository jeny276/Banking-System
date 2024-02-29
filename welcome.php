<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
 <?php
 include("connection.php");
 session_start();
require 'partials/_nav.php';
  ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li>
        <?php
$uname = $_SESSION['uname'];
    $query = "SELECT * FROM user_data WHERE uname ='$uname'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && isset($user['photo'])) {
    
     $photo_path = $user['photo'];
      //  echo" $photo_path";

      echo "<img src='images/$photo_path' alt='User Photo'  width='50px' height='50px'>";
     
   
  } else {
    
      echo "<img src='images/socialV.png' alt='Default Photo' width='50px' height='50px'>";
  }

?>
</li>
        <li class="nav-item">
          <a class="nav-link active" href="deposite.php">deposite</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="withdraw.php">withdraw</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="total.php">Check Balance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transaction_history.php">Transaction History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transfer.php">Transfer Money</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<?php
echo"<h3>welcome," .$_SESSION['uname'].".</h3>"; 
?>
</body>
<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</html>