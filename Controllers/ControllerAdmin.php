<?php

class ControllerAdmin extends ControllerTwig
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
    public static function space(){
        session_start();
        if(!isset($_SESSION['adminId'])){
            header("Refresh: 0.01; url = ./connectAdmin");
        }
        $twig = ControllerTwig::twigcontrol();
        $datas = new ModelBook();
        $p = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        if(isset($_GET['submit'])){
            $searchcat = $_GET['searchcat'];
            if($searchcat == 'id_category'){
                $search = $_GET['categories'];
            }else{
                $search = $_GET['s'];
            }
            $allBooksAdmn = $datas->spaceSearch($searchcat, $search, $p);
        }else{
            $allBooksAdmn = $datas->listAll($p);
        }
        echo $twig->render('spaceAdmin.twig', ['root' => ROOT, 'books' => $allBooksAdmn[0], 'nbrPages' => $allBooksAdmn[1]]);
    }

    
    
}
