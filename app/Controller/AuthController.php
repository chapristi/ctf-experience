<?php
namespace App\Controller;
use App\Repository\UserRepository;
use PDO;
use App\Controller\ChallengeController;

class AuthController {
    private UserRepository $repo;
    public function __construct(PDO $db) {
        $this->repo = new UserRepository($db);
    }

    public function login() {
        header('Content-Type: application/json');
        $rawInput = file_get_contents('php://input');
        $userData = json_decode($rawInput, true);
        $nickname = $userData["nickname"];

        if (empty($nickname) && !isset($nickname)) {
            http_response_code(400);
            echo json_encode(['error' => 'Empty Nickname']); return;
        }
        $user = $this->repo->findOrCreate($nickname);
        $_SESSION['id'] = $user->id;
        $_SESSION['nickname'] = $user->nickname;

        echo json_encode([
        'success' => true,
        'message' => 'Login successful',
        'redirect' => 'challenges'
        ]);
    }
}
