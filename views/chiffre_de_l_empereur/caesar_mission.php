<?php
$decrypted_flag = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flag_input'])) {
    if (trim($_POST['flag_input']) === 'ExtremelySafePassword') {
        $decrypted_flag = "DÉCRYPTAGE RÉUSSI : LES RENFORTS ARRIVENT À L'AUBE. IDENTIFICATION : CTF{C43S4R_W1TH_TH3_M1L1T4RY} ";
    } else {
        $error = "ERREUR : SÉQUENCE DE DÉCODAGE INCORRECTE.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>POSTE DE TRANSMISSION VINTAGE</title>
    <style>
        body {
            margin: 0; height: 100vh;
            background: #1a1a1a url('https://images.unsplash.com/photo-1554110397-9bac083977c6?q=80&w=2070') center/cover;
            font-family: 'Courier New', monospace; color: #d4d4d4;
        }

        /* Superposition style "Vieux Papier / Radar" */
        .overlay {
            position: absolute; width: 100%; height: 100%;
            background: rgba(43, 53, 38, 0.8);
            pointer-events: none;
        }

        .desktop { position: relative; padding: 40px; z-index: 10; }

        .icon { 
            width: 80px; text-align: center; cursor: pointer; margin-bottom: 20px;
            filter: sepia(1) saturate(2);
        }
        .icon img { width: 60px; }

        .window {
            position: absolute; background: #2b2b2b; border: 2px solid #556b2f;
            box-shadow: 10px 10px 0px #1a1a1a; display: none; flex-direction: column;
        }
        .title-bar { background: #556b2f; color: white; padding: 5px 10px; font-weight: bold; }

        .paper-content { 
            background: #e4d5b7; color: #2b2b2b; padding: 20px; margin: 10px;
            border: 1px solid #c4b597; font-weight: bold; line-height: 1.5;
        }

        input { width: 100%; padding: 10px; border: 1px solid #556b2f; margin-top: 10px; }
        button { background: #556b2f; color: white; border: none; width: 100%; padding: 10px; cursor: pointer; margin-top: 10px; }
    </style>
</head>
<body>

<div class="overlay"></div>

<div class="desktop">
    <div class="icon" onclick="openApp('radio-note')">
        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067451.png" alt="Note">
        ORDRE_1944.txt
    </div>
    <div class="icon" onclick="openApp('decoder-app')">
        <img src="https://cdn-icons-png.flaticon.com/512/2913/2913133.png" alt="Decoder">
        DÉCODEUR
    </div>
</div>

<div id="radio-note" class="window" style="top: 100px; left: 100px; width: 450px;">
    <div class="title-bar"><span>ARCHIVE - MESSAGE CHIFFRÉ</span><span style="float:right; cursor:pointer;" onclick="closeApp('radio-note')">✕</span></div>
    <div class="paper-content">
        TOP SECRET<br>
        OBJET : ORDRE DE MOUVEMENT<br><br>
        MESSAGE INTERCEPTÉ :<br>
        <span style="font-size: 1.2em; color: #8b0000;">BuqobjbivPxcbMxpptloa</span><br><br>
        NOTE : Le chiffreur utilisait une technique de décalage antique (Clé : +3).
    </div>
</div>

<div id="decoder-app" class="window" style="top: 200px; left: 500px; width: 350px; padding: 20px; <?= ($decrypted_flag || $error) ? 'display:flex;' : '' ?>">
    <div class="title-bar"><span>UNITÉ DE DÉCODAGE</span><span style="float:right; cursor:pointer;" onclick="closeApp('decoder-app')">✕</span></div>
    <div style="padding: 10px;">
        <?php if ($decrypted_flag): ?>
            <p style="color: #00ff00;"><?= $decrypted_flag ?></p>
        <?php else: ?>
            <p>Saisissez le message décrypté :</p>
            <form method="POST">
                <input type="text" name="flag_input" autocomplete="off" placeholder="Saisissez le code secret" required>
                <button type="submit">VALIDER LE CODE</button>
            </form>
            <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    function openApp(id) { document.getElementById(id).style.display = 'flex'; }
    function closeApp(id) { document.getElementById(id).style.display = 'none'; }
</script>

</body>
</html>