<?php include __DIR__ . '/../header.php'; ?>

<div class="container">
    <div class="video-player-container">
        <video controls poster="public/uploads/<?php echo htmlspecialchars($video['thumbnail']); ?>">
            <source src="public/uploads/<?php echo htmlspecialchars($video['filename']); ?>" type="video/mp4">
            Je browser ondersteunt deze video niet.
        </video>
    </div>

    <div class="video-info-detail">
        <h1 style="margin-bottom: 10px;"><?php echo htmlspecialchars($video['title']); ?></h1>
        <div style="color: var(--text-muted); margin-bottom: 20px;">
            <span><?php echo number_format($video['views']); ?> weergaven</span> • 
            <span>Gepubliceerd op <?php echo date('d-m-Y', strtotime($video['created_at'])); ?></span>
        </div>
        <hr style="border: 0; border-top: 1px solid var(--border-color); margin-bottom: 20px;">
        <p style="white-space: pre-wrap;"><?php echo htmlspecialchars($video['description']); ?></p>
    </div>

    <!-- Hier komen later de comments -->
</div>

<?php include __DIR__ . '/../footer.php'; ?>