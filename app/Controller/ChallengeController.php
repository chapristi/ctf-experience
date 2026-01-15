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

    public function challengeDetails(){
        $id = $_POST['challenge_id'];
        $data = $this->crepo->getChallenge($id);
        $this->render('challenge_details', ['challenge' => $data]);
    }

    public function submit() {
        header('Content-Type: application/json');
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401); echo json_encode(['error' => 'Login necessary']); return;
        }
        $flag = $_POST["flag"];
        $id = $_POST["challenge_id"];

        if ($this->crepo->isSolved($_SESSION['user_id'], $id)) {
            echo json_encode(['success' => false, 'message' => 'Already solved']); return;
        }

        if ($this->crepo->verifyFlag($id, $flag)) {
            $this->urepo->addScore($_SESSION['user_id'], $id);
            echo json_encode(['success' => true, 'message' => 'Correct']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Wrong']);
        }
    }
}
