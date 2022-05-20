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
                $_SESSION['adminId'] = $admin->getId_admin();
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
        if (!isset($_SESSION['amdinId'])) {
            header('Refresh: 2; url = ./connectAdmin');
            echo " Vous devez vous connecter pour accéder à l'espace administrateur.
            <br><br>
            <i>La redirection vers la page de connection est en cours ... </i>";
            // On arrête l'éxécution de la page si le menbre n'est pas connecter
            exit(0);
        }
    }
    public static function space()
    {
        $twig = ControllerTwig::twigcontrol();
        session_start();
        echo $twig->render('spaceAdmin.twig', ['root' => ROOT]);
    }
}
