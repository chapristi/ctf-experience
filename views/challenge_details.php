<?php/*
$challenge = [
    "title" => "OPSEC Fail : Le Rapport",
    "category" => "Osint",
    "points" => 300,
    "description" => "Un agent a laissé un rapport sensible sur ce terminal. Le fichier est protégé par un mot de passe basé sur ses informations personnelles. Fouillez son environnement pour reconstituer la clé d'accès.",
    "hint" => "L'agent a tendance à noter ses secrets sur des supports physiques avant de les numériser. Cherchez un post-it.",
    "gif" => "https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExM3Y2Z2R6eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3o7TKSjPQCK9IuX8QQ/giphy.gif",
    "url_challenge" => "/challenge/pdf"
];

$error = false;
$success = false;
$flag_attendu = "CTF{051NT_M45T3R_D0C}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flag_saisi = $_POST['flag'] ?? '';
    if ($flag_saisi === $flag_attendu) {
        $success = true;
    } else {
        $error = true;
    }
}*/
?>

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

<a href="/challenges" class="back-nav"><_RETOUR_</a>

<div class="container">
    <div class="side-panel">
        <img src="<?= $challenge['gif'] ?>" alt="Data Visual">
        <span class="badge"><?= $challenge['category'] ?></span>
    </div>

    <div class="content-panel">
        <h1><?= $challenge['title'] ?></h1>
        <div class="points">// VALEUR_MISSION : <?= $challenge['points'] ?> PTS</div>

        <p class="desc-text">
            <?= $challenge['description'] ?>
        </p>

        <a href="<?= $challenge['url_challenge'] ?>" class="btn-launch">ACCÉDER À L'INSTANCE</a>

        <details>
            <summary>DEMANDER UN INDICE_</summary>
            <div class="hint-content">
                <?= $challenge['hint'] ?>
            </div>
        </details>

        <div class="flag-zone">
            <?php if ($success): ?>
                <div class="status-msg status-success">
                    [COMPLÉTÉ] FLAG VALIDE. LES POINTS ONT ÉTÉ ATTRIBUÉS.
                </div>
            <?php else: ?>
                <form method="POST">
                    <input type="text" name="flag" placeholder="SAISIR LE FLAG (CTF{...})" required>
                    <button type="submit" class="btn-validate">SOUMETTRE</button>
                </form>
                <?php if ($error): ?>
                    <div class="status-msg status-error">
                        [ERREUR] INTEGRITÉ ÉCHOUÉE. RÉESSAYEZ.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>