<?php
// Verwijder eventuele HTML-tags (zoals <html> of <link>) die hier boven stonden.
// Dit bestand mag alleen beginnen met <?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/VideoController.php';

$page = $_GET['page'] ?? 'home';

$authController = new AuthController();
$videoController = new VideoController();

switch ($page) {
    case 'login':
        $authController->login();
        break;

    case 'register':
        $authController->register();
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'upload':
        $videoController->upload();
        break;

    case 'detail':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $videoController->detail($id);
        } else {
            $videoController->home();
        }
        break;

    default:
        $videoController->home();
        break;
}
