<?php
$decrypted_flag = "";
$error = "";

// Traitement du formulaire de validation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flag_input'])) {
    if (trim($_POST['flag_input']) === 'TopSecretProjectChimera2012') {
        $decrypted_flag = "ORDRE CONFIRMÉ : ACCÈS AU SECTEUR 7 AUTORISÉ. \n CODE DE AUTORIZATION : CTF{B453_64_M1L1T4RY_C4LL}";
    } else {
        $error = "ERREUR : CODE D'AUTHENTIFICATION INVALIDE.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SYSTÈME DE COMMANDE TACTIQUE - V1.4</title>
    <style>
        body {
            margin: 0; height: 100vh;
            background: #0a0f0a url('https://images.unsplash.com/photo-1506318137071-a8e063b4b519?q=80&w=2072') center/cover;
            font-family: 'Courier New', monospace; overflow: hidden; color: #00ff00;
        }

        /* Effet de balayage Radar */
        body::after {
            content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: repeating-linear-gradient(0deg, rgba(0, 255, 0, 0.05) 0px, rgba(0, 255, 0, 0.05) 1px, transparent 1px, transparent 2px);
            pointer-events: none;
        }

        .desktop-icons { padding: 30px; display: grid; grid-template-columns: repeat(1, 80px); gap: 30px; }
        .icon { text-align: center; cursor: pointer; filter: drop-shadow(0 0 5px #00ff00); }
        .icon img { width: 60px; margin-bottom: 5px; }

        .window {
            position: absolute; background: rgba(0, 20, 0, 0.9); border: 2px solid #00ff00;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.4); display: none; flex-direction: column;
        }
        .title-bar { background: #004400; padding: 5px 10px; display: flex; justify-content: space-between; font-weight: bold; }
        .close { cursor: pointer; color: #ff0000; }

        /* Contenu du Terminal */
        .terminal-content { padding: 15px; background: black; border: 1px solid #004400; margin: 10px; font-size: 0.9em; word-wrap: break-word; }

        input { background: black; border: 1px solid #00ff00; color: #00ff00; padding: 10px; width: 100%; margin-top: 10px; box-sizing: border-box; }
        button { background: #004400; color: #00ff00; border: 1px solid #00ff00; width: 100%; padding: 10px; cursor: pointer; margin-top: 10px; }
    </style>
</head>
<body>

<div class="desktop-icons">
    <div class="icon" onclick="openApp('radio-app')">
        <img src="https://cdn-icons-png.flaticon.com/512/3256/3256157.png" alt="Radio">
        INTERCEPT.LOG
    </div>
    <div class="icon" onclick="openApp('auth-app')">
        <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png" alt="Auth">
        AUTHENTIFIER
    </div>
</div>

<div id="radio-app" class="window" style="top: 50px; left: 150px; width: 500px;">
    <div class="title-bar"><span>INTERCEPTATION RADIO - FRÉQ 144.800MHz</span><span class="close" onclick="closeApp('radio-app')">✕</span></div>
    <div class="terminal-content">
        [14:02] MESSAGE INTERCEPTÉ : <br><br>
        TGUgY29kZSBkZSBsYSBwbGF0ZWZvcm1lIGVzdCBUb3BTZWNyZXRQcm9qZWN0Q2hpbWVyYTIwMTI=
        <br><br>
        [SIGNAL PERDU...]
    </div>
</div>

<div id="auth-app" class="window" style="top: 200px; left: 400px; width: 350px; padding: 20px; <?= ($decrypted_flag || $error) ? 'display:flex;' : '' ?>">
    <div class="title-bar"><span>VALIDATION DU COMMANDEMENT</span><span class="close" onclick="closeApp('auth-app')">✕</span></div>
    <div style="padding: 20px; text-align: center;">
        <?php if ($decrypted_flag): ?>
            <p style="color: #fff;"><?= $decrypted_flag ?></p>
        <?php else: ?>
            <p>SAISISSEZ LA FLAG EXTRAITE :</p>
            <form method="POST">
                <input type="text" name="flag_input" placeholder="Entrez le code" required>
                <button type="submit">EXÉCUTER</button>
            </form>
            <?php if($error) echo "<p style='color:red; font-size:0.8em;'>$error</p>"; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function openApp(id) { document.getElementById(id).style.display = 'flex'; }
    function closeApp(id) { document.getElementById(id).style.display = 'none'; }
</script>

</body>
</html>