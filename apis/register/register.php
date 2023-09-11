<?php
include_once '../filterRequest.php';
include_once '../../services/register/repositories/RegistrationRepository.php';
include_once '../../services/register/RegistrationService.php';
include_once __DIR__. '/../../connections/MySQLDatabase.php';

if (!$mysqlConnect) {
    die("Connection failed: " . mysqli_connect_error());
}

$repository = new RegistrationRepository($mysqlConnect);

// Initialize the registration service
$registrationService = new RegistrationService($repository);

if($registrationService->checkEmailExists($clean['email']) == true) {
    $response = array("success" => false, "message" => "Email Already Exists",'status' => 200);
}else{
    $userData = ["email" => $clean['email'], "password" => $clean['password']];

    $response = array("success" => false, "message" => "Registration failed!", 'status' => 500);
    // Call the registration service to register the user
    if($registrationService->registerUser($userData)){
        $response = array("success" => true, "message" => "Registration successful!",'status' => 200);
    }
}
    
// Send JSON response
header("Content-type: application/json");
echo json_encode($response);
exit();
?>
