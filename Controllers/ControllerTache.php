<?php

class ControllerTache extends ControllerTwig
{
    public static function tachePlanifier()
    {
        $twig = ControllerTwig::twigControl();
        $twig->getExtension(\Twig\Extension\CoreExtension::class)->setDateFormat('d/m/Y', '%d days');

        date_default_timezone_set('Europe/Paris');
        $now = date("d/m/Y H:i:s", time());
        $preResa = date('d/m/Y H:i:s', time() + (2 * 3600));
        return $now .' '. $preResa;
        

    }
}
