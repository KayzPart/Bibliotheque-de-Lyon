<?php 

    class ControllerConnexion {
        public static function connectAdmin(){
            session_start();
            $manager = new ModelConnexion();
            $logAdmin = $manager->connectAdminSession();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectAdmin.twig');
        }
        public static function connectUser(){
            session_start();
            $manager = new ModelConnexion();
            $logUser = $manager->connectUserSession();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectUser.twig');
        }
    }