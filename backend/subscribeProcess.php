<?php
session_start();
$response = array();
include "dbconnect.php";

function checkUserSubscribed($conn, $userID) {
    $checkUserSQL = "SELECT * FROM `subscribedusers` WHERE userID = '$userID'";
    $checkUser = mysqli_query($conn, $checkUserSQL);

    if ($checkUser && mysqli_num_rows($checkUser) > 0) {
        return true;
    } else {
        return false;
    }
}

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['userID'];
    $response['sessionData'] = $_SESSION;

    if (!checkUserSubscribed($conn, $userID)) {
        $subscribeUserSQL = "INSERT INTO subscribedusers (userID) VALUES ('$userID')";
        $result = mysqli_query($conn, $subscribeUserSQL);

        if ($result) {
            $response['success'] = true;
        } else {
            $response['error'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $response['error'] = "User Subscribed";
    }
} else {
    $response['error'] = "User not logged in.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
