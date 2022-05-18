<?php 

    class ControllerConnexion {
        public static function connectAdmin(){
            session_start();
            require_once './Views/connectAdmin.php';
        }
        public static function connectUser(){
            require_once './Views/connectUser.php';
        }
        
        public function connexionUser($mail){
            $manager = new ModelUser();
            $logUse = $manager->activeSessionUser($mail);
            require_once './Views/spaceUser.php';
        }
    }