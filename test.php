<?php

require_once 'config/Database.php';
require_once 'models/UserModel.php';
require_once 'models/VideoModel.php';

// Database verbinding
$database = new Database();
$db = $database->connect();

// Models maken
$userModel = new UserModel($db);
$videoModel = new VideoModel($db);

echo "Verbonden met database <br>";