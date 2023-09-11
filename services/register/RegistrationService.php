<?php

include_once __DIR__ .'/repositories/RegistrationRepository.php';
class RegistrationService {
    private $repository;

    public function __construct(RegistrationRepository $repository) {
        $this->repository = $repository;
    }

    public function registerUser(array $userData) {
        // Validate user data
        // Check if the username is already taken
        // Hash the password
        // Call the repository to create the user
        return $this->repository->create($userData);
    }

    public function checkEmailExists(string $email){
        return $this->repository->checkEmailExists($email);
    }
}

?>