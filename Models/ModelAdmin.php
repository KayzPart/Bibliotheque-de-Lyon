<?php
class ModelAdmin extends Model
{
    public function sessionAdmin()
    {
        // if (isset($_SESSION['login'])) {
        //     echo " Vous êtes déjà connecter, vous pouvez accéder à l'espace administrateur en <a href='./Views/spaceAdmin.php'>Cliquant ici</a>";
        // }
        if (isset($_POST['submit'])) {
            if (!isset($_POST['login'], $_POST['password'])) {
                echo "Un des champs n'est pas reconnu";
            } else {
                $db = $this->getDb();
                if (!$db) {
                    echo " Erreur de connexion à la BDD";
                } else {
                    $login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
                    $password = md5($_POST['password']);

                    $req = $db->query("SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");

                    if ($req->rowCount() != 1) {
                        echo "Pseudo ou Mot de passe incorrect";
                    } else {
                        $_SESSION['login'] = $login;
                        echo "Vous êtes connecter avec succès $login !";
                    }
                }
            }
        }
        if (!isset($_SESSION['login'])) {
            header('Refresh: 5; url = ./Views/connectAdmin.php');
            echo " Vous devez vous connecter pour accéder à l'espace administrateur.
            <br><br>
            <i>La redirection vers la page de connection est en cours ... </i>";
            // On arrête l'éxécution de la page si le menbre n'est pas connecter
            exit(0);
        }
        $login = $_SESSION['login'];

        $db = $this->getDb();
        if (!$db) {
            echo "Erreur de connexion à la BDD";
            exit(0);
        }
        $req = $db->query("SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = '$login");
        $adminActive = [];
        while ($adm = $req->fetch(PDO::FETCH_ASSOC)) {
            $adminActive[] = new Admin($adm);
        }
        return $adminActive;
    }
}
