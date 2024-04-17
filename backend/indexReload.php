<?php
session_start();
$response = array();
include "dbconnect.php";

if(isset($_SESSION["userID"])){
    $userID = $_SESSION['userID'];
    $checkUserSQL = "SELECT * FROM `user` WHERE userID = '$userID'";
    $checkUser = mysqli_query($conn, $checkUserSQL);
    $userData = mysqli_fetch_row($checkUser);
    $_SESSION['userID'] = $userData[0];
    $_SESSION['firstName'] = $userData[1];
    $_SESSION['lastName'] = $userData[2];
    $_SESSION['userEmail'] = $userData[3];
    $_SESSION['userMobile'] = $userData[4];
    $_SESSION['userPassword'] = $userData[5];
    $_SESSION['is_Subscribed'] = $userData[6];
    $_SESSION['loggedIn'] = true;
    
    $isLoggedIn = $_SESSION['loggedIn'];  
    $response['is_Subscribed'] = $userData[6];
    $response['sessionData'] = $_SESSION;
    $response['isLoggedIn'] = $isLoggedIn;
}
else{
    $response['isLoggedIn'] = False;
}


header('Content-Type: application/json');
echo json_encode($response);
?>
