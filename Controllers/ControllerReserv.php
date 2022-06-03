<?php
class ControllerReserv extends ControllerTwig
{

    // public static function bookings($idBook, $idUse, $idCondition, $today, $limitReserv)
    // {
    //     session_start();
    //     $twig = ControllerTwig::twigControl();
    //     $idUse = $_SESSION['userId'];
    //     if (isset($_POST['submit'])) {
    //         $idBook = $_POST['id_book'];
    //         $idCondition = $_POST['id_condition_book'];
    //         $today = date('Y-m-d');
    //         $limitReserv = date('Y-m-d', strtotime('+21days'));
    //         $rv = new ModelReserv();
    //         $rv->bookReserv($idBook, $idUse, $idCondition, $today, $limitReserv);
    //     }
    //     if (!isset($_SESSION['userId'])) {
    //         header("Refresh: 0.01; url = ./connectUser");
    //     }

    //     echo $twig->render('userReserv.twig', ['root' => ROOT, 'r' => $rv]);
    // }
    // public static function reservation(){
    //     session_start(); 
    //     $twig = ControllerTwig::twigControl();
    //     echo $twig->render('book.twig', ['root' => ROOT]);
    // }
    public static function bookings(){
        session_start();
        $twig = ControllerTwig::twigControl();
        $datas = $_POST;
        if(isset($_SESSION['userId'])){
            $rv = new ModelReserv();
            $rv->bookReserv($datas);
            echo $twig->render('userReserv.twig', ['root' => ROOT, $_POST['id_book'], $_POST['id_condition_book']]);
        }
        if(!isset($_SESSION['userId'])){
            echo 'Veuillez vous connecter avant de réserver un livre';
            header('Refresh: 2; url= ../connectUser');
        }
        
        
        
    }
    // public static function reservShow(){
    //     session_start(); 
    //     if(!isset($_SESSION['userId'])){
    //         echo 'Vous devez vous connecter avant de réserver un livre';
    //         header('Refresh: 2; url = ./connectUser');
    //     }
    // }
}
