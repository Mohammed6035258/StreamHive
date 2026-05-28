<?php

require_once __DIR__ . '/../../core/Database.php';

class Video {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM videos ORDER BY created_at DESC", []);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM videos WHERE id = ?";
        $stmt = $this->db->query($sql, [$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userId, $title, $description, $filename, $thumbnail) {
        $sql = "INSERT INTO videos (user_id, title, description, filename, thumbnail) VALUES (?, ?, ?, ?, ?)";
        return $this->db->query($sql, [$userId, $title, $description, $filename, $thumbnail]);
    }

    public function incrementViews($id) {
        $sql = "UPDATE videos SET views = views + 1 WHERE id = ?";
        return $this->db->query($sql, [$id]);
    }
}