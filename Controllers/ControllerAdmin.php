<?php

class ControllerAdmin{
    public static function connexionAdmin(){
        session_start();
        $manager = new ModelAdmin();
        $manager->sessionAdmin();
    }
    public static function space(){
        session_start();
        require_once './Views/spaceAdmin.php';
    }
}
