<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ERREUR 404 - ACCÈS REFUSÉ</title>
    <style>
        body {
            background-color: #0d1117;
            color: #ff4d4d; /* Rouge pour l'alerte */
            font-family: 'Consolas', monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            overflow: hidden;
        }

        .error-container {
            border: 2px solid #ff4d4d;
            padding: 40px;
            background: rgba(255, 77, 77, 0.05);
            box-shadow: 0 0 20px rgba(255, 77, 77, 0.2);
            position: relative;
        }

        h1 {
            font-size: 5rem;
            margin: 0;
            text-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        }

        p {
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .glitch-line {
            height: 1px;
            background: #ff4d4d;
            width: 100%;
            margin: 20px 0;
            opacity: 0.5;
        }

        a {
            color: #e6edf3;
            text-decoration: none;
            border: 1px solid #e6edf3;
            padding: 10px 20px;
            display: inline-block;
            margin-top: 20px;
            transition: all 0.3s;
        }

        a:hover {
            background: #e6edf3;
            color: #0d1117;
        }

        /* Petit effet d'animation de scanline */
        .scanline {
            width: 100%;
            height: 100px;
            z-index: 8;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0) 0%, rgba(255, 77, 77, 0.1) 50%, rgba(0, 0, 0, 0) 100%);
            opacity: 0.1;
            position: absolute;
            bottom: 100%;
            animation: scanline 3s linear infinite;
        }

        @keyframes scanline {
            0% { bottom: 100%; }
            100% { bottom: -100%; }
        }
    </style>
</head>
<body>
<div class="scanline"></div>
<div class="error-container">
    <h1>404</h1>
    <div class="glitch-line"></div>
    <p>Alerte : Coordonnées invalides</p>
    <p>Le fichier demandé a été déplacé ou supprimé du serveur.</p>
    <a href="/challenges">Retour au terminal</a>
</div>
</body>
</html>