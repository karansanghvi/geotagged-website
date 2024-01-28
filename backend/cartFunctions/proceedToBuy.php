<?php
session_start();
include "../dbconnect.php";
$response = array();

$userID = $_SESSION["userID"];

$sql = "SELECT * from `cart` where userID = '$userID'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){
    $response["message"] = "There are no items in Cart!";
}
else{
    $response["success"] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>