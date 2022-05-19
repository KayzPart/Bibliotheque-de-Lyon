<?php
class ModelAdmin extends Model
{
    public function sessionAdmin(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
        $req->bindParam('loginF', $login, PDO::PARAM_STR);
        $req->execute();
        $log = $req->fetch(PDO::FETCH_ASSOC);
        if($req->rowCount() > 0 && $log['password']  == $password){
            $_SESSION['adminId'] = $log['id_admin'];
            echo "Vous êtes connecter avec succès $login !";
            header('Location: ./Views/spaceAdmin.php');
        }else{
            echo "Pseudo ou Mot de passe incorrect";
        }
        if (!isset($_SESSION['amdinId'])) {
            header('Refresh: 5; url = ./Views/connectAdmin.twig');
            echo " Vous devez vous connecter pour accéder à l'espace administrateur.
            <br><br>
            <i>La redirection vers la page de connection est en cours ... </i>";
            // On arrête l'éxécution de la page si le menbre n'est pas connecter
            exit(0);
        }
        

        
    }
}
