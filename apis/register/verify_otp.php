<?php
// OTP verification script (verify_otp.php)

$expectedOTP = "123456"; // Replace with the OTP sent to the user
$userOTP = $_POST['otp'];

if ($userOTP === $expectedOTP) {
    // OTP is valid, set a session variable or any other method to track the user's login status
    session_start();
    $_SESSION['authenticated'] = true;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid OTP']);
}


?>