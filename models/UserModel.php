<?php

class UserModel {

    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Alle users ophalen
    public function getUsers() {

        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Nieuwe user toevoegen
    public function createUser($email, $password, $role = 'user') {

        $query = "INSERT INTO " . $this->table . "
                  (email, password, role)
                  VALUES
                  (:email, :password, :role)";

        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}