<?php

namespace App\Model;
use App\Core\Database;

class User
{
    private $pdo;


    public function __construct()
    {
        $this->pdo = (new Database())->getConnection();
    }

    public function getUserById($id){
        $query = $this->pdo->prepare('SELECT * FROM controle.users WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUserByEmail($email)
    {
        $query = $this->pdo->prepare('SELECT * FROM controle.users WHERE email = :email');
        $query->execute(['email' => $email]);
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    public function createUser( string $name,string $email, string $hashedPassword)
    {
        try {
            $sql = "
            INSERT INTO controle.users (nom, email, password, date_inscription) 
            VALUES (:nom, :email, :password, NOW())
        ";
            $requete = $this->pdo->prepare($sql);
            return $requete->execute([
                ':email' => $email,
                ':nom' => $name,
                ':password' => $hashedPassword
            ]);
        }catch (\PDOException $e) {
           var_dump($e->getMessage());
        }
    }
    public function updateUser($id, $name, $email)
    {
        $sql = "UPDATE controle.users SET nom = :nom, email = :email WHERE id = :id";
        $requete = $this->pdo->prepare($sql);
        return $requete->execute([
            ':id' => $id,
            ':nom' => $name,
            ':email' => $email
        ]);
    }
}