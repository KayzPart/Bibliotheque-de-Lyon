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
            header('Refresh: 2; url= ../connectUser');
        }
    }
    // Affichage des réservation en cours sur page userReserv 
    public static function viewHistory($id)
    {
        session_start();
        $twig = ControllerTwig::twigControl();
        $twig->getExtension(\Twig\Extension\CoreExtension::class)->setDateFormat('d/m/Y', '%d days');
        if (isset($_SESSION['userId'])) {
            $datasReserv = new ModelReserv();
            $reserv = $datasReserv->selectReserv($id);
            echo $twig->render('userReserv.twig', ['root' => ROOT, 'reservs' => $reserv[0], 'book' => $reserv[1]]);
            var_dump($reserv[0]);
        }
        if (!isset($_SESSION['userId'])) {
            header("Refresh: 0.01; url = ./connectUser");
        }
    }
}
