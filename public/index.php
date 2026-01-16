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
$router->map('GET', '/challenge/click-frenzy', function() { require __DIR__ . '/../views/click_frenzy/clik_frenzy.php'; });
//KEEP_YOUR_LIFE_PRIVATE
$router->map('GET,POST', '/challenge/keep-your-life-private', function() { require __DIR__ . '/../views/keep_your_life_private/keep_your_life_private.php'; });
//NOT_A_SECURE_LOGIN
$router->map('GET', '/challenge/not-secure-login', function() { require __DIR__ . '/../views/not_secure_login/not_secure_login.php'; });
//HIDDEN_IN_PLAIN_SIGHT
$router->map('GET, POST', '/challenge/hidden_in_plain_sight', function() { require __DIR__ . '/../views/hidden_in_plain_sight/login.php'; });
$router->map('GET', '/challenge/hidden_in_plain_sight/desktop', function() {
    require __DIR__ . '/../views/hidden_in_plain_sight/desktop.php';
});
//MARIE_OSINT
$router->map('GET, POST', '/challenge/marie-osint', function() { require __DIR__ . '/../views/marie_osint/oubli_de_marie.php'; });
//MILITARY_INTERCEPT
$router->map('GET, POST', '/challenge/interception_radio', function() { require __DIR__ . '/../views/interception_radio/military_desktop.php'; });
//CAESAR_MILITARY
$router->map('GET, POST', '/challenge/caesar-military', function() { require __DIR__ . '/../views/chiffre_de_l_empereur/caesar_mission.php'; });
//TOUT_EST_AU_POINT
$router->map('GET', '/challenge/tout-est-au-point', function() { require __DIR__ . '/../views/tout_est_au_point/tout_est_au_point.php'; });
//MILITARY_LOGS
$router->map('GET, POST', '/challenge/military-logs', function() { require __DIR__ . '/../views/traces_dans_l_ombre/log_analysis.php'; });


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
