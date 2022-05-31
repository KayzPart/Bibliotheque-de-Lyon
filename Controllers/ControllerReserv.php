<?php
    class ControllerReserv extends ControllerTwig{

        public static function bookings($idUser, $idBook, $idCondition){
            
            $twig = ControllerTwig::twigControl();
            $datasReserv = new ModelReserv();
            $reserv = $datasReserv->bookReserv($idUser, $idBook, $idCondition);
            echo $twig->render('book.twig', ['user' => $reserv[0], 'book' => $reserv[1], 'condition' => $reserv[2], 'day' => $reserv[3], 'limit' => $reserv[4],'root' => ROOT]);
        }

        public static function booking($id){
            $twig = ControllerTwig::twigControl();
            $reserv = new ModelReserv();
            [$book, $condition, $user, $booking] = $reserv->bookSelect($id);
            echo $twig->render('userReserv.twig', ['root' => ROOT ]);
        }
    }