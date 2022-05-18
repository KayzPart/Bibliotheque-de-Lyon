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

    public function activeSessionUser($mail)
    {

        if (!empty($_POST)) {
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                if ($_POST['mail'] !== $mail) {
                    return 'Mauvais mail/password';
                } elseif ($_POST['password'] !== $password) {
                    return 'Mauvais mail/password';
                } else {

                    $db = $this->getDb();
                    $reqSessionUse = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `mail`, `num_member` FROM `u$user` WHERE `mail`');
                    $reqSessionUse->bindParam('mail', $mail, PDO::PARAM_STR);
                    $reqSessionUse->execute();
                    $user = [];
                    while ($use = $reqSessionUse->fetch(PDO::FETCH_ASSOC)) {
                        $user[] = new User($use);
                    }
                    return $use;
                    session_start();
                    $_SESSION['mail'] = $mail;
                    exit();
                }
            } else {
                return 'Veuillez entrez vos identifiants svp !';
            }
        }
    }
    public function HashPassword()
    {
        $password = `:password_user`;
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
