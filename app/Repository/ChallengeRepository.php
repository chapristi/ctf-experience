<?php
namespace App\Repository;
use PDO;

class ChallengeRepository {
    private PDO $db;
    public function __construct(PDO $db) { $this->db = $db; }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT id, title, description, points, category, picture FROM challenges WHERE is_active = 1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChallenge($id){
        $request = $this->db->query("SELECT id, title, description, points, category, picture FROM challenges WHERE is_active = 1 and id = $id");
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyFlag(int $id, string $flag): bool {
        $stmt = $this->db->prepare("SELECT 1 FROM challenges WHERE id = ? AND flag = ?");
        $stmt->execute([$id, $flag]);
        return (bool)$stmt->fetch();
    }
    
    public function isSolved(int $userId, int $challengeId): bool {
        $stmt = $this->db->prepare("SELECT 1 FROM solves WHERE user_id = ? AND challenge_id = ?");
        $stmt->execute([$userId, $challengeId]);
        return (bool)$stmt->fetch();
    }
}
