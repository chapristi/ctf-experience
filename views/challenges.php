<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Missions Disponibles</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
    body {
        display: flex;
        flex-direction: column;
        margin: 0;
        background-color: #050a14; /* Deeper navy blue */
        color: #e0f2ff; /* Soft blue-white text */
        font-family: 'Consolas', monospace;
    }

    /* Signout Button - Red accent kept for warnings/logout, but refined */
    .btn-signout {
        position: fixed;
        top: 20px;
        right: 20px;
        color: #ff4d4d;
        text-decoration: none;
        border: 1px solid #ff4d4d;
        padding: 8px 15px;
        border-radius: 4px;
        transition: all 0.3s;
        z-index: 1000;
        background: rgba(5, 10, 20, 0.8);
    }

    .btn-signout:hover {
        background-color: #ff4d4d;
        color: #050a14;
        box-shadow: 0 0 10px rgba(255, 77, 77, 0.5);
    }

    header {
        text-align: center;
        margin: 80px 0 40px 0;
    }

    header h1 {
        color: #00d4ff; /* Electric Cyan */
        text-shadow: 0 0 10px rgba(0, 212, 255, 0.5);
    }

    .grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
        padding: 20px;
    }

    .card {
        background: #0d1624; /* Dark blue-grey card */
        border: 1px solid #1e3a5f; /* Steel blue border */
        border-radius: 10px;
        padding: 20px;
        transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s;
        text-align: center;
        width: 350px;
    }

    .card:hover {
        transform: translateY(-5px);
        border-color: #00d4ff; /* Cyan highlight on hover */
        box-shadow: 0 5px 15px rgba(0, 212, 255, 0.2);
    }

    .card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 15px;
        /* Optional: slight blue tint on images */
        filter: brightness(0.9) contrast(1.1);
    }

    .category {
        display: inline-block;
        background-color: #1e3a5f;
        color: #00d4ff;
        font-size: 0.75em;
        font-weight: bold;
        text-transform: uppercase;
        padding: 5px 15px;
        border-radius: 20px;
        border: 1px solid #00d4ff;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .points {
        color: #00d4ff; /* Cyan points */
        font-weight: bold;
        font-size: 1.2em;
        margin: 10px 0;
    }

    .btn-play {
        display: block;
        margin-top: 15px;
        padding: 12px;
        background: #00d4ff; /* Bright blue button */
        color: #050a14;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s, opacity 0.3s;
    }

    .btn-play:hover {
        background-color: #00b4db;
        opacity: 1;
    }

    .btn-scoreboard {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        color: #00d4ff;
        text-decoration: none;
        border: 1px solid #00d4ff;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .btn-scoreboard:hover {
        background-color: rgba(0, 212, 255, 0.1);
        box-shadow: 0 0 10px rgba(0, 212, 255, 0.3);
    }
</style>
</head>
<body>

<a href="/auth/logout" class="btn-signout">DÉCONNEXION [X]</a>

<header>
    <h1 style="color: #00d4ff; font-size: 2.5em;">Tableau des Missions</h1>
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