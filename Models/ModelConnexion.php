<?php

class ModelConnexion extends Model
{
    public function connectAdminSession()
    {
        if(isset($_POST['login'])){
            $login = $_POST['login'];
            $db = $this->getDb();
            $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
            $req->bindParam('loginF', $login, PDO::PARAM_STR);
            $req->execute();
    
            $req->fetch(PDO::FETCH_ASSOC);
        }
        
    }
}
