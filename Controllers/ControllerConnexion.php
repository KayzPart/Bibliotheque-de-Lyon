<?php 

    class ControllerConnexion {
        public static function connect(){
            require_once './Views/connexion.php';
        }
        public static function connectAdmin(){
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