<?php 

    class ControllerUser{
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
            $manager = new ModelUser();
            $logUse = $manager->sessionUser();
        }
        public static function space(){
            session_start();
            require_once './Views/spaceUser.php';
        }
    }