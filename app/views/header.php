<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHive</title>
    <!-- Link naar je nieuwe styling -->
    <link rel="stylesheet" href="public/assets/style.css">
    <!-- FontAwesome voor iconen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button id="sidebar-toggle" class="sidebar-toggle" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
            <a href="index.php" class="logo">Stream<span>Hive</span></a>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="index.php?page=upload">Upload</a>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="index.php?page=logout">Logout</a>
            <?php else: ?>
                <a href="index.php?page=login">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="layout-wrapper">
        <aside class="sidebar" id="sidebar">
            <nav class="sidebar-nav">
                <a href="index.php" class="sidebar-item active">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <a href="#trending" class="sidebar-item">
                    <i class="fas fa-fire"></i>
                    <span>Trending</span>
                </a>
                <a href="#subscriptions" class="sidebar-item">
                    <i class="fas fa-star"></i>
                    <span>Abonnementen</span>
                </a>
                <a href="#library" class="sidebar-item">
                    <i class="fas fa-list"></i>
                    <span>Bibliotheek</span>
                </a>
                <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 1rem 0; opacity: 0.5;">
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="index.php?page=upload" class="sidebar-item">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Video Uploaden</span>
                    </a>
                    <a href="index.php?page=logout" class="sidebar-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Uitloggen</span>
                    </a>
                <?php else: ?>
                    <a href="index.php?page=login" class="sidebar-item">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Inloggen</span>
                    </a>
                    <a href="index.php?page=register" class="sidebar-item">
                        <i class="fas fa-user-plus"></i>
                        <span>Registreren</span>
                    </a>
                <?php endif; ?>
            </nav>
        </aside>

        <main class="main-content">