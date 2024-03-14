<?php
include "dbconnect.php";

$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

header('Content-Type: application/json');
echo json_encode($rows);
?>
