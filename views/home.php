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
        <form action="" method="" class="loginForm" id="loginForm">
            <label for="nickname">Nom de code :</label>
            <input type="text" id="nickname" name="nickname" placeholder="Entrez votre pseudo" required autocomplete="off">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                const nickname = $('#nickname').val();

                $.ajax({
                    url: '/api/login',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ nickname: nickname }),
                    success: function(response) {
                        if (response.success) {
                            window.location.href = "/challenges";
                        } else {
                            $('#messageBox').html('<p class="error-message">' + response.message + '</p>');
                        }
                    },
                    error: function(xhr) {
                        const errorMsg = xhr.responseJSON ? xhr.responseJSON.error : 'Une erreur est survenue.';
                        $('#messageBox').html('<p class="error-message">' + errorMsg + '</p>');
                    }
                });
            });
        });
    </script>
</html>
