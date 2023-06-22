<?php
class User {
    private $id;
    private $username;
    private $password;
    private $logState;

    public function __construct($username, $password, $id = 0, $logState = false) {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
        $this->logState = $logState;
    }
    
    // SETTER
    public function setUsername($newUsername) {
        $this->username = $newUsername;
    }
    
    public function setPassword($newPassword) {
        $this->password = $newPassword;
    }

    public function setId($newId) {
        $this->id = $newId;
    }
    
    //GETTER
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function getId() {
        return $this->id;
    }

    public function getLogState() {
        return $this->logState;
    }

    public function login() {
        $this->logState = true;
    }

    public function logout() {
        $this->logState = false;
    }

    public function getInfo() {
        $tab = [];
        $tab['id'] = $this->id;
        $tab['username'] = $this->username;
        $tab['password'] = $this->password;
        $tab['logState'] = $this->logState;
        return $tab;
    }
}
?>