<?php
$emailErr = false;
$passwordErr = false;
$showError = false;
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include "dbconnect.php";
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $userEmail = $_POST['email'];
    $userMobile = $_POST['mobile-number'];
    $userPassword = $_POST['password'];
    $userConfirm = $_POST['confirm-password'];

    $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
    if (!preg_match($emailRegex, $userEmail)) {
        $response['error'] = "Invalid Email Address";
    } else {
        $emailSql = "SELECT * FROM `user` WHERE userEmail ='$userEmail'"; 
        $existingUser = mysqli_query($conn, $emailSql);

        if (mysqli_num_rows($existingUser) > 0){
            $response['error'] = "User with this Email already exists";
        } else {
            $mobileRegex = '/^\d{10}$/';
            if (!preg_match($mobileRegex, $userMobile)) {
                $response['error'] = "Invalid Mobile Number";
            } else {
                $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
                if (!preg_match($passwordRegex, $userPassword)) {
                    $response['error'] = "Invalid Password";
                } else {
                    if($userPassword == $userConfirm) {
                        $sql = "INSERT INTO user (firstName, lastName, userEmail, userMobile, userPassword) 
                                VALUES ('$firstName', '$lastName', '$userEmail', '$userMobile', '$userPassword')";
                        $result = mysqli_query($conn, $sql);
                        $response['success'] = true;
                        header("location: ../login.html");
                    } else {
                        $response['error'] = "Passwords do not match";
                    }
                }
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
