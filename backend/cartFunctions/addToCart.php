<?php
session_start();
include "../dbconnect.php";

$response = array();

$productName = $_POST['productName'];
$category = $_POST['category'];
$price = $_POST['price'];
$tinyImage = $_POST['tinyImage'];
$userID = $_SESSION['userID'];

$checkSql = "SELECT * FROM carttable WHERE productName = '$productName' AND userID = '$userID'";
$checkResult = mysqli_query($conn, $checkSql);

if (mysqli_num_rows($checkResult) > 0) {
    $updateSql = "UPDATE carttable SET quantity = quantity + 1 WHERE productName = '$productName' AND userID = '$userID'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        $response['success'] = true;
        $response['message'] = "Quantity updated in cart successfully!";
        $response['sessionData'] = $_SESSION;
    } else {
        $response['success'] = false;
        $response['message'] = "Error updating quantity in cart.";
        $response['sessionData'] = $_SESSION;
    }
}else{
    $insertSql = "INSERT INTO carttable (productName, category, price, imageLink, userID, quantity) 
                  VALUES ('$productName', '$category', '$price', '$tinyImage', '$userID', 1)";
    $insertResult = mysqli_query($conn, $insertSql);

    if ($insertResult) {
        $response['success'] = true;
        $response['message'] = "Product added to cart successfully!";
    } else {
        $response['success'] = false;
        $response['message'] = "Error adding product to cart.";
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
