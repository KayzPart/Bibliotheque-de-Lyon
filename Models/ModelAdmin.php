<?php
class ModelAdmin extends Model
{
    public function sessionAdmin()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
        $req->bindParam('loginF', $login, PDO::PARAM_STR);
        $req->execute();
        $log = $req->fetch(PDO::FETCH_ASSOC);
        if ($req->rowCount() > 0 ) {
            return new Admin($log);
            $_SESSION['adminId'] = $log['id_admin'];
            header('Location: ./spaceAdmin');
            echo "Vous êtes connecter avec succès $login !";
            
        } else {
            return "Pseudo ou Mot de passe incorrect";
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
    // public function adminPassHash()
    // {
    //     if (isset($_POST['submit'])) {
    //         $password = $_POST['password'];
    //         $db = $this->getDb();
    //         $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `password` = :hashish');
    //         $req->bindParam('hashish', $password, PDO::PARAM_STR);
    //         $req->execute();
    //         $req->fetch(PDO::FETCH_ASSOC);

    //         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    //         $passwordVerify = password_verify($password, $passwordHash);
    //         var_dump($passwordVerify);
    //         $pass = "MotDEPass3";
    //         echo password_hash($pass, PASSWORD_DEFAULT);
    //     }
    // }
}
