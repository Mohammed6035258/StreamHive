<?php

require_once __DIR__ . '/../../core/Database.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getByVideo($videoId) {
        $sql = "SELECT * FROM comments WHERE video_id = ? ORDER BY created_at DESC";
        $stmt = $this->db->query($sql, [$videoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}