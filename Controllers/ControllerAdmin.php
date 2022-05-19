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

        if($admin != "Pseudo ou Mot de passe incorrect"){
            $passwordVerif = password_verify($password, $admin->getPassword());

            if($passwordVerif){
                $_SESSION['adminId'] = $log['id_admin'];
                echo "Vous êtes connecter avec succès $login !";
                header('Location: ./spaceAdmin');
            }else{
                echo "Pseudo ou Mot de passe incorrect";
                header('Refresh: 2; url = ./connectAdmin');
            }
        }else{
            echo "Pseudo ou Mot de passe incorrect";
            header('Refresh: 2; url = ./connectAdmin');
        }
    }
    public static function space()
    {
        session_start();
        require_once './Views/spaceAdmin.php';
    }
}
