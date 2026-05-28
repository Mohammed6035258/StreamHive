<?php include __DIR__ . '/../header.php'; ?>

<div class="container">
    <div class="upload-container" style="max-width: 600px; margin: 0 auto; background: var(--card-bg); padding: 30px; border-radius: 8px;">
        <h1 style="margin-bottom: 20px;">Video Uploaden</h1>
        
        <?php if (isset($error)): ?>
            <div style="background: rgba(229, 9, 20, 0.2); border: 1px solid #e50914; color: #ff6b6b; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form action="index.php?page=upload" method="POST" enctype="multipart/form-data">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Titel</label>
                <input type="text" name="title" required style="width: 100%; padding: 10px; background: #333; border: 1px solid var(--border-color); color: white; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Beschrijving</label>
                <textarea name="description" rows="4" style="width: 100%; padding: 10px; background: #333; border: 1px solid var(--border-color); color: white; border-radius: 4px;"></textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Video Bestand</label>
                <input type="file" name="video" accept="video/*" required>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 5px;">Thumbnail Afbeelding</label>
                <input type="file" name="thumbnail" accept="image/*" required>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%;">Upload Video</button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>