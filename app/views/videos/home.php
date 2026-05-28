<?php include __DIR__ . '/../header.php'; ?>

<div class="container">
    <h2 style="margin-bottom: 20px;">Aanbevolen voor jou</h2>

    <div class="video-grid">
        <?php foreach ($videos as $video): ?>
            <a href="index.php?page=detail&id=<?php echo $video['id']; ?>" class="video-card" style="text-decoration: none; color: inherit;">
                <img src="public/uploads/<?php echo htmlspecialchars($video['thumbnail']); ?>" alt="<?php echo htmlspecialchars($video['title']); ?>" class="thumbnail">
                <div class="video-info">
                    <h3 class="video-title"><?php echo htmlspecialchars($video['title']); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">
                        <?php echo number_format($video['views']); ?> weergaven
                    </p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>