<?php
session_start();
include "../dbconnect.php";

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];
        $userID = $_SESSION["userID"];
        
        $sql = "DELETE FROM `carttable` WHERE userID='$userID' AND productName='$productName'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Item removed from cart successfully.';
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
