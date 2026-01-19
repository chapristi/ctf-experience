<?php
$decrypted_flag = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flag_input'])) {
    // Le code encodé "Buqobjbiv..." + 3 donne "ExtremelySafePassword"
    if (trim($_POST['flag_input']) === 'ExtremelySafePassword') {
        $decrypted_flag = "DÉCHIFFRAGE RÉUSSI : LES RENFORTS ARRIVENT À L'AUBE. <br><strong>IDENTIFICATION : CTF{C43S4R_W1TH_TH3_M1L1T4RY}</strong>";
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
        :root {
            --army-green: #4b5320;
            --dark-green: #2b3526;
            --paper: #e4d5b7;
            --led-green: #39ff14;
        }

        body {
            margin: 0; height: 100vh;
            background: #1a1a1a url('https://images.unsplash.com/photo-1554110397-9bac083977c6?q=80&w=2070') center/cover;
            font-family: 'Courier New', monospace; color: #d4d4d4;
            overflow: hidden;
        }

        /* Effet scanline rétro */
        body::before {
            content: " ";
            position: absolute; top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), 
                        linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            z-index: 100; background-size: 100% 4px, 3px 100%;
            pointer-events: none;
        }

        .overlay {
            position: absolute; width: 100%; height: 100%;
            background: rgba(43, 53, 38, 0.6);
            pointer-events: none; z-index: 1;
        }

        .desktop { position: relative; padding: 40px; z-index: 10; display: flex; flex-direction: column; gap: 20px; }

        .icon { 
            width: 100px; text-align: center; cursor: pointer;
            transition: transform 0.2s; filter: sepia(0.5) drop-shadow(0 0 5px black);
        }
        .icon:hover { transform: scale(1.1); }
        .icon img { width: 50px; margin-bottom: 5px; }
        .icon span { display: block; font-size: 0.8em; background: rgba(0,0,0,0.6); padding: 2px; }

        .window {
            position: absolute; background: #2b2b2b; border: 3px solid #1a1a1a;
            box-shadow: 15px 15px 0px rgba(0,0,0,0.4);
            display: none; flex-direction: column; z-index: 20;
            min-width: 300px;
        }

        .title-bar { 
            background: var(--army-green); color: white; padding: 8px 12px; 
            font-weight: bold; cursor: move; display: flex; justify-content: space-between;
            align-items: center; border-bottom: 2px solid #1a1a1a;
            user-select: none;
        }

        .close-btn { color: #ff4d4d; cursor: pointer; font-size: 1.2em; }

        .paper-content { 
            background: var(--paper); color: #2b2b2b; padding: 25px; margin: 15px;
            border: 1px solid #c4b597; font-weight: bold; line-height: 1.5;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }

        /* Décoration papier brûlé */
        .paper-content::after {
            content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/parchment.png');
            pointer-events: none; opacity: 0.5;
        }

        .decoder-body { padding: 20px; }

        input { 
            width: 100%; padding: 12px; border: 2px solid var(--army-green); 
            background: #1a1a1a; color: var(--led-green); 
            box-sizing: border-box; margin-top: 10px; font-family: 'Courier New', monospace;
        }

        button { 
            background: var(--army-green); color: white; border: none; 
            width: 100%; padding: 12px; cursor: pointer; margin-top: 10px;
            font-weight: bold; transition: background 0.3s;
        }
        button:hover { background: #5e682d; }

        .success-msg { color: var(--led-green); border: 1px solid var(--led-green); padding: 10px; text-align: center; }
        .error-msg { color: #ff4d4d; font-size: 0.8em; margin-top: 5px; }
    </style>
</head>
<body>

<div class="overlay"></div>

<div class="desktop">
    <div class="icon" onclick="openApp('radio-note')">
        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067451.png" alt="Note">
        <span>ORDRE_1944.txt</span>
    </div>
    <div class="icon" onclick="openApp('decoder-app')">
        <img src="https://cdn-icons-png.flaticon.com/512/2913/2913133.png" alt="Decoder">
        <span>DÉCODEUR.exe</span>
    </div>
</div>

<div id="radio-note" class="window" style="top: 100px; left: 50px; width: 450px;">
    <div class="title-bar">
        <span>ARCHIVE - MESSAGE CHIFFRÉ</span>
        <span class="close-btn" onclick="closeApp('radio-note')">✕</span>
    </div>
    <div class="paper-content">
        TOP SECRET<br>
        OBJET : MOUVEMENTS DE TROUPES<br><hr>
        MESSAGE INTERCEPTÉ :<br>
        <span style="font-size: 1.3em; color: #8b0000; letter-spacing: 2px;">BuqobjbivPxcbMxpptloa</span><br><br>
        <small style="color: #555;">NOTE DU RENSEIGNEMENT :<br>
        Le codeur utilise un décalage de +3 (César).<br>
        Retrouvez le mot de passe original.</small>
    </div>
</div>

<div id="decoder-app" class="window" style="top: 150px; left: 550px; width: 380px; <?= ($decrypted_flag || $error) ? 'display:flex;' : '' ?>">
    <div class="title-bar">
        <span>UNITÉ DE DÉCODAGE V1.0</span>
        <span class="close-btn" onclick="closeApp('decoder-app')">✕</span>
    </div>
    <div class="decoder-body">
        <?php if ($decrypted_flag): ?>
            <div class="success-msg"><?= $decrypted_flag ?></div>
        <?php else: ?>
            <p style="font-size: 0.9em;">SYSTÈME PRÊT. VEUILLEZ SAISIR LA CLÉ DÉCODÉE :</p>
            <form method="POST">
                <input type="text" name="flag_input" autocomplete="off" placeholder="CODE SECRET..." required>
                <button type="submit">DÉCHIFFRER LA TRANSMISSION</button>
            </form>
            <?php if($error) echo "<p class='error-msg'>$error</p>"; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    // --- GESTION DES FENÊTRES ---
    function openApp(id) { 
        const win = document.getElementById(id);
        win.style.display = 'flex'; 
        bringToFront(win);
    }
    function closeApp(id) { document.getElementById(id).style.display = 'none'; }

    let highestZ = 20;
    function bringToFront(element) {
        highestZ++;
        element.style.zIndex = highestZ;
    }

    // --- LOGIQUE DRAGGABLE ---
    document.querySelectorAll('.window').forEach(win => {
        const titleBar = win.querySelector('.title-bar');
        let isDragging = false;
        let offsetLeft, offsetTop;

        titleBar.addEventListener('mousedown', (e) => {
            isDragging = true;
            bringToFront(win);
            // Calculer l'écart entre la souris et le coin de la fenêtre
            offsetLeft = e.clientX - win.offsetLeft;
            offsetTop = e.clientY - win.offsetTop;
            titleBar.style.cursor = 'grabbing';
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            win.style.left = (e.clientX - offsetLeft) + 'px';
            win.style.top = (e.clientY - offsetTop) + 'px';
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            titleBar.style.cursor = 'move';
        });

        // Focus au clic n'importe où sur la fenêtre
        win.addEventListener('mousedown', () => bringToFront(win));
    });
</script>

</body>
</html>