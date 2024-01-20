<?php
$login = FALSE;
$showError = false;
$response = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "dbconnect.php";
    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];
    $sql = "SELECT * from `users` where userEmail='$userEmail'";
    $result = mysqli_query($conn, $sql);
    $userData = mysqli_fetch_row($result);

    if (mysqli_num_rows($result) == 0) {
        $response['error'] = "User with this Email doesn't exist";
    } else if ($userData[5] != $userPassword) {
        $response['error'] = "Incorrect Password";
    } else {
        session_start();
        $_SESSION['userID'] = $userData[0];
        $_SESSION['firstName'] = $userData[1];
        $_SESSION['lastName'] = $userData[2];
        $_SESSION['userEmail'] = $userData[3];
        $_SESSION['userMobile'] = $userData[4];
        $_SESSION['userPassword'] = $userData[5];
        $_SESSION['loggedIn'] = true;
        $response['success'] = true;
        $response['sessionData'] = $_SESSION;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
