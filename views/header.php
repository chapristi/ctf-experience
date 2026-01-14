<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice Final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="?url=home&a=index">Accueil</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <?php if (!isset($_SESSION['id'])) : ?>
        <li class="nav-item">
            <a class="btn btn-outline-dark" href="?url=user&a=inscription">Inscription</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-dark" href="?url=user&a=connexion">Connexion</a>
        </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['id'])) : ?>
            <li class="nav-item">
                <a class="btn btn-underline-dark" href="?url=posts&a=publish">Creer un post</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-underline-dark" href="?url=posts&a=update">Voir mes posts</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-underline-dark" href="?url=user&a=profile">mon profile</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-underline-dark" href="?url=user&a=deconnexion">déconnexion</a>
            </li>

        <?php endif;?>

    </ul>
</nav>
<div class="container w-75 m-auto">
    <?php if (isset($_SESSION['message'])) : ?>
    <?php foreach ($_SESSION['message'] as $type => $message) : ?>
        <div class="alert alert-<?= htmlspecialchars($type); ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['message']) ?>
<?php endif ?>
