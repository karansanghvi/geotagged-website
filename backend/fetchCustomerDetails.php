<?php
session_start();
include 'dbconnect.php';
$response = array();

$userID = $_SESSION["userID"];

$sqlCustomerDetails = "SELECT * FROM `customerdetails` WHERE userID = '$userID'";
$resultCustomerDetails = mysqli_query($conn, $sqlCustomerDetails);

$sqlUsers = "SELECT * FROM `users` WHERE userID = '$userID'";
$resultUsers = mysqli_query($conn, $sqlUsers);

$cartSQL = "SELECT * from `cart` WHERE userID = '$userID'";
$resultCart = mysqli_query($conn,$cartSQL);

if ($resultCustomerDetails && $resultUsers && $resultCart) {
    $response['addressDetails'] = mysqli_fetch_assoc($resultCustomerDetails);
    $response['userDetails'] = mysqli_fetch_assoc($resultUsers);
    $cartItems = array();
    while ($row = mysqli_fetch_assoc($resultCart)) {
        $cartItems[] = array(
            'name' => $row['productName'],
            'category' => $row['category'],
            'price' => $row['price'],
            'tinyImage' => $row['imageLink'],
            'quantity' => $row['quantity']
        );
    }
    $response['cartItems'] = $cartItems;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
