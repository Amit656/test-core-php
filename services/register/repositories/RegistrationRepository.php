<?php
include_once __DIR__ .'/../interfaces/RegistrationRepositoryInterface.php';


class RegistrationRepository implements RegistrationRepositoryInterface {

    private $mysqlConnect;

    public function __construct($mysqlConnect){
        $this->mysqlConnect = $mysqlConnect;
    }
    // Implement the methods defined in the interface
    public function create(array $userData) {
        // Check the connection
        $sql = "INSERT INTO users (email, password) VALUES ('".$userData["email"]."', '".sha1($userData["password"])."')";
        // Logic to insert user data into MySQL database
        return mysqli_query($this->mysqlConnect->connection, $sql);
    }

    public function findByUsername(string $username) {
        // Logic to retrieve user data by username from MySQL database
    }
    // Implement other methods

    public function checkEmailExists(string $email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->mysqlConnect->connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            // Email does not exist
            return true;
        }

    }
}


?>