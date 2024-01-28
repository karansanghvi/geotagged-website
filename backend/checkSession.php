<?php
session_start();
include "dbconnect.php";
$response = array();

if(isset($_SESSION)){
    $response['sessionData'] = $_SESSION;
}

header('Content-Type: application/json');
echo json_encode($response);
?>