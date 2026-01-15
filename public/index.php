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
$router->map('GET', '/challenges', function() { require __DIR__ . '/../views/challenges.php'; });
$router->map('GET', '/scoreboard', function() { require __DIR__ . '/../views/scoreboard.php'; });
$router->map('GET', '/click-frenzy', function() { require __DIR__ . '/../views/click_frenzy/clik_frenzy.php'; });
$router->map('GET,POST', '/keep-your-life-private', function() { require __DIR__ . '/../views/keep_your_life_private/keep_your_life_private.php'; });
$router->map('GET', '/challenge_details', function() { require __DIR__ . '/../views/challenge_details.php'; });
$router->map('GET', '/not-secure-login', function() { require __DIR__ . '/../views/not_secure_login/not_secure_login.php'; });

// API
$router->map('POST', '/api/login', function() use ($db) { (new \App\Controller\AuthController($db))->login(); });
$router->map('GET', '/api/challenges', function() use ($db) { (new \App\Controller\ChallengeController($db))->index(); });
$router->map('POST', '/api/challenges/submit', function() use ($db) { (new \App\Controller\ChallengeController($db))->submit(); });
$router->map('GET', '/api/scoreboard', function() use ($db) {
    $repo = new \App\Repository\UserRepository($db);
    header('Content-Type: application/json');
    echo json_encode($repo->getScoreboard());
});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    require __DIR__ . '/../views/404.php';
}

ob_end_flush();
