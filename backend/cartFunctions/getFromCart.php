<?php
session_start();
include "../dbconnect.php";

$userID = $_SESSION["userID"];
$sql = "SELECT * FROM `cart` WHERE userID='$userID'";
$result = mysqli_query($conn, $sql);

$response = array();

if ($result) {
    $cartItems = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cartItems[] = array(
            'name' => $row['productName'],
            'category' => $row['category'],
            'price' => $row['price'],
            'tinyImage' => $row['imageLink'],
            'quantity' => $row['quantity']
        );
    }

    $response['success'] = true;
    $response['cartItems'] = $cartItems;
} else {
    $response['success'] = false;
    $response['message'] = 'Failed to fetch cart items.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
