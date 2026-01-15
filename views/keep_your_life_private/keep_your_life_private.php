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
            --neon-blue: #00d2ff;
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
        }

        .workspace {
            display: flex;
            gap: 30px;
            max-width: 900px;
            width: 95%;
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
            height: fit-content;
        }

        .sticky-note h3 {
            margin-top: 0;
            border-bottom: 1px dashed #d97706;
            padding-bottom: 5px;
            font-size: 0.9rem;
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
            color: #ff4d4d;
        }

        h1 {
            font-size: 1.2rem;
            letter-spacing: 2px;
            margin-bottom: 30px;
            color: var(--neon-blue);
        }

        input[type="password"] {
            width: 100%;
            background: #0d1117;
            border: 1px solid var(--border-color);
            padding: 12px;
            color: var(--neon-blue);
            font-family: inherit;
            margin-bottom: 20px;
            box-sizing: border-box;
            outline: none;
        }

        input[type="password"]:focus {
            border-color: var(--neon-blue);
        }

        .btn-decrypt {
            width: 100%;
            padding: 12px;
            background: var(--neon-blue);
            color: #0d1117;
            border: none;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .error-msg {
            color: #ff4d4d;
            font-size: 0.8rem;
            margin-top: 10px;
        }

        .success-area {
            background: rgba(0, 210, 255, 0.1);
            border: 1px solid var(--neon-blue);
            padding: 20px;
            margin-top: 20px;
        }

        .back-nav {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #8b949e;
            text-decoration: none;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<a href="/challenges" class="back-nav">_RETOUR_SYSTEME</a>

<div class="workspace">
    <div class="main-panel">
        <span class="pdf-icon">📄</span>
        <h1>RAPPORT_SÉCURISÉ_V4.PDF</h1>

        <?php if ($success): ?>
            <div class="success-area">
                <p style="color: var(--neon-blue);">[✓] DECRYPTAGE REUSSI</p>
                <p>Contenu du rapport :<br><strong><?= $flag ?></strong></p>
            </div>
        <?php else: ?>
            <form method="POST">
                <label style="font-size: 0.7rem; color: #8b949e; display: block; margin-bottom: 5px;">ENTER_PASSPHRASE</label>
                <input type="password" name="password" required placeholder="********">
                <button type="submit" class="btn-decrypt">Exécuter le décodage</button>
            </form>
            <?php if ($error): ?>
                <p class="error-msg">[!] ERREUR : MOT DE PASSE INCORRECT</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="sticky-note">
        <h3>📝 INDICES_RECUPÉRÉS</h3>
        <ul>
            <li>Nom du chien : <br><strong>Patapouf</strong></li>
            <li>Année de naissance : <br><strong>1994</strong></li>
            <li>Caractère spécial final : <br><strong>@</strong></li>
        </ul>
        <p style="font-size: 0.7rem; margin-top: 20px; font-style: italic;">Note : L'agent mélange souvent le nom et l'année...</p>
    </div>
</div>

</body>
</html>