<?php

class ControllerAdmin{
    public static function connexionAdmin(){
        $manager = new ModelAdmin();
        $logAct = $manager->activeSessionAdmin();
        require_once './Views/spaceAdmin.php';
    }
}
