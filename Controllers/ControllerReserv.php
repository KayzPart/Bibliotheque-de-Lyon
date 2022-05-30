<?php
    class ControllerReserv extends ControllerTwig{

        public static function bookings(){
            $twig = ControllerTwig::twigControl();
            $datasReserv = new ModelReserv();
            $reserv = $datasReserv->bookReserv();
        }
    }