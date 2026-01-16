<?php
namespace App\Repository;

use App\Model\User;
use PDO;
use Exception;

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
        $sql = "SELECT u.id, u.nickname, u.score,
                (SELECT COUNT(*) FROM solves s WHERE s.id = u.id) as solve_count
                FROM users u
                ORDER BY u.score DESC, u.nickname ASC";
                
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function processChallengeSolve(int $userId, int $challengeId): bool {
        try {
            $this->db->beginTransaction();

            $check = $this->db->prepare("SELECT id FROM solves WHERE user_id = ? AND challenge_id = ?");
            $check->execute([$userId, $challengeId]);
            if ($check->fetch()) {
                $this->db->rollBack();
                return false;
            }

            $stmtPoints = $this->db->prepare("SELECT points FROM challenges WHERE id = ?");
            $stmtPoints->execute([$challengeId]);
            $challenge = $stmtPoints->fetch(PDO::FETCH_ASSOC);

            if (!$challenge) {
                throw new Exception("Défi inexistant");
            }

            $points = (int)$challenge['points'];

            $stmtLog = $this->db->prepare("INSERT INTO solves (user_id, challenge_id) VALUES (?, ?)");
            $stmtLog->execute([$userId, $challengeId]);

            $stmtUpdate = $this->db->prepare("UPDATE users SET score = score + ? WHERE id = ?");
            $stmtUpdate->execute([$points, $userId]);

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            error_log("Erro ao processar score: " . $e->getMessage());
            return false;
        }
    }
}
