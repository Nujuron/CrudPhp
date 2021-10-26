<?php 

class UserSession {
    
    public function __construct() {
        session_start();
    }

    public function setCurrentUser($username, $userid) {
        $_SESSION['user'] = $username;
        $_SESSION['id'] = $userid;
    }
    
    public function getCurrentUser() {
        return $_SESSION['user'];
    }

    public function closeSession() {
        session_unset();
        session_destroy();
    }
}


?>