<?php
session_start();
$response = array();
include "dbconnect.php";
$response['is_Subscribed'] = $_SESSION["is_Subscribed"];

header('Content-Type: application/json');
echo json_encode($response);
?>
