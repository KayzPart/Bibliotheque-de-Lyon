<?php 

    class ControllerConnexion extends ControllerTwig{
        public static function connectAdmin(){
            session_start();
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectAdmin.twig', ['root' => ROOT]);
        }
        public static function connectUser(){
            session_start();
            if(isset($_SESSION['userId'])){
                header('Location: '. ROOT .'/spaceUser');
            }
            $twig = ControllerTwig::twigControl();
            echo $twig->render('connectUser.twig', ['root' => ROOT]);
        }
        public static function deconnectAdmin(){
            session_start();
            unset($_SESSION['adminId']);
            session_destroy();
            header('Location: ./connectAdmin');
        }
        public static function deconnectUser(){
            session_start();
            unset($_SESSION['userId']);
            session_destroy();
            header('Location: ./');
        }
    }