<?php

class ModelConnexion extends Model
{
    public function connectAdminSession()
    {
        if (isset($_SESSION['login'])) {
            echo " Vous êtes déjà connecter, vous pouvez accéder à l'espace administrateur en <a href='./Views/spaceAdmin.php'>Cliquant ici</a>";
        } else {
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

                        $adminConnect = [];
                        while ($adm = $req->fetch(PDO::FETCH_ASSOC)) {
                            $adminConnect[] = new Admin($adm);
                        }
                        return $adminConnect;
                        if ($req->rowCount() != 1) {
                            echo "Pseudo ou Mot de passe incorrect";
                        } else {
                            $_SESSION['login'] = $login;
                            echo "Vous êtes connecter avec succès $login !";
                        }
                    }
                }
            }
        }
    }
}
