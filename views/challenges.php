<?php
/*$challenges = [
    [
        "title" => "Pas si inconnu...",
        "category" => "Osint",
        "points" => 100,
        "gif" => "https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcDZwcXg2eXN4Yzd2NHlrYno1OTZpODNvYTZvMHdteHN3NHN4b2ZjOSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/A1oBMukTqFfkoY1HiH/giphy.gif"
    ],
    [
        "title" => "Le Secret de l'Admin",
        "category" => "Web",
        "points" => 250,
        "gif" => "https://media1.tenor.com/m/0P2I-Z4sFB0AAAAC/key-magic-key.gif"
    ],
    [
        "title" => "Stupid...",
        "category" => "Web",
        "points" => 500,
        "gif" => "https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExMW5tcTdxYnZjOXkyOWZ6emQ3OTE1aW50Y3R6ZnJvdWR3dTR3bXg1cCZlcD12MV9naWZzX3NlYXJjaCZjdD1n/gq8bvfkh2EIZAnntsc/giphy.gif"
    ]
];*/
?>

<!DOCTYPE html>
< lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Missions Disponibles</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            background-color: #0d1117; /* Assurer le fond sombre */
            color: #e6edf3;
            font-family: 'Consolas', monospace;
        }

        /* Bouton Déconnexion en haut à droite de l'écran */
        .btn-signout {
            position: fixed; /* Reste en haut même si on scrolle */
            top: 20px;
            right: 20px;
            color: #ff4d4d;
            text-decoration: none;
            border: 1px solid #ff4d4d;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s;
            z-index: 1000; /* Passe au dessus de tout */
            background: rgba(13, 17, 23, 0.8); /* Fond semi-transparent */
        }

        .btn-signout:hover {
            background-color: #ff4d4d;
            color: #0d1117;
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
        }

        header {
            text-align: center;
            margin: 80px 0 40px 0; /* Plus d'espace en haut pour éviter le bouton */
        }

        .grid {
            display: flex;
            flex-wrap: wrap; /* Permet d'aller à la ligne si trop de cartes */
            justify-content: center;
            gap: 25px;
            padding: 20px;
        }

        .card {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.3s, border-color 0.3s;
            text-align: center;
            width: 350px; /* Largeur fixe pour tes cartes */
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: #39ff14;
        }

        .card img {
            width: 100%; /* Utilise toute la largeur de la card */
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .category {
            display: inline-block;
            background-color: #30363d;
            color: #39ff14;
            font-size: 0.75em;
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 15px;
            border-radius: 20px;
            border: 1px solid #39ff14;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .points {
            color: #39ff14;
            font-weight: bold;
            font-size: 1.2em;
            margin: 10px 0;
        }

        .btn-play {
            display: block; /* Prend toute la largeur */
            margin-top: 15px;
            padding: 12px;
            background: #39ff14;
            color: #0d1117;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: opacity 0.3s;
        }

        .btn-play:hover {
            opacity: 0.9;
        }

        .btn-scoreboard {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: #39ff14;
            text-decoration: none;
            border: 1px solid #39ff14;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-scoreboard:hover {
            background-color: rgba(57, 255, 20, 0.1);
            box-shadow: 0 0 10px rgba(57, 255, 20, 0.3);
        }
    </style>
</head>
<body>

<a href="/logout" class="btn-signout">DÉCONNEXION [X]</a>

<header>
    <h1 style="color: #39ff14; font-size: 2.5em;">Tableau des Missions</h1>
    <p>Identité confirmée. Choisi ta cible, agent.</p>
    <a href="/scoreboard" class="btn-scoreboard">CONSULTER LE CLASSEMENT</a>
</header>

<div class="grid">
    <?php foreach ($challenges as $item): ?>
        <div class="card" >
            <img src="<?= $item['picture'] ?>" alt="Mission GIF">
            <div>
                <span class="category"><?= $item['category'] ?></span>
            </div>
            <h3 style="margin: 10px 0;"><?= $item['title'] ?></h3>
            <div class="points"><?= $item['points'] ?> PTS</div>
            <a href="/challenge_details?challenge_id=<?= $item['id']  ?>" class="btn-play">DÉMARRER LA MISSION</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>