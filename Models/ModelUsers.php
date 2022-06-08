<?php
class ModelUser extends Model
{
    public function userInscription($datas)
    {

        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            // Générer numéro adhérant aléatoire 
            $generateNumber = random_bytes(5);
            $resultGenerateNumber = (bin2hex($generateNumber));
            $numberAd = $resultGenerateNumber;
            echo $numberAd;

            // Générer mot de passe aléatoire
            $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $combLen = strlen($comb) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $combLen);
                $pass[] = $comb[$n];
            }
            $generateMdp = implode($pass);

            // Verification email
            if (preg_match('~(\w+)(\S)@(\w+)(\S)\.(\S)([a-zA-Z])~', $email)) {
                echo 'email ok';
            } else {
                echo 'Veuillez entrer un format d\'email valide';
            }

            // Envoie du mail à l'utilisateur pour récupérer son mot de passe 

            $destinataire = $email;
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            $expediteur = 'bibliolyon@lyon.fr';
            $sujet = "Mot de passe"; // sujet du mail
            $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
            $headers .= 'From: ' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
               
            $message = 'Bonjour ! Suite à votre demande d\'inscription, nous avons le plaisir de vous annoncer que cette dernière à été réaliser avec succès.Voici votre mot de passe générer aléatoirement, il reste modifiable dans votre espace personnel: ' . $generateMdp . '.Votre numéro d\'adhérent est le suivant: ' . $resultGenerateNumber . '';
            
            if (mail($destinataire, $sujet, $message, $headers)) // Envoi du message
            {
                echo 'L\'envoie du mot de passe à bien été envoyer à l\'utilisateur ';
            } else // Non envoyé
            {
                echo "Votre message n'a pas pu être envoyé";
            }

            $password = $generateMdp;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $db = $this->getDb();
            $reqUserInscr = $db->prepare("INSERT INTO `user`(`firstname`, `lastname`, `password`, `email`, `num_member`) VALUES (:firstname, :lastname, :hashed_password, :email, :resultGenerateNumber)");
            $reqUserInscr->bindParam('firstname', $firstname, PDO::PARAM_STR);
            $reqUserInscr->bindParam('lastname', $lastname, PDO::PARAM_STR);
            $reqUserInscr->bindParam('hashed_password', $hashed_password, PDO::PARAM_STR);
            $reqUserInscr->bindParam('email', $email, PDO::PARAM_STR);
            $reqUserInscr->bindParam('resultGenerateNumber',  $resultGenerateNumber, PDO::PARAM_STR);
            $reqUserInscr->execute();

            $newUser = [];
            while ($usr = $reqUserInscr->fetch(PDO::FETCH_ASSOC)) {
                $newUser[] = new User($usr);
            }
            return $newUser;
            echo 'Votre adhérent à été ajouté à la base de donnée avec succès';
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
    public function selectUser($id)
    {
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user` WHERE `id_user` = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return new User($data);

    }

    // Modification compte user
    public function userUpdate($id, $hashe, $nemail)
    {
        if (isset($_POST['submit'])) {
            $db = $this->getDb();

            $update = $db->prepare('UPDATE `user` SET `password`= :hashe,`email`= :nemail WHERE `id_user` = :id');
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('hashe', $hashe, PDO::PARAM_STR);
            $update->bindParam('nemail', $nemail, PDO::PARAM_STR);
            $update->execute();

            $userUpdate = [];
            while ($up = $update->fetch(PDO::FETCH_ASSOC)) {
                $userUpdate[] = new User($up);
            }
            return $userUpdate;
        } 
    }

    // Envoie du formulaire de contact
    public function sendForm($firstname, $lastname, $email, $msg)
    {
        if (isset($_POST['submit'])) {

            $destinataire = 'bibliolyon@lyon.fr';
            $expediteur = $email;
            $sujet = "Formulaire de contact";
            $headers = 'MIME-Version: 1.0' . "\n";
            $headers .= 'Reply-To: ' . $expediteur . "\n";
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n";
            $headers .= 'Delivered-to: ' . $destinataire . "\n";
            $headers .= 'Reply-To: ' . $expediteur . "\n";
            $headers .= 'From: ' . $expediteur . '>' . "\n";
            $headers .= 'Delivered-to: ' . $destinataire . "\n";
            $message = $msg;


            if (mail($destinataire, $sujet, $message, $headers)) {
                echo 'Bonjour ' .$firstname. '. <br><br> Votre message à bien été envoyer, nous vous répondrons dans les plus brefs délais';
                
                
            } else {
                echo 'Votre message n\'as pas pu être réceptionner';
            }
        }
    }
}
