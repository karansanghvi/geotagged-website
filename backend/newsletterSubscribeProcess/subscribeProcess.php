<?php
session_start();
$response = array();
include "../dbconnect.php";

function checkUserSubscribed($conn, $userID) {
    $checkUserSQL = "SELECT * FROM `users` WHERE userID = '$userID' and is_subscribed = 1 ";
    $checkUser = mysqli_query($conn, $checkUserSQL);

    if($checkUser && mysqli_num_rows($checkUser) == 1){
        return true;
    }
    else{
        return false;
    }
}

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['userID'];
    if (!checkUserSubscribed($conn, $userID)) {
        $subscribeUserSQL = "UPDATE `users` SET `is_subscribed` = '1' WHERE userID = '$userID';";
        $result = mysqli_query($conn, $subscribeUserSQL);
        
        if ($result) {
            $_SESSION["is_Subscribed"] = 1;
            error_log("is_Subscribed set to 1");
            
            $response['success'] = true;
            $response['message'] = "User Subscribed";
        } else {
            $response['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $response['message'] = "User already Subscribed";
    }
    $response['sessionData'] = $_SESSION;
} 
else{
    $response['message'] = "User not logged in.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
