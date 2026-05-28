<?php

require_once __DIR__ . '/../../core/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        return $this->db->query($sql, [$email, $hash]);
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->query($sql, [$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}