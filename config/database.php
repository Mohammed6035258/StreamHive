<?php

class Database {

    private $host = 'localhost';
    private $db_name = 'StreamHive';
    private $username = 'root';
    private $password = '';

    public $conn;

    public function connect() {

        $this->conn = null;

        try {

            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );

            // Errors tonen
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Verbonden met database <br>";

        } catch(PDOException $e) {

            echo "Connectie mislukt: " . $e->getMessage();
        }

        return $this->conn;
    }
}