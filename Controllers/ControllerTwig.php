<?php

    class ControllerTwig{
        public static function twigControl(){
            $loader = new Twig\Loader\FilesystemLoader('./Views');
            $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
            $twig->addExtension(new \Twig\Extension\DebugExtension());

            return $twig;
        }
    }