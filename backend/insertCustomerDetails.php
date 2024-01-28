<?php
session_start();
include "dbconnect.php";
$response = array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userPincode = $_POST['userPincode'];
    $userFlat = $_POST['userFlat'];
    $userBuilding = $_POST['userBuilding'];
    $userArea = $_POST['userArea'];
    $userLandmark = $_POST['userLandmark'];
    $userID = $_SESSION['userID'];

    $sql = "INSERT INTO customerdetails(userID,pincode,flatHouseNo,building,area,landmark) 
            values ('$userID','$userPincode','$userFlat','$userBuilding','$userArea','$userLandmark')";
    $result = mysqli_query($conn, $sql);

    if($result){
        $response["message"]="success";
    }
    else{
        $response["error"]=true;
        $response["message"]="fail";
    }
}


header('Content-Type: application/json');
echo json_encode($response);
?>