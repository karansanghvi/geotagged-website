<?php
$emailErr = false;
$passwordErr = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  include "../backend/dbconnect.php";
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $userEmail = $_POST['userEmail'];
  $userMobile = $_POST['userMobile'];
  $userPassword = $_POST['userPassword'];
  $userConfirm = $_POST['confirmPassword'];

  $emailSql = "SELECT * FROM `users` WHERE userEmail ='$userEmail'"; 

  $existingUser = mysqli_query($conn, $emailSql);

  if(mysqli_num_rows($existingUser) > 0){
    $showError = "User already exists";
  }
  else{
    if($userPassword == $userConfirm)
    {
        $sql = "INSERT INTO users (firstName, lastName, userEmail, userMobile, userPassword) 
                VALUES ('$firstName', '$lastName', '$userEmail', '$userMobile', '$userPassword')";
        $result = mysqli_query($conn, $sql);
        header("location: ../pages/login.html");
    }
  }

}
?>