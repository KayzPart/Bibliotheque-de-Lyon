<?php
class ModelAdmin extends Model
{
    public function sessionAdmin($login){
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
        $req->bindParam('loginF', $login, PDO::PARAM_STR);
        $req->execute();
        $log = $req->fetch(PDO::FETCH_ASSOC);
        if($req->rowCount() > 0){
            return new Admin($log);
        }else{
            return "Pseudo ou Mot de passe incorrect";
        }
    }
}
