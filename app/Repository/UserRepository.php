<?php
namespace App\Repository;

use App\Model\User;
use PDO;

class UserRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findOrCreate(string $nickname): User {
        $stmt = $this->db->prepare("SELECT id, nickname FROM users WHERE nickname = ?");
        $stmt->execute([$nickname]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        $stmt = $this->db->prepare("INSERT INTO users (nickname) VALUES (?)");
        $stmt->execute([$nickname]);
        
        return new User(['id' => $this->db->lastInsertId(), 'nickname' => $nickname]);
    }

    public function getScoreboard(): array {
        $sql = "SELECT u.id, u.nickname, COALESCE(SUM(c.points), 0) AS total_score
                FROM users u
                LEFT JOIN solves s ON u.id = s.user_id
                LEFT JOIN challenges c ON s.challenge_id = c.id
                GROUP BY u.id
                ORDER BY total_score DESC";
        $stmt = $this->db->query($sql);
        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($row);
        }
        return $users;
    }

    public function addScore(int $userId, int $challengeId): bool {
        $stmt = $this->db->prepare("INSERT IGNORE INTO solves (user_id, challenge_id) VALUES (?, ?)");
        return $stmt->execute([$userId, $challengeId]);
    }
}
