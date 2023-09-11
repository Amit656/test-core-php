<!-- Login page (login.php) -->

<?php
session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    // Redirect the user to the login page if not authenticated
    header('Location: index.php'); // Replace with your actual login page
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your login page content -->
</head>
<body>
    <h1>Welcome to Your Application</h1>
    <p>You are now logged in.</p>
    <!-- Your login form and user interface -->
</body>
</html>
