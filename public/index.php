<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../vendor/autoload.php';

$db = new PDO("mysql:host=db;dbname=my_database;charset=utf8mb4", "user", "user_password");

$router = new AltoRouter();

// Views
$router->map('GET', '/', function() { require __DIR__ . '/../views/home.php'; });

//CHALLENGES
//Here will be the routes for each challenge of our ctf
$router->map('GET', '/click-frenzy', function() { require __DIR__ . '/../views/click_frenzy/clik_frenzy.php'; });
$router->map('GET,POST', '/keep-your-life-private', function() { require __DIR__ . '/../views/keep_your_life_private/keep_your_life_private.php'; });
$router->map('GET', '/not-secure-login', function() { require __DIR__ . '/../views/not_secure_login/not_secure_login.php'; });
//HIDDEN_IN_PLAIN_SIGHT
$router->map('GET, POST', '/hidden_in_plain_sight', function() { require __DIR__ . '/../views/hidden_in_plain_sight/login.php'; });
$router->map('GET', '/hidden_in_plain_sight/desktop', function() {
    require __DIR__ . '/../views/hidden_in_plain_sight/desktop.php';
});
//MARIE OSINT
$router->map('GET, POST', '/marie-osint', function() { require __DIR__ . '/../views/marie_osint/oubli_de_marie.php'; });


// API
$router->map('POST', '/auth/login', function() use ($db) { (new \App\Controller\AuthController($db))->login(); });
$router->map('GET', '/auth/logout', function() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION = array();
    session_destroy();
    header('Location: /');
    exit;
});
$router->map('GET', '/challenges', function() use ($db) { (new \App\Controller\ChallengeController($db))->index(); });
$router->map('GET', '/challenge_details', function() use ($db) { (new \App\Controller\ChallengeController($db))->challengeDetails();});
$router->map('POST', '/challenge/validateFlag', function() use ($db) { (new \App\Controller\ChallengeController($db))->submit(); });
$router->map('GET', '/scoreboard', function() use ($db) { (new \App\Controller\ChallengeController($db))->getGeneralScoreboard(); });

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    require __DIR__ . '/../views/404.php';
}

ob_end_flush();
