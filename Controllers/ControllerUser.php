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

            $twig = Controllertwig::twigcontrol();
            
            session_start();

            echo $twig->render('spaceUser.twig', ['root' => ROOT]);
        }
    }