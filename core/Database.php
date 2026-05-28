<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/config.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        $this->pdo = new PDO($dsn, $config['username'], $config['password']);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }
}