<?php

include_once 'includes/db.php';

class User extends DB {

    private $name;
    private $last_name;
    private $username;
    private $userid;

    public function userExists($user, $pass) {
        $query = $this->connect()->prepare('SELECT * FROM users WHERE user_name=:user AND user_pass=:pass');
        $query->execute(['user'=> $user, 'pass'=> $pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function setUser($user) {
        $query = $this->connect()->prepare('SELECT * FROM users WHERE user_name=:user');
        $query->execute(['user'=> $user]);

        foreach ($query as $currentUser) {
            $this->name = $currentUser['name'];
            $this->last_name = $currentUser['last_name'];
            $this->username = $currentUser['user_name'];
            $this->userid = $currentUser['id'];
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getUserId() {
        return $this->userid;
    }
}


?>