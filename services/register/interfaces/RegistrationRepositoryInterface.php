<?php
interface RegistrationRepositoryInterface {
    public function create(array $userData);
    public function findByUsername(string $username);
    public function checkEmailExists(string $email);
    // Add other methods as needed
}


?>