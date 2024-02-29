<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
 <?php require 'partials/_nav.php'?>
 <?php
 
 
 ?>
<div class="container">
<h1 style ="diaplay: flex; flex-direction:column;align-item:center">Sign Up To Access Bank Service Online</h1>
<form  action="" method="post" >
<div class="mb-3 col-md-6 p-2 ms-5">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="uname" required >
   
  </div>
<div class="mb-3 col-md-6 p-2 ms-5">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required >
</div>
<button type="submit" class="btn btn-primary ms-5 mt-2" name="submit">Login</button>


</form>
<form action="/task/bank/signup.php" method="post">
<button type="submit" class="btn btn-primary ms-5 mt-2"  name= "submit2"> Sign Up </button>
</form>

</div>
<?php
include("connection.php");
session_start();
if(isset($_POST['submit']))
{  
    $uname = $_POST['uname'];
    $pwd =$_POST['password'];

    $sql = "SELECT * FROM user_data WHERE uname='$uname' AND password ='$pwd'";
    $result = mysqli_query($conn,$sql);
    
    if($result->num_rows >0){
         $_SESSION['loggedin'] = true;
         $_SESSION['uname'] =$uname ;
         echo "<script>alert('Login successful..');window.location='welcome.php';</script>";
    }
    else{
       
         echo"<script>alert('Invalid Username Or Password');window.location='login.php';</script>";
        exit();
    }

   
}

    ?> 


</body>
<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</html>