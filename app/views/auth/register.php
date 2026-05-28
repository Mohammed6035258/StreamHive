<?php include __DIR__ . '/../header.php'; ?>

<div class="container">
    <div class="auth-container">
        <h1 style="margin-bottom: 20px; text-align: center;">Registreren</h1>
        <form action="index.php?page=register" method="POST">
            <label>E-mailadres</label>
            <input type="email" name="email" required placeholder="je@email.com">
            
            <label>Wachtwoord</label>
            <input type="password" name="password" required placeholder="Minimaal 8 tekens">
            
            <button type="submit" class="btn-primary" style="width: 100%;">Account aanmaken</button>
        </form>
        <p style="margin-top: 20px; text-align: center; color: var(--text-muted);">Heb je al een account? <a href="index.php?page=login" style="color: var(--accent-color);">Log hier in</a></p>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>