<?php 
    class ModelUser extends Model{
        // public function readUser(){
        //     $req = $this->getDb()->query('INSERT INTO `id_user`, `firstname`, `lastname`, `mail`, `num_member` FROM `user`');

        //     $arrayUser = [];
        //     while($user = $req->fetch(PDO::FETCH_ASSOC)){
        //         $arrayUser[] = new User($user);
        //     }
        //     return $arrayUser;

        //     if(isset($_POST['password'])){
        //         $password = $_POST['password'];
        //         $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        //         $req = $this->getDb()->prepare('INSERT INTO `user`(`password_user`) VALUES (:hashed_pass)');

        //         $req->bindParam('hashed_pass', $hashed_pass, PDO::PARAM_STR);
        //         $req->execute();

        //         $req = $this->getDb()->query('SELECT `password_user` FROM `user`');

        //         $verify_pass = password_verify($password, $hashed_pass);
        //         var_dump($verify_pass);
        //     }
        // }
        public function sessionUser($id){
            $db = $this->getDb();
            $req = $db->prepare('SELECT `id_user`, `mail`, `firstname`, `lastname`, `password_user`, `mail`, `num_member` FROM `user` WHERE `id_user` = :id');
            $req->bindParam('id', $id, PDO::PARAM_INT);
            $req->execute();
            $user = [];
            while($use = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User($use);
            }
            return $user;
            // return new User($req->fetch(PDO::FETCH_ASSOC));
        }
        public function activeSessionUser($mail){

            if(!empty($_POST)){
                $mail = $_POST['mail'];
                $password = $_POST['password'];
                if(!empty($_POST['mail']) && !empty($_POST['password'])){
                    if($_POST['mail'] !== $mail){
                        return 'Mauvais mail/password';
                    }elseif($_POST['password'] !== $password){
                        return 'Mauvais mail/password';
                    }
                    else{
    
                        $db = $this->getDb();
                        $reqSessionUse = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `mail`, `num_member` FROM `u$user` WHERE `mail`');
                        $reqSessionUse->bindParam('mail', $mail, PDO::PARAM_STR);
                        $reqSessionUse->execute();
                        $user = [];
                        while($use = $reqSessionUse->fetch(PDO::FETCH_ASSOC)){
                            $user[] = new User($use);
                        }
                        return $use;
                        session_start();
                        $_SESSION['mail'] = $mail;
                        exit();
                    }
                }else{
                    return 'Veuillez entrez vos identifiants svp !';
                }
            }
        }
    }