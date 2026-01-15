<?php
$target = 100000;
$current_clicks = isset($_GET['clicks']) ? (int)$_GET['clicks'] : 0;
$flag = "CTF{U4L_M4N1PUL4T10N_15_K3Y}";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mission : Endurance</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        body {
            background-color: #0d1117;
            color: #e6edf3;
            font-family: 'Consolas', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .challenge-container {
            text-align: center;
            background: #161b22;
            border: 2px solid #30363d;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.1);
        }

        .counter {
            font-size: 4rem;
            color: #39ff14;
            margin: 20px 0;
            text-shadow: 0 0 10px rgba(57, 255, 20, 0.5);
        }

        .btn-click {
            background: transparent;
            border: 2px solid #39ff14;
            color: #39ff14;
            padding: 20px 40px;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.2s;
        }

        .btn-click:active {
            transform: scale(0.95);
            background: rgba(57, 255, 20, 0.1);
        }

        .success-box {
            border: 2px dashed #39ff14;
            padding: 20px;
            margin-top: 20px;
            background: rgba(57, 255, 20, 0.05);
        }

        .back-link {
            position: fixed;
            top: 20px;
            left: 20px;
            color: #8b949e;
            text-decoration: none;
        }
    </style>
</head>
<body>

<a href="/challenges" class="back-link"><-- Annuler la mission</a>

<div class="challenge-container">
    <h1>MISSION : CLIC_FORCE</h1>
    <p>Atteignez <strong><?= number_format($target, 0, '.', ' ') ?></strong> clics pour débloquer le mot de passe.</p>

    <div class="counter" id="display-counter"><?= $current_clicks ?></div>

    <?php if ($current_clicks >= $target): ?>
        <div class="success-box">
            <h2 style="color: #39ff14;">ACCÈS AUTORISÉ</h2>
            <p>Voici votre récompense : <br><strong><?= $flag ?></strong></p>
        </div>
    <?php else: ?>
        <button class="btn-click" onclick="incrementClicks()">CLIQUER</button>
    <?php endif; ?>
</div>

<script>
    function incrementClicks() {
        let params = new URLSearchParams(window.location.search);
        let clicks = parseInt(params.get('clicks')) || 0;
        clicks++;
        window.location.search = `clicks=${clicks}`;
    }
</script>

</body>
</html>