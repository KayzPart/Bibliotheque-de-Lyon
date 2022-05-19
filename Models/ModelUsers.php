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

    public function sessionUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user` WHERE `email` = :mail');
        $req->bindParam('mail', $email, PDO::PARAM_STR);
        $req->execute();
        $log = $req->fetch(PDO::FETCH_ASSOC);
        if($req->rowCount() > 0 && $log['password'] == $password){
            $_SESSION['userId'] = $log['id_user'];
            echo "Vous êtes connecter avec succèes $email !";
            header('Location: ./spaceUser');
        }else{
            echo "Email ou Mot de passe incorrect";
            header('Refresh: 2; url = ./connectUser');
        }
        if (!isset($_SESSION['userId'])){
            header('Refresh: 2; url = ./connectUser');
            echo " Vous devez vous connecter pour accéder à l'espace utilisateur.
            <br><br>
            < La redirection vers la page de connexion est en cours ... </i>";
            exit(0);
        }

    }
    public function HashPassword()
    {
        $password = `:password`;
        $key_password = "la clé";
        $key_password1 = "la deuxieme clé";

        $encrypted_password = openssl_encrypt($password, "AES-128-ECB", $key_password);
        var_dump($encrypted_password);

        $decrypted_password = openssl_decrypt(
            $encrypted_password,
            "AES-128-ECB",
            $key_password
        );
        var_dump($decrypted_password);
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
