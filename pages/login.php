<?php
$login = FALSE;
$showError = false;

if($_SERVER['REQUEST_METHOD']=="POST"){
  include "../backend/dbconnect.php";
  $userEmail = $_POST["userEmail"];
  $userPassword = $_POST["userPassword"];
  $sql = "SELECT * from `users` where userEmail='$userEmail'";
  $result = mysqli_query($conn,$sql);
  $userData = mysqli_fetch_row($result);

  if(mysqli_num_rows($result) == 0){
    $showError = "User does not exist";
    echo '<script>alert("This Email ID does not exist");</script>';
  }
  else if($userData[5] != $userPassword){
    $showError = "Incorrect Password";
    echo '<script>alert("Incorrect Password");</script>';
  }
  else{
    session_start();
    $_SESSION['firstName'] = $userData[1];
    $_SESSION['lastName'] = $userData[2];
    $_SESSION['userEmail'] = $userData[3];
    $_SESSION['userMobile'] = $userData[4];
    $_SESSION['userPassword'] = $userData[5];
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/80e7d0c422.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

  <div class="wrapper" >
    <form action="/pages/login.php" method="POST" onsubmit="return validateForm()">
      <h1>LOGIN</h1>
      <div class="input">
        <label for="email">Email:</label>
        <input type="email" id="email" name="userEmail" placeholder="Email">
        <i class='bx bxs-user-circle'></i>
      </div>
      <div class="input">
        <label for="password">Password:</label>
        <input type="password" id="password" name="userPassword" placeholder="Password">
        <i class='bx bxs-lock-alt'></i>
      </div>

      <div class="remember-me">
        <label><input type="checkbox">Remember me</label>
      </div>

      <a href="#">Forgot password?</a>
      <div class="input">
        <button type="submit">Login</button>
      </div>

      <div class="register-link">
        <p>Don't have an account? <a href="signup.php">Register</a></p>
      </div>
    </form>
  </div>

  <script>
    function validateForm(){
      const userEmail = document.querySelector('input[name="userEmail"]').value;
      const userPassword = document.querySelector('input[name="userPassword"]').value;

      if (userEmail === "" || userPassword === ""){
        alert("Please enter both email and password");
        return false;
      }
      return true;
    }
  </script>

</body>

</html>