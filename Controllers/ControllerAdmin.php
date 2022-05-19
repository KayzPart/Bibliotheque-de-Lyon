<?php

class ControllerAdmin
{
    public static function connexionAdmin()
    {
        session_start();
        $login = $_POST['login'];
        $password = $_POST['password'];
        $manager = new ModelAdmin();
        $admin = $manager->sessionAdmin($login);
        if ($admin != "Pseudo ou Mot de passe incorrect") {
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            $passwordVerif = password_verify($admin->getPassword(), $pass_hash);
            var_dump($pass_hash);
        }
    }
    public static function space()
    {
        session_start();
        require_once './Views/spaceAdmin.php';
    }
}
