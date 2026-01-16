<?php
$target_image = "/assets/images/tout_est_au_point.png";
$flag = "CTF{BOMBE_LOCALISEE_STADE_FRANCE}";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Analyse de Signal Stéganographique</title>
    <style>
        :root {
            --neon-green: #39ff14;
            --dark-bg: #0d1117;
            --panel-bg: rgba(22, 27, 34, 0.9);
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
            width: 800px;
            background: var(--panel-bg);
            border: 1px solid var(--border-color);
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            text-align: center;
        }

        .header {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 20px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .status-blink {
            color: var(--neon-green);
            font-size: 0.7rem;
            animation: blink 1.5s infinite;
        }

        @keyframes blink { 50% { opacity: 0; } }

        .image-container {
            border: 1px solid var(--neon-green);
            padding: 10px;
            background: #000;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            width: 80%;
            height: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        .image-container img {
            max-width: 100%;
            display: block;
            /* Effet de scanline sur l'image */
            filter: sepia(1) hue-rotate(70deg) brightness(0.8);
        }

        .mission-text {
            color: var(--neon-green);
            letter-spacing: 1px;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .instruction {
            color: #8b949e;
            font-size: 0.8rem;
            line-height: 1.6;
        }

        .back-nav {
            position: fixed;
            top: 20px;
            left: 20px;
            color: #8b949e;
            text-decoration: none;
            font-size: 0.8rem;
            border: 1px solid var(--border-color);
            padding: 5px 15px;
        }

        .back-nav:hover {
            color: var(--neon-green);
            border-color: var(--neon-green);
        }

        /* Scanline effect overlay */
        .scanline {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 2px;
            background: rgba(57, 255, 20, 0.2);
            box-shadow: 0 0 10px var(--neon-green);
            animation: scan 4s linear infinite;
        }

        @keyframes scan {
            from { top: 0%; }
            to { top: 100%; }
        }
    </style>
</head>
<body>

<div class="workspace">
    <div class="header">
        <div style="text-align: left;">
            <div style="font-size: 0.6rem; color: #8b949e;">ANALYSE_IMAGE_DATA</div>
            <div style="letter-spacing: 2px;">FILE_REF: X-99_BOMBE.PNG</div>
        </div>
    </div>

    <div class="mission-text">
        > RETROUVER L'ENDROIT OÙ SE TROUVE LA BOMBE_
    </div>

    <div class="image-container">
        <div class="scanline"></div>
        <img src="<?= $target_image ?>" alt="Fichier Suspect">
    </div>
</div>

</body>
</html>