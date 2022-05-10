<?php
class ModelAdmin extends Model{
    public function registerAdmin($login, $password){
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $db = $this->getDb();
        $login = $db->prepare('INSERT INTO `admin`(`login`, `password`) VALUES (?, ?)');

        $affectedLines = $login->execute(array($login, $pass_hash));
        return $affectedLines;
    }
    public function sessionAdmin($id){
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `id_admin` = :id');
        $req->bindParam('id', $id, PDO::PARAM_STR);
        $req->execute();
        $admin = [];
        while($adm = $req->fetch(PDO::FETCH_ASSOC)){
            $admin = new Admin($adm);
        }
        return $admin;
        // return new Admin($req->fetch(PDO::FETCH_ASSOC));
    }
    public function activeSessionAdmin($login, $password){
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
        $req->bindParam('loginF', $login, PDO::PARAM_STR);
        $req->execute();
        return new Admin($req->fetch(PDO::FETCH_ASSOC));

        $log =$req->fetch(PDO::FETCH_ASSOC);
        if($req->rowCount() > 0 && $log['password']  == $password){
            $_SESSION['adminId'] = $log['id_admin'];
        }
    }
}
