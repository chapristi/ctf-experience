<?php
namespace App\Model;
use PDO;
use PDOException;
class Database
{
    private $host = "localhost";
    private $user = "user";
    private $password = "user_password";
    private $dbname = "my_database";
    private $conn;

    /**
     * Récupère la connexion à la base de données
     *
     * @return PDO|null
     */
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->user, $this->password, [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            die("Échec de la connexion : " . $e->getMessage());
        }
        return $this->conn;
    }
}

