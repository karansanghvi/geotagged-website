<?php
session_start();
include "dbconnect.php";
$response = array();

$userID = $_SESSION["userID"];
$sql = "SELECT * FROM `customerDetail` where userID='$userID'";
$result = mysqli_query($conn,$sql);
$detailsRow = mysqli_fetch_assoc($result);

if($detailsRow){
    $response["customerDetails"] = $detailsRow;
    $response["found"] = true;
}
else{
    $response["found"] = false;
    $response["error"] = mysqli_error($conn);
}



header('Content-Type: application/json');
echo json_encode($response);
?>