<?php
class ControllerReserv extends ControllerTwig
{

    public static function bookings(){
        session_start();
        $twig = ControllerTwig::twigControl();
        $today = date('Y-m-d');
        $limitReserv = date('Y-m-d', strtotime('+21days'));
        $idUse = $_SESSION['userId']; 
        $idBk = $_GET['id_book'];
        // $idCondition = getId_condition_book();
        var_dump($idBk);

        if (isset($_SESSION['userId'])) {
            $us = new ModelUser();
            $bk = new ModelBook();
            $rv = new ModelReserv();
            $user = $us->selectUser($idUse);
            // $book = $bk->select($id);
            
            $reserv = $rv->bookReserv($idBk, $idUse, $idCondition, $today, $limitReserv);
            
            // $reserv = $rv->bookReserv($data);
        }
        if(!isset($_SESSION['userId'])){
            header("Refresh: 0.01; url = ./connectUser");
        }

        echo $twig->render('userReserv.twig', ['root' => ROOT]);
    }
}
