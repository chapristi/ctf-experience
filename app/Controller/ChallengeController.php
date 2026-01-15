<?php
namespace App\Controller;
use App\Repository\ChallengeRepository;
use App\Repository\UserRepository;
use PDO;

class ChallengeController extends BaseController{
    private ChallengeRepository $crepo;
    private UserRepository $urepo;

    public function __construct(PDO $db) {
        $this->crepo = new ChallengeRepository($db);
        $this->urepo = new UserRepository($db);
    }

    public function index() {
        $data = $this->crepo->getAll();
        if (ob_get_level()) ob_clean();
        $this->render('challenges', ['challenges' => $data]);
    }

    public function challengeDetails() {
        $id = $_GET['challenge_id'] ?? null;
        if (!$id) {
            die("Erreur : Aucun ID de mission fourni.");
        }

        $data = $this->crepo->getChallenge($id);

        if (!$data) {
            die("Erreur : Mission introuvable.");
        }

        $this->render('challenge_details', ['challenge' => $data]);
    }

    public function submit() {
    header('Content-Type: application/json');

    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Connexion requise']);
        return;
    }

    $input = json_decode(file_get_contents('php://input'), true);

    $flag = $input['flag'] ?? $_POST['flag'] ?? null;
    $id = $input['challenge_id'] ?? $_POST['challenge_id'] ?? null;

    if (!$flag || !$id) {
        echo json_encode(['success' => false, 'message' => 'Données manquantes']);
        return;
    }

    $userId = (int)$_SESSION['user_id'];
    $challengeId = (int)$id;

    if ($this->crepo->isSolved($userId, $challengeId)) {
        echo json_encode(['success' => false, 'message' => "Mission déjà accomplie, Agent."]);
        return;
    }
    
    if ($this->crepo->verifyFlag($challengeId, $flag)) {

        $result = $this->urepo->processChallengeSolve($userId, $challengeId);
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Félicitations ! Flag correct.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour du score.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Flag incorrect. Réessayez.']);
    }
}
}
