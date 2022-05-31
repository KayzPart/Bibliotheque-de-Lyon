<?php 

    class ControllerUser extends ControllerTwig{
        // Formulaire de contact
        // public static function contactForm(){
        //     $loader = new Twig\Loader\FilesystemLoader('./Views');
        //     $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        //     $twig->addExtension(new \Twig\Extension\DebugExtension());

        //     $manager = new ModelUser();
        //     // $datas = $manager->sendForm(); 
        //     echo $twig->render('homepage.twig');
        // }
        public static function connexionUser(){
            session_start(); 
            $email = $_POST['email'];
            $password = $_POST['password'];
            $manager = new ModelUser();
            $user = $manager->sessionUser($email);
            

            if($user != "Email ou Mot de passe incorrect"){
                $passwordVerif = password_verify($password, $user->getPassword());

                if($passwordVerif){
                    $_SESSION['userId'] = $user->getId_user();
                    echo "Vous êtes connecter avec succès $email";
                    header('Location: ./spaceUser');
                }else{

                    echo "Email ou  Mot de passe incorrect";
                    header('Refresh: 2; url = ./connectUser');
                }
            }else{
                echo "Mail ou  Mot de passe incorrect";
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
        public static function space(){
            session_start();
            if(!isset($_SESSION['userId'])){
                header("Refresh: 0.01; url = ./connectUser");
            }
            $twig = Controllertwig::twigcontrol();
            echo $twig->render('spaceUser.twig', ['root' => ROOT, 'id_user' => $_SESSION['userId']]);
        }
        public static function userSpace($id){
            session_start();
            $twig = Controllertwig::twigcontrol();
            
            $id = $_SESSION['userId']; 
            
            $datas = new ModelUser();
            $user = $datas->selectUser($id);
            if(isset($_POST['submit'])){                
                $nemail = $_POST['newemail']; 
                $opassword = $_POST['oldpassword']; 
                $npassword = $_POST['newpassword']; 
            
                if(password_verify($opassword, $user->getPassword())){
                    $hashe = password_hash($npassword, PASSWORD_DEFAULT);
                    $update = $datas->userUpdate($id, $hashe, $nemail);
                    echo 'Nous avons modifer vos données avec succès ! Vous aller être redirigé vers votre espace personnel';
                    header('Refresh: 4s; url = ./spaceUser');
                }else{
                    echo 'Les données que vous entrer ne corresponde pas avec vos données enregistreer dans notre base de données';
                }
            }
            echo $twig->render('user_modif.twig', ['root' => ROOT, 'u' => $user]);
        }

        // Modification compte user
        // public static function updateUser(){
        //     session_start();

            
        //     $twig = ControllerTwig::twigControl();
        //     $newDatas = new ModelUSer();

        //     $oldUser = $newDatas->selectUser($id);
        //     var_dump($oldUser);
            
        //     // $user = $newDatas->userUpdate();
            
        //     echo $twig->render('user_modif.twig', ['root' => ROOT]);
        // }

        // Direction formulaire inscription user
        public static function inscriptionUser(){
            $twig = ControllerTwig::twigControl();
            echo $twig->render('spaceAdmin.twig', ['root' => ROOT]);
        }

        // Formulaire inscription user
        public static function spaceInscripUse($datas){
            $twig = ControllerTwig::twigControl();
            $datas = $_POST;
            $user = new ModelUser();
            $datas = $user->userInscription($datas);
            echo $twig->render('registration_user.twig', ['user' => $datas, 'root' => ROOT]);
            var_dump($datas);
        }

        
    }