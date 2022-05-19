<?php

class ControllerAdmin{
    public static function connexionAdmin(){
        session_start();
        $manager = new ModelAdmin();
        $logAct = $manager->sessionAdmin();
        require_once './Views/spaceAdmin.php';
    }

}
