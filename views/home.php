<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF - Page d'Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Bienvenue, Agent !</h1>
        <p>Ton intelligence sera mise à l'épreuve.</p>
    </header>

    <main>
        <form action="/login" method="POST">
            <label for="username">Nom de code :</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre pseudo" required autocomplete="off">
            <button type="submit">Commencer la mission</button>
        </form>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
            echo '<p class="error-message">Nom de code inconnu ou invalide.</p>';
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2025 Opération Chimère</p>
    </footer>
</div>
</body>
</html>