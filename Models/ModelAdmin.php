<?php
class ModelAdmin extends Model{
    public function activeSessionAdmin(){
        if(isset($_SESSION['login'])){
            echo "Vous êtes déjà connecter";
        }else{
            if(isset($_POST['submit'])){
                $login = $_POST['login'];
                $password = $_POST['password'];

                $db = $this->getDb();
                $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
                $req->bindParam('loginF', $login, PDO::PARAM_STR);
                $req->execute();

                $log = $req->fetch(PDO::FETCH_ASSOC);

                if($req->rowCount() > 0 && $log['password'] == $password){
                    $_SESSION['adminId'] = $log['id_admin'];
                    echo 'Vous etes connecté avec succès !'; 
                }else{
                    echo 'Erreur login/password';
                }
                
            }
        }
    }
}
