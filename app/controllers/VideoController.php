<?php

require_once __DIR__ . '/../models/Video.php';
require_once __DIR__ . '/../models/Comment.php';

class VideoController
{
    private $video;
    private $comment;

    public function __construct()
    {
        $this->video = new Video();
        $this->comment = new Comment();
    }

    public function home()
    {
        $videos = $this->video->getAll();

        require __DIR__ . '/../views/videos/home.php';
    }

    public function upload()
    {
        // Controleer of gebruiker ingelogd is
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';

            // Validatie
            if (empty($title)) {
                $error = 'Titel is verplicht';
                require __DIR__ . '/../views/videos/upload.php';
                return;
            }

            // Video bestand verwerken
            if (!isset($_FILES['video']) || $_FILES['video']['error'] !== UPLOAD_ERR_OK) {
                $error = 'Video bestand is verplicht of kon niet geüpload worden';
                require __DIR__ . '/../views/videos/upload.php';
                return;
            }

            $videoFile = $_FILES['video'];
            $videoFilename = uniqid() . '_' . time() . '.mp4';
            $videoPath = __DIR__ . '/../../public/uploads/' . $videoFilename;

            if (!move_uploaded_file($videoFile['tmp_name'], $videoPath)) {
                $error = 'Fout bij uploaden van videobestand';
                require __DIR__ . '/../views/videos/upload.php';
                return;
            }

            // Thumbnail bestand verwerken
            if (!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['error'] !== UPLOAD_ERR_OK) {
                @unlink($videoPath); // Verwijder video als thumbnail mislukt
                $error = 'Thumbnail afbeelding is verplicht of kon niet geüpload worden';
                require __DIR__ . '/../views/videos/upload.php';
                return;
            }

            $thumbFile = $_FILES['thumbnail'];
            $thumbExt = strtolower(pathinfo($thumbFile['name'], PATHINFO_EXTENSION));
            $thumbFilename = uniqid() . '_' . time() . '.' . $thumbExt;
            $thumbPath = __DIR__ . '/../../public/uploads/' . $thumbFilename;

            if (!move_uploaded_file($thumbFile['tmp_name'], $thumbPath)) {
                @unlink($videoPath); // Verwijder video als thumbnail mislukt
                $error = 'Fout bij uploaden van thumbnail';
                require __DIR__ . '/../views/videos/upload.php';
                return;
            }

            // Opslaan in database
            try {
                $this->video->create(
                    $_SESSION['user']['id'],
                    $title,
                    $description,
                    $videoFilename,
                    $thumbFilename
                );

                header('Location: index.php');
                exit;
            } catch (Exception $e) {
                @unlink($videoPath);
                @unlink($thumbPath);
                $error = 'Fout bij opslaan in database: ' . $e->getMessage();
                require __DIR__ . '/../views/videos/upload.php';
                return;
            }
        }

        require __DIR__ . '/../views/videos/upload.php';
    }

    public function detail($id)
    {
        $this->video->incrementViews($id);

        $video = $this->video->getById($id);

        $comments = $this->comment->getByVideo($id);

        require __DIR__ . '/../views/videos/detail.php';
    }
}