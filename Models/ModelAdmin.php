<?php
class ModelAdmin extends Model{
    public function activeSessionAdmin($login){

        if(!empty($_POST)){
            $login = $_POST['login'];
            $password = $_POST['password'];
            if(!empty($_POST['login']) && !empty($_POST['password'])){
                if($_POST['login'] !== $login){
                    return 'Mauvais login/password';
                }elseif($_POST['password'] !== $password){
                    return 'Mauvais login/password';
                }
                else{

                    $db = $this->getDb();
                    $reqSessionAdmn = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
                    $reqSessionAdmn->bindParam('loginF', $login, PDO::PARAM_STR);
                    $reqSessionAdmn->execute();
                    $admin = [];
                    while($adm = $reqSessionAdmn->fetch(PDO::FETCH_ASSOC)){
                        $admin[] = new Admin($adm);
                    }
                    return $admin;
                    session_start();
                    $_SESSION['login'] = $login;
                    exit();
                }
            }else{
                return 'Veuillez entrez vos identifiants svp !';
            }
        }
    }
}
