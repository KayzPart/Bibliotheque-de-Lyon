<?php
class ControllerReserv extends ControllerTwig
{
    // Insert réservation
    public static function bookings()
    {
        session_start();
        $twig = ControllerTwig::twigControl();
        $datas = $_POST;
        if (isset($_SESSION['userId'])) {
            $rv = new ModelReserv();
            $rv->bookReserv($datas);
            header('Location: ./userReserv');
        }
        if (!isset($_SESSION['userId'])) {
            echo 'Veuillez vous connecter avant de réserver un livre';
            header('Location: ./connectUser');
        }
    }
    // Affichage des réservation en cours sur page userReserv 
    public static function viewHistory()
    {
        session_start();
        $twig = ControllerTwig::twigControl();
        $twig->getExtension(\Twig\Extension\CoreExtension::class)->setDateFormat('d/m/Y', '%d days');
        if (isset($_SESSION['userId'])) {
            $datasReserv = new ModelReserv();
            $reserv = $datasReserv->selectReserv();
            echo $twig->render('userReserv.twig', ['root' => ROOT, 'reservs' => $reserv[0], 'book' => $reserv[1]]);
        }
        if (!isset($_SESSION['userId'])) {
            header("Refresh: 0.01; url = ./connectUser");
        }
    }
}
