<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $challenge['title'] ?> - Terminal</title>
    <style>
        :root {
            --neon-green: #39ff14;
            --dark-bg: #0d1117;
            --panel-bg: rgba(22, 27, 34, 0.9);
            --border-color: #30363d;
            --error-red: #ff4d4d;
            --hint-orange: #d97706;
        }

        body {
            margin: 0;
            background-color: var(--dark-bg);
            color: #e6edf3;
            font-family: 'Consolas', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: radial-gradient(circle at center, #1a202c 0%, #0d1117 100%);
        }

        .back-nav {
            position: fixed;
            top: 30px;
            left: 30px;
            color: #8b949e;
            text-decoration: none;
            font-size: 0.8rem;
            border: 1px solid #30363d;
            padding: 8px 15px;
            transition: all 0.3s;
        }

        .back-nav:hover {
            color: var(--neon-green);
            border-color: var(--neon-green);
        }

        .container {
            max-width: 1000px;
            width: 90%;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 2px; /* Créé un effet de ligne de séparation fine */
            background: var(--border-color);
            border: 1px solid var(--border-color);
            box-shadow: 0 25px 50px rgba(0,0,0,0.6);
        }

        /* Panneau Latéral (Visuel) */
        .side-panel {
            background: var(--panel-bg);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .side-panel img {
            width: 100%;
            border-radius: 2px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
        }

        .badge {
            background: rgba(57, 255, 20, 0.1);
            color: var(--neon-green);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.7rem;
            border: 1px solid var(--neon-green);
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Panneau de Contenu */
        .content-panel {
            background: var(--panel-bg);
            padding: 50px;
        }

        h1 {
            font-size: 1.8rem;
            margin: 0;
            letter-spacing: 2px;
        }

        .points {
            color: var(--neon-green);
            font-size: 0.9rem;
            margin: 10px 0 30px 0;
            opacity: 0.8;
        }

        .desc-text {
            line-height: 1.7;
            color: #8b949e;
            margin-bottom: 40px;
        }

        /* Bouton Lancement Mission */
        .btn-launch {
            display: block;
            text-align: center;
            border: 1px solid var(--neon-green);
            color: var(--neon-green);
            text-decoration: none;
            padding: 20px;
            font-weight: bold;
            letter-spacing: 2px;
            transition: all 0.3s;
            margin-bottom: 40px;
        }

        .btn-launch:hover {
            background: var(--neon-green);
            color: var(--dark-bg);
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.4);
        }

        /* Système de Hint */
        details {
            margin-bottom: 40px;
            border-left: 2px solid var(--hint-orange);
            background: rgba(217, 119, 6, 0.05);
        }

        summary {
            padding: 15px;
            cursor: pointer;
            color: var(--hint-orange);
            font-size: 0.8rem;
            outline: none;
        }

        .hint-content {
            padding: 0 15px 15px 15px;
            font-size: 0.85rem;
            color: #d1d5db;
        }

        /* Formulaire de Validation */
        .flag-zone {
            border-top: 1px solid var(--border-color);
            padding-top: 30px;
        }

        input[type="text"] {
            width: 100%;
            background: #0d1117;
            border: 1px solid var(--border-color);
            padding: 15px;
            color: var(--neon-green);
            font-family: 'Consolas', monospace;
            box-sizing: border-box;
            margin-bottom: 15px;
            outline: none;
        }

        .btn-validate {
            width: 100%;
            background: #238636;
            color: white;
            border: none;
            padding: 15px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
        }

        .btn-validate:hover { background: #2ea043; }

        .status-msg {
            margin-top: 15px;
            font-size: 0.8rem;
            padding: 10px;
            text-align: center;
        }

        .status-error { color: var(--error-red); border: 1px solid var(--error-red); }
        .status-success { color: var(--neon-green); border: 1px solid var(--neon-green); }

    </style>
</head>
<body>

<a href="/challenges" class="back-nav">_RETOUR_</a>

<div class="container">
    <div class="side-panel">
        <img src="<?= $challenge['picture'] ?>" alt="Data Visual">
        <span class="badge"><?= $challenge['category'] ?></span>
    </div>

    <div class="content-panel">
        <h1><?= $challenge['title'] ?></h1>
        <div class="points">// VALEUR_MISSION : <?= $challenge['points'] ?> PTS</div>

        <p class="desc-text">
            <?= $challenge['description'] ?>
        </p>

        <a href="<?= $challenge['slug'] ?>" class="btn-launch" target="_blank" rel="noopener noreferrer">
            ACCÉDER À L'INSTANCE
        </a>

        <details>
            <summary>DEMANDER UN INDICE_</summary>
            <div class="hint-content">
                <?= $challenge['hint'] ?>
            </div>
        </details>

        <div class="flag-zone">
            <div id="flag-message" class="flag-message"></div>
            
            <form id="flagForm" method="POST">
                <input type="text" id="flag" name="flag" placeholder="SAISIR LE FLAG (CTF{...})" required>
                <button type="submit" class="btn-validate">SOUMETTRE</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#flagForm').on('submit', function(e) {
                e.preventDefault();

                const flag = $('#flag').val();
                const challengeId = <?= (int)$challenge['id'] ?>; 

                $.ajax({
                    url: '/challenge/validateFlag',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ 
                        flag: flag,
                        challenge_id: challengeId
                    }),
                    success: function(response) {
                        if (response.success) {
                            $('#flag-message').html('<div class="status-msg status-success">BRAVOOO!!!!! ' + response.message + '</div>');
                        } else {
                            $('#flag-message').html('<div class="status-msg status-error">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr) {
                        const errorMsg = xhr.responseJSON ? xhr.responseJSON.error : 'Une erreur est survenue.';
                        $('#flag-message').html('<div class="status-msg status-error">' + errorMsg + '</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
