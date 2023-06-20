<?php
class Database {
    private $host = "localhost";
    private $dbname = "gestionnaire-fichier";
    private $username = "root";
    private $password = "";
    public $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        // 2 syntaxes :
        // $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";port=3308", $this->username, $this->password);
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};port=3308", $this->username, $this->password);
    }
    
    public function validateLogin($username) {
        $checkUsernameQuery = "SELECT id FROM user WHERE username = :username";
        $stmt = $this->pdo->prepare($checkUsernameQuery);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
    }

    public function register($username, $password) {
        $registerQuery = "INSERT INTO user (username, password) VALUES (:username, :password)";
        $stmt = $this->pdo->prepare($registerQuery);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            return true;
        }
    }

    public function getId($username) {
        // Récupérer l'id à partir du username
        $selectIdQuery = "SELECT `id` FROM `user` WHERE `username` = :username";
        $stmt = $this->pdo->prepare($selectIdQuery);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}
?>