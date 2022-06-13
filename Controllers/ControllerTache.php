<?php 

class ControllerTache extends ControllerTwig{
    public static function tachePlanifier(){
        $twig = ControllerTwig::twigControl();
        $twig->getExtension(\Twig\Extension\CoreExtension::class)->setDateFormat('d/m/Y', '%d days');
    }
}