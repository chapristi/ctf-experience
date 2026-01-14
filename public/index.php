<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../vendor/autoload.php';

$router = new AltoRouter();

$router->map('GET', '/', function() {
    require __DIR__ . '/../views/home.php';
});
$router->map('GET', '/challenges', function() {
    require __DIR__ . '/../views/challenges.php';
});
$router->map('GET', '/scoreboard', function() {
    require __DIR__ . '/../views/scoreboard.php';
});

$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    require __DIR__ . '/../views/404.php';
}

ob_end_flush();
