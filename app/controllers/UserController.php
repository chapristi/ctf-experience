<?php

namespace App\Controller;
use App\Model\User;
class UserController
{
    private User $user;
    public function __construct()
    {
       $this->user = new User();
    }
    function inscription()
    {
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'user' .
            DIRECTORY_SEPARATOR . 'inscription.php';
    }

    function connexion()
    {
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'user' .
            DIRECTORY_SEPARATOR . 'connexion.php';
    }

    function deconnexion()
    {
        session_start();
        session_destroy();
        header('Location: ?url=home&a=index');
    }

    function enregistrer()
    {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $ajoutOk = $this->user->createUser($nom,$email,$hashedPassword);

        if ($ajoutOk) {
            $_SESSION['message'] = ["success" => "vous etes inscrit"];

            header('Location: ?url=user&a=connexion');
        } else {
            require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'error_inscription.php');
        }
    }

    function verify_connection()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->user->getUserByEmail($email);
        var_dump($user);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['email'] = $user['email'];

            $_SESSION['message'] = ["success" => "vous etes connecté"];
            header('Location: ?url=home&a=index');
        } else {
            require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'error_connection.php');
        }
    }
    function profile()
    {
        $user = $this->user->getUserById($_SESSION['id']);
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'user' .
            DIRECTORY_SEPARATOR . 'profile.php';
    }

    function update()
    {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $id = $_SESSION['id'];
        $updateOk = $this->user->updateUser($id,$nom,$email);
        if ($updateOk) {
            $_SESSION['message'] = ["success" => "bravo votre compte est mis à jour"];
            header('Location: ?url=user&a=profile');
        } else {
            $_SESSION['message'] = ["danger" => "erreur lors de la maj"];
            header('Location: ?url=user&a=profile');
        }
    }
}