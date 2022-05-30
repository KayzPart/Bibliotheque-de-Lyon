<?php
class ModelUser extends Model
{
    public function userInscription()
    {
        // Génère numéro adhérent aléatoire 
        $generateNumber = random_bytes(5);
        $resultGenerateNumber = (bin2hex($generateNumber));
        // $resultGenerateNumber = $numberAd;

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $resultGenerateNumber  = $_POST['numberAd'];

        echo $resultGenerateNumber;
        if(preg_match('~(\w+)(\S)@(\w+)(\S)\.(\S)([a-zA-Z])~', $email )){
            echo 'email ok';
        } else {
            echo 'email pas ok';
        }


        //  Génère un mot de passe aléatoire 
        $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        $generateMdp = implode($pass);


        


        if (isset($_POST['submit'])) {

            // Envoie du mail à l'utilisateur pour récupérer son mot de passe 

            $destinataire = 'particulier.flore@hotmail.com';
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $expediteur = 'bibliolyon@lyon.fr';
            $copie = 'bibliolyon@lyon.fr';
            $copie_cachee = 'bibliolyon@lyon.fr';
            $objet = 'Test'; // Objet du message
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
            $headers .= 'From: "Nom_de_expediteur"<' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
            $headers .= 'Cc: ' . $copie . "\n"; // Copie Cc
            $headers .= 'Bcc: ' . $copie_cachee . "\n\n"; // Copie cachée Bcc        
            $message = '<div style="width: 100%; text-align: center; font-weight: bold">Bonjour ! Suite à votre demande d\'inscription, nous avons le plaisir de vous annoncer que cette dernière à été réaliser avec succès.Voici votre mot de passe générer aléatoirement, il reste modifiable dans votre espace personnel. <br><br>' . $generateMdp . 'Votre numéro d\'adhérent est le suivant' .$resultGenerateNumber.'</div>';
            if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
            {
                echo 'L\'envoie du mot de passe à bien été envoyer à l\'utilisateur ';
            } else // Non envoyé
            {
                echo "Votre message n'a pas pu être envoyé";
            }

            // Accusé de réception du mail

            $destinataire = "particulier.flore@hotmail.com"; // adresse mail du destinataire
            $sujet = "Mot de passe"; // sujet du mail
            $message = "Ton destinataire a bien lu ton mail"; // message qui dira que le destinataire a bien lu votre mail
            // maintenant, on crée l'en-tête du mail
            $header = "From: particulier.flore@hotmail.com\r\n";
            $header .= "Disposition-Notification-To:particulier.flore@hotmail.com"; // c'est ici que l'on ajoute la directive
            mail($destinataire, $sujet, $message, $header); // on envois le mail

            $password = $generateMdp;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $db = $this->getDb();
            $reqUserInscr = $db->prepare("INSERT INTO `user`(`firstname`, `lastname`, `password`, `email`, `num_member`) VALUES (':firstname,':lastname',':hashed_password',':email',':resultGenerateNumber')");
            $reqUserInscr->bindParam('firstname', $firstname, PDO::PARAM_STR);
            $reqUserInscr->bindParam('lastname', $lastname, PDO::PARAM_STR);
            $reqUserInscr->bindParam('password', $hashed_password, PDO::PARAM_STR);
            $reqUserInscr->bindParam('email', $email, PDO::PARAM_STR);
            $reqUserInscr->bindParam('num_member',  $resultGenerateNumber , PDO::PARAM_STR);
            $reqUserInscr->execute();

            $newUser = [];
            while($usr = $reqUserInscr->fetch(PDO::FETCH_ASSOC)){
                $newUser[] = new User($usr);
            }
            return $newUser;
        }
    }
    public function sessionUser($email)
    {
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user` WHERE `email` = :mail');
        $req->bindParam('mail', $email, PDO::PARAM_STR);
        $req->execute();
        $log = $req->fetch(PDO::FETCH_ASSOC);
        if ($req->rowCount() > 0) {
            return new User($log);
        } else {
            return "Email ou Mot de passe incorrect";
        }
    }
    public function selectUser(){
        $db = $this->getDb();
        $req = $db->query('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user`');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $use = new User($data);
        return $use;
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
