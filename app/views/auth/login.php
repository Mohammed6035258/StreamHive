<?php include __DIR__ . '/../header.php'; ?>

<div class="container">
    <div class="auth-container">
        <h1 style="margin-bottom: 20px; text-align: center;">Inloggen</h1>
        <form action="index.php?page=login" method="POST">
            <label>E-mailadres</label>
            <input type="email" name="email" required placeholder="je@email.com">
            
            <label>Wachtwoord</label>
            <input type="password" name="password" required placeholder="••••••••">
            
            <button type="submit" class="btn-primary" style="width: 100%;">Inloggen</button>
        </form>
        <p style="margin-top: 20px; text-align: center; color: var(--text-muted);">Nog geen account? <a href="index.php?page=register" style="color: var(--accent-color);">Registreer hier</a></p>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>