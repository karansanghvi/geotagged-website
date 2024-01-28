<?php
session_start();
include "../dbconnect.php";
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];
        $userID = $_SESSION["userID"];
        $quantity = $_POST['quantity'];
        
        $sql = "UPDATE cart SET quantity = quantity + '$quantity' WHERE productName = '$productName' AND userID = '$userID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Quantity Updated';
            $sql = "SELECT `quantity` FROM cart WHERE productName = '$productName' AND userID = '$userID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $newQuantity = $row['quantity'];
            
                $response['success'] = true;
                $response['newQuantity'] = $newQuantity;
                $response['message'] = 'Quantity updated successfully.';
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to update quantity.';
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed to remove item from cart.';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'productName not set in POST data.';
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method. Use POST.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>