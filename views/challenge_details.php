<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $challenge['title'] ?> - Terminal</title>
    <style>
    :root {
        --neon-blue: #00d4ff;
        --dark-bg: #050a14;
        --panel-bg: rgba(13, 22, 36, 0.95);
        --border-color: #1e3a5f;
        --error-red: #ff4d4d;
        --hint-purple: #a855f7; /* Changed orange to purple for better blue harmony */
        --success-blue: #0088ff;
    }

    body {
        margin: 0;
        background-color: var(--dark-bg);
        color: #e0f2ff;
        font-family: 'Consolas', monospace;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        /* Updated gradient to deep navy */
        background-image: radial-gradient(circle at center, #0a192f 0%, #050a14 100%);
    }

    .back-nav {
        position: fixed;
        top: 30px;
        left: 30px;
        color: #5c7b99;
        text-decoration: none;
        font-size: 0.8rem;
        border: 1px solid var(--border-color);
        padding: 8px 15px;
        transition: all 0.3s;
    }

    .back-nav:hover {
        color: var(--neon-blue);
        border-color: var(--neon-blue);
        box-shadow: 0 0 10px rgba(0, 212, 255, 0.2);
    }

    .container {
        max-width: 1000px;
        width: 90%;
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 2px;
        background: var(--border-color);
        border: 1px solid var(--border-color);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.8);
    }

    /* Side Panel */
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
        background: rgba(0, 212, 255, 0.1);
        color: var(--neon-blue);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.7rem;
        border: 1px solid var(--neon-blue);
        text-transform: uppercase;
        font-weight: bold;
    }

    /* Content Panel */
    .content-panel {
        background: var(--panel-bg);
        padding: 50px;
    }

    h1 {
        font-size: 1.8rem;
        margin: 0;
        letter-spacing: 2px;
        color: var(--neon-blue);
        text-shadow: 0 0 10px rgba(0, 212, 255, 0.3);
    }

    .points {
        color: var(--neon-blue);
        font-size: 0.9rem;
        margin: 10px 0 30px 0;
        opacity: 0.8;
    }

    .desc-text {
        line-height: 1.7;
        color: #8ab4d9;
        margin-bottom: 40px;
    }

    /* Mission Launch Button */
    .btn-launch {
        display: block;
        text-align: center;
        border: 1px solid var(--neon-blue);
        color: var(--neon-blue);
        text-decoration: none;
        padding: 20px;
        font-weight: bold;
        letter-spacing: 2px;
        transition: all 0.3s;
        margin-bottom: 40px;
    }

    .btn-launch:hover {
        background: var(--neon-blue);
        color: var(--dark-bg);
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.4);
    }

    /* Hint System */
    details {
        margin-bottom: 40px;
        border-left: 2px solid var(--hint-purple);
        background: rgba(168, 85, 247, 0.05);
    }

    summary {
        padding: 15px;
        cursor: pointer;
        color: var(--hint-purple);
        font-size: 0.8rem;
        outline: none;
    }

    .hint-content {
        padding: 0 15px 15px 15px;
        font-size: 0.85rem;
        color: #cbd5e1;
    }

    /* Validation Form */
    .flag-zone {
        border-top: 1px solid var(--border-color);
        padding-top: 30px;
    }

    input[type="text"] {
        width: 100%;
        background: #050a14;
        border: 1px solid var(--border-color);
        padding: 15px;
        color: var(--neon-blue);
        font-family: 'Consolas', monospace;
        box-sizing: border-box;
        margin-bottom: 15px;
        outline: none;
    }

    input[type="text"]:focus {
        border-color: var(--neon-blue);
    }

    .btn-validate {
        width: 100%;
        background: #1d4ed8; /* Stronger blue for validation */
        color: white;
        border: none;
        padding: 15px;
        font-weight: bold;
        cursor: pointer;
        text-transform: uppercase;
        transition: background 0.3s;
    }

    .btn-validate:hover { 
        background: #2563eb; 
    }

    .status-msg {
        margin-top: 15px;
        font-size: 0.8rem;
        padding: 10px;
        text-align: center;
    }

    .status-error { 
        color: var(--error-red); 
        border: 1px solid var(--error-red); 
    }
    
    .status-success { 
        color: var(--neon-blue); 
        border: 1px solid var(--neon-blue); 
        background: rgba(0, 212, 255, 0.05);
    }
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
                <input type="text" id="flag" name="flag" autocomplete="off" placeholder="SAISIR LE FLAG (CTF{...})" required>
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
