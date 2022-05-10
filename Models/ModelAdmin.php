<?php
class ModelAdmin extends Model
{
    public function sessionAdmin($id){
        $db = $this->getDb();
        $reqAdmin = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `id_admin` = :id');
        $reqAdmin->bindParam('id', $id, PDO::PARAM_INT);
        $reqAdmin->execute();
        $admn = [];
        while($admin = $reqAdmin->fetch(PDO::FETCH_ASSOC)){
            $admn = new Admin($admin);
        }
        return $admn;
    }
    public function activeSessionAdmin($login, $password){
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $db = $this->getDb();
            $reqSessionAdmn = $db->prepare('SELECT `id_admin`, `login`, `password` FROM `admin` WHERE `login` = :loginF');
            $reqSessionAdmn->bindParam('loginF', $login, PDO::PARAM_STR);
            $reqSessionAdmn->execute();
            return new Admin($reqSessionAdmn->fetch(PDO::FETCH_ASSOC));

            $log = $reqSessionAdmn->fetch(PDO::FETCH_ASSOC);
            if($reqSessionAdmn->rowCount() > 0 && $log['password']  == $password){
                $_SESSION['adminId'] = $log['id_admin'];
                header('Location: ./Views/spaceAdmin.php');
            }else{
                return 'Erreur login/password';
            }
        }
    }
}
