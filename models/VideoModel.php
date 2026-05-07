<?php

class VideoModel {

    private $conn;
    private $table = 'videos';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Alle videos ophalen
    public function getVideos() {

        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Nieuwe video toevoegen
    public function createVideo($user_id, $title, $description, $category) {

        $query = "INSERT INTO " . $this->table . "
                  (user_id, title, description, category)
                  VALUES
                  (:user_id, :title, :description, :category)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}