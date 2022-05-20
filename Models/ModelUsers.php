<?php
class ModelUser extends Model
{
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
    // 

    public function sessionUser($email){
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user` WHERE `email` = :mail');
        $req->bindParam('mail', $email, PDO::PARAM_STR);
        $req->execute();
        $log = $req->fetch(PDO::FETCH_ASSOC);
        if($req->rowCount() > 0){
            return new User($log);
        }else{
            return "Email ou Mot de passe incorrect";
        }
        

    }

    // Envoie du formulaire de contact
    // public function sendForm()
    // {
    //     if (isset($_POST['submit'])) {
    //         $mail = $_POST['mail'];
    //         $msg = $_POST['msg'];
            
    //         $destinataire = 'particulier.flore@hotmail.com';
    //         $expediteur = $mail;
    //         $copie = $mail;
    //         $copie_cachee = $mail;
    //         $objet = "Formulaire de contact";
    //         $headers = 'MIME-Version: 1.0' . "\n";
    //         $headers .= 'Reply-To: ' . $expediteur . "\n";
    //         $headers .= 'From: "Nom_de_expediteur"<' . $expediteur . '>' . "\n";
    //         $headers .= 'Delivered-to: ' . $destinataire . "\n";
    //         $headers .= 'Cc: ' . $copie . "\n";
    //         $headers .= 'Bcc: ' . $copie_cachee . "\n\n";
    //         $message = $msg;

    //         if (mail($destinataire, $objet, $message, $headers)) {
    //             echo 'Votre message à bien été envoyé';
    //         } else {
    //             echo 'Votre message n\'as paspu être envoyer';
    //         }
    //     }
    // }
}
