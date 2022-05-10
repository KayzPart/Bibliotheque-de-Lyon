<?php

class ControllerAdmin
{
    public static function connexionAdmin($login, $password){
        $manager = new ModelAdmin();
        $logAct = $manager->activeSessionAdmin($login, $password);
        require_once './Views/spaceAdmin.php';

    }
}
