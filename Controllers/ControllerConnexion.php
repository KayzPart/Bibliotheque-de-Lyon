<?php 

    class ControllerConnexion {
        public static function connectAdmin(){
            session_start();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectAdmin.twig');
        }
        public static function connectUser(){
            session_start();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectUser.twig');
        }
        
        public function connexionUser($mail){
            $manager = new ModelUser();
            $logUse = $manager->activeSessionUser($mail);
            require_once './Views/spaceUser.php';
        }
    }