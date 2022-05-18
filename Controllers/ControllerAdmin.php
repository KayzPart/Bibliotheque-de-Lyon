<?php

class ControllerAdmin{
    public static function connexionAdmin(){
        session_start();
        $manager = new ModelAdmin();
        $logAct = $manager->activeSessionAdmin();
        require_once './Views/spaceAdmin.php';
    }

}
