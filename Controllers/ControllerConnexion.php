<?php 

    class ControllerConnexion {
        public static function connectAdmin(){
            session_start();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectAdmin.twig', ['root' => ROOT]);
        }
        public static function connectUser(){
            session_start();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectUser.twig', ['root' => ROOT]);
        }
    }