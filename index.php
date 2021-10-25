<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])) {
    $user->setUser($userSession->getCurrentUser());
    include_once 'view/home.php';
    
} else if(isset($_POST['username']) && isset($_POST['password'])) {
    // user y password del form
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)) {
        $userSession->setCurrentUser($userForm);
        $user-> setUser($userForm);

        include_once 'view/home.php';
    } else {
        $errorLogin = "El usuario y la contraseña no coinciden";
        include_once 'view/login.php';
    }
} else {
    include_once 'view/login.php';
}


?>