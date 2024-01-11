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
  $sql = "INSERT INTO users (firstName, lastName, userEmail, userMobile, userPassword) 
          VALUES ('$firstName', '$lastName', '$userEmail', '$userMobile', '$userPassword')";

  $anotherUser = mysqli_query($conn, $emailSql);

  // if (empty($userEmail)) {
  //     $emailErr = "Email is required";
  // } else {
  //   if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
  //     $emailErr = "Invalid email format";
  //   }
  // }

  // if (empty($userPassword)) { 
  //     $passwordErr = "Password is required";
  // } else {
  //   if (strlen($userPassword) < 8) {
  //     $passwordErr = "Password must be at least 8 characters long";
  //   }
  // }

  if(mysqli_num_rows($anotherUser) > 0){
    $showError = "User already exists";
  } else {
    if($userPassword == $userConfirm){
      $result = mysqli_query($conn, $sql);
      header("location: ../pages/login.html");
    }
  }

}
?>