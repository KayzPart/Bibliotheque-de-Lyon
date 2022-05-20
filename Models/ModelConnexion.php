<?php

class ModelConnexion extends Model
{
    public function connectAdminSession(){
        if(isset($_POST['login'])){
            $login = $_POST['login'];
            $db = $this->getDb();
            $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
            $req->bindParam('loginF', $login, PDO::PARAM_STR);
            $req->execute();
    
            $req->fetch(PDO::FETCH_ASSOC);
        } 
    }
    public function connectUserSession(){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $db = $this->getDb();
            $req = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user` WHERE `email`');
            $req->bindParam('email', $email, PDO::PARAM_STR);
            $req->execute();

            $req->fetch(PDO::FETCH_ASSOC);
        }
    }
}
