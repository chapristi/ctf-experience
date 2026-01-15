<?php
$correct_password = "Patapouf1994@";
$user_input = $_POST['password'] ?? '';
$error = false;
$success = false;
$flag = "CTF{051NT_M45T3R_D0C}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($user_input === $correct_password) {
        $success = true;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Analyse de Document Sécurisé</title>
    <style>
        :root {
            --neon-green: #39ff14;
            --dark-bg: #0d1117;
            --panel-bg: #161b22;
            --border-color: #30363d;
        }

        body {
            margin: 0;
            background-color: var(--dark-bg);
            color: #e6edf3;
            font-family: 'Consolas', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: radial-gradient(circle at center, #1a202c 0%, #0d1117 100%);
        }

        .workspace {
            display: flex;
            gap: 30px;
            max-width: 900px;
            width: 95%;
            align-items: flex-start;
        }

        /* Panneau Principal */
        .main-panel {
            flex: 2;
            background: var(--panel-bg);
            border: 1px solid var(--border-color);
            padding: 40px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        /* Post-it simulé */
        .sticky-note {
            flex: 1;
            background: #fef3c7;
            color: #92400e;
            padding: 20px;
            transform: rotate(2deg);
            box-shadow: 5px 5px 15px rgba(0,0,0,0.3);
            border-bottom-right-radius: 40px 5px;
            min-height: 200px;
        }

        .sticky-note h3 {
            margin-top: 0;
            border-bottom: 1px dashed #d97706;
            padding-bottom: 5px;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .sticky-note ul {
            padding-left: 20px;
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .pdf-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            color: #ff4d4d; /* On garde le rouge pour l'icône PDF par défaut */
        }

        h1 {
            font-size: 1.5rem;
            letter-spacing: 2px;
            margin-bottom: 30px;
            color: var(--neon-green);
            border-left: 3px solid var(--neon-green);
            padding-left: 15px;
        }

        input[type="password"] {
            width: 100%;
            background: #0d1117;
            border: 1px solid var(--border-color);
            padding: 15px;
            color: var(--neon-green);
            font-family: inherit;
            margin-bottom: 20px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="password"]:focus {
            border-color: var(--neon-green);
            box-shadow: 0 0 10px rgba(57, 255, 20, 0.2);
        }

        .btn-decrypt {
            width: 100%;
            padding: 15px;
            background: var(--neon-green);
            color: #0d1117;
            border: none;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: opacity 0.3s;
        }

        .btn-decrypt:hover {
            opacity: 0.9;
        }

        .error-msg {
            color: #ff4d4d;
            font-size: 0.8rem;
            margin-top: 15px;
            padding: 10px;
            border: 1px solid #ff4d4d;
            text-align: center;
        }

        .success-area {
            background: rgba(57, 255, 20, 0.05);
            border: 1px solid var(--neon-green);
            padding: 25px;
            margin-top: 20px;
            animation: fadeIn 0.5s ease;
        }

        .back-nav {
            position: fixed;
            top: 20px;
            left: 20px;
            color: #8b949e;
            text-decoration: none;
            font-size: 0.8rem;
            border: 1px solid var(--border-color);
            padding: 5px 10px;
        }

        .back-nav:hover {
            color: var(--neon-green);
            border-color: var(--neon-green);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<a href="/challenges" class="back-nav"><_RETOUR_</a>

<div class="workspace">
    <div class="main-panel">
        <span class="pdf-icon">📄</span>
        <h1>RAPPORT_SÉCURISÉ_V4.PDF</h1>

        <?php if ($success): ?>
            <div class="success-area">
                <p style="color: var(--neon-green); font-weight: bold;">[✓] DÉCRYPTAGE RÉUSSI</p>
                <p style="color: #8b949e; font-size: 0.9rem;">Accès au contenu déverrouillé :</p>
                <code style="display: block; background: #0d1117; padding: 15px; color: #fff; margin-top: 10px; border-radius: 4px;">
                    <?= $flag ?>
                </code>
            </div>
        <?php else: ?>
            <form method="POST">
                <label style="font-size: 0.7rem; color: #8b949e; display: block; margin-bottom: 10px; letter-spacing: 1px;">SÉQUENCE_DÉCRYPTAGE_REQUISE</label>
                <input type="password" name="password" required placeholder="ENTRER LE MOT DE PASSE">
                <button type="submit" class="btn-decrypt">Se connecter</button>
            </form>
            <?php if ($error): ?>
                <p class="error-msg">[!] ÉCHEC D'IDENTIFICATION : MOT DE PASSE INCORRECT</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="sticky-note">
        <h3>📝 Informations récoltés </h3>
        <ul>
            <li>Nom du chien : <br><strong>Patapouf</strong></li>
            <li>Année de naissance : <br><strong>1994</strong></li>
            <li>Lieu de naissance : <br><strong>Limoges</strong></li>
        </ul>
    </div>
</div>

</body>
</html>