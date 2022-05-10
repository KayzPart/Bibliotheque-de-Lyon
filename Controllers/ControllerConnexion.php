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
        public static function connexionAdmin($login){
            $manager = new ModelAdmin();
            $logAct = $manager->activeSessionAdmin($login);
            require_once './Views/spaceAdmin.php';
        }
    }