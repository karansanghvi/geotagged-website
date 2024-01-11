<?php
$login = FALSE;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../backend/dbconnect.php";
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $sql = "SELECT * from `users` where userEmail='$userEmail'";
    $result = mysqli_query($conn, $sql);
    $userData = mysqli_fetch_row($result);

    if (mysqli_num_rows($result) == 0) {
        $showError = "User does not exist";
        echo '<script>alert("This Email ID does not exist");</script>';
    } else if ($userData[5] != $userPassword) {
        $showError = "Incorrect Password";
        echo '<script>alert("Incorrect Password");</script>';
    } else {
        session_start();
        $_SESSION['firstName'] = $userData[1];
        $_SESSION['lastName'] = $userData[2];
        $_SESSION['userEmail'] = $userData[3];
        $_SESSION['userMobile'] = $userData[4];
        $_SESSION['userPassword'] = $userData[5];
        echo '<script>alert("login successful")</script>';
        header("location: ../pages/signup.php");

    }
}
?>
