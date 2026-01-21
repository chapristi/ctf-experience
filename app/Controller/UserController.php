<?php

namespace App\Controller;

use App\Repository\UserRepository;
use PDO;

class UserController {
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    /**
     * * @param PDO $db
     */
    public function __construct(PDO $db) {
        $this->repository = new UserRepository($db);
    }

    public function index(): void {
        header('Content-Type: application/json');

        try {
            $scoreboard = $this->repository->getScoreboard();
            echo json_encode($scoreboard);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode([
                'error' => 'Error while loading scoreboard',
                'details' => $e->getMessage()
            ]);
        }
    }
}