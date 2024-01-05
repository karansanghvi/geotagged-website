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
    }
  }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>

<div class="form">
  <div class="tab-content">
    <div id="signup">   
      <h1>Sign Up</h1>
      
      <form action="/pages/signup.php" method="post" onsubmit="return validateForm()">
        <div class="top-row">
          <div class="field-wrap">
            <label>
              First Name<span class="req">*</span>
            </label>
            <input type="text" name="firstName" required pattern="[A-Za-z]+" title="Only characters are allowed" autocomplete="off" />
          </div>
  
          <div class="field-wrap">
            <label>
              Last Name<span class="req">*</span>
            </label>
            <input type="text" name="lastName" required pattern="[A-Za-z]+" title="Only characters are allowed" autocomplete="off"/>
          </div>
        </div>

        <div class="field-wrap">
          <label>
            Email Address<span class="req">*</span>
          </label>
          <input type="email" name="userEmail" required autocomplete="off"/>
          
        </div>

        <div class="field-wrap">
          <label>
            Mobile Number<span class="req">*</span>
          </label>
          <input type="tel" name="userMobile" required autocomplete="off"/>
        </div>
        
        <div class="field-wrap">
          <label>
            Set Password<span class="req">*</span>
          </label>
          <input type="password" name="userPassword" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                 title="Password must be at least 8 characters long, including at least one uppercase letter, one lowercase letter, one number, and one special character."
                 autocomplete="off"/>
        </div>

        <div class="field-wrap">
          <label>
            Confirm Password<span class="req">*</span>
          </label>
          <input type="password" name="confirmPassword" required autocomplete="off"/>
        </div>
        
        <button type="submit" class="button button-block">Get Started</button>
      </form>

    </div>
  </div>
</div>

<script>
  function validateForm() {
    const firstName = document.querySelector('input[name="first-name"]').value.trim();
    const lastName = document.querySelector('input[name="last-name"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const mobileNumber = document.querySelector('input[name="mobile-number"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
    const confirmPassword = document.querySelector('input[name="confirm-password"]').value.trim();

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Invalid Email Address');
      return false;
    }

    const mobileRegex = /^\d{10}$/;
    if (!mobileRegex.test(mobileNumber)) {
      alert('Invalid Mobile Number');
      return false;
    }

    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
      alert('Invalid Password');
      return false;
    }

    if (password !== confirmPassword) {
      alert('Passwords do not match');
      return false;
    }

    return true;
  }
</script>

</body>
</html>