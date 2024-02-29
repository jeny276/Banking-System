<?php
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
 <?php require 'partials/_nav.php'?>
 <div class="container"  >
<h1 style ="diaplay: flex; flex-direction:column;align-item:center">Sign Up To Access Bank Service Online</h1>
<form action="/task/bank/signup.php" method="post" enctype="multipart/form-data">

</div>
  <div class="mb-3 col-md-6 p-2 ms-5">
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3 col-md-6 p-2 ms-5">
    <label  class="form-label">Username</label>
    <input type="text" class="form-control"  name="uname" aria-describedby="emailHelp" minlength="6" required >
   
  </div>
  <div class="mb-3 col-md-6 p-2 ms-5">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" minlength="4" >
  </div>
  <div class="mb-3 col-md-6 p-2 ms-5">
    <label for="Cpassword" class="form-label">confirm Password</label>
    <input type="password" class="form-control" id="Cpassword" name="Cpassword" minlength="4" >
    <div id="" class="form-text">Make Sure to type the same password</div>
  </div>
  <div class="mb-3 col-md-6 p-2 ms-5">
    <label for="phone" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone" minlength="6" maxlength="10">
  </div>
  <div class="mb-3 col-md-6 ms-5">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3 col-md-6 ms-5 d-flex">
                <p class="pe-3">Please select your Gender:</p>
                <div class="gender" >
                <input type="radio"  name="gender" value="Male" required >
                <label for="Male">Male</label>
               <input type="radio"  name="gender" value="Female" required>
               <label for="Female">Female</label></div>
               
</div>
<div class="mb-3 col-md-6 p-2 ms-5">
    <label for="photo" class="form-label">Photo</label>
    <input type="file" class="form-control" id="photo" name="photo">
   
  </div>
  <button type="submit" class="btn btn-primary ms-5 mt-2" name="submit">Sign up</button>

</form>
 </div>
 <?php

include("connection.php");
session_start();
if(isset($_POST['submit']))
{   
    
    $photo =$_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $folder="images/".$photo;
    // echo $folder;
    move_uploaded_file($photo_tmp,$folder);
    $name=$_POST['name'];
    $uname= $_POST['uname'];
    $pwd = $_POST['password'];
    $cpwd =$_POST['Cpassword'];
    $phone =$_POST['phone'];
    $email=$_POST['email'];
    $gender =$_POST['gender'];
    // $balance = $_POST['amount'];
    $_SESSION['amount'] = $balance ;
    $balance = 500;

    if($pwd==$cpwd && !empty($pwd) && !empty($cpwd)){

    }
    else{
       echo"<script>alert('Match password and confirm password');</script>";
       exit();
    }
    if(is_string($name)&&!is_numeric($name)&&!empty($name)){

    }
    else{
        echo"<script>alert('please enter valid name');</script>";
       exit(); 
    }
    if(is_numeric($phone)&&!empty($phone)){

    }
    else{
        echo"<script>alert('enter valid phone number');</script>";
        exit();
    }
    if(!empty($photo)){

    }
    else{
        echo"<script>alert('Please Select File');</script>";
        exit();
    }

     $sql = " INSERT INTO user_data (name, uname, password, phone, email,gender, photo,amount) VALUES ('$name', '$uname', '$pwd', '$phone', '$email', '$gender', '$photo','$balance')"; 
  

     if ($conn->query($sql) === TRUE) {
      echo"<script>alert('You Have Sign Up Successfully..');window.location='login.php';</script>";
      
        
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
}
?>
</body>


<script src="./js/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</html>