<?php

use Symfony\Component\VarDumper\VarDumper;

class ModelReserv extends Model
{
    // Insert réservation
    public function bookReserv($datas)
    {

        if (isset($_POST['submit'])) {
            $idUse = $_SESSION['userId'];

            $today = date('Y-m-d');
            $limitReserv = date('Y-m-d', strtotime('+21days'));
            $db = $this->getDb();

            $reqReserv = $db->prepare("INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:idBook, :idUse, :idCondition, :today, :limitReserv)");
            $reqReserv->bindParam('idBook', $datas['id_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('idUse', $idUse, PDO::PARAM_INT);
            $reqReserv->bindParam('idCondition', $datas['id_condition_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('today', $today, PDO::PARAM_STR);
            $reqReserv->bindParam('limitReserv', $limitReserv, PDO::PARAM_STR);
            $reqReserv->execute();

            echo 'Votre réservation à bien été éffectuer';
        }
    }

    // Sélect Réservation 
    public function selectReserv()
    {
        $id = isset($_SESSION['userId']) ? $_SESSION['userId'] : 'test';
        $db = $this->getDb();
        $select = $db->prepare('SELECT `id_reserv`, `book`.`id_book`, `book`.`title`, `book`.`isbn`, `end_date_reserv` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` WHERE `reserv`.`id_user` = :id_use');
        $select->bindParam('id_use', $id, PDO::PARAM_INT);
        $select->execute();

        $reservation = [];
        $bookarray = [];
        while ($dataR = $select->fetch(PDO::FETCH_ASSOC)) {
            $reservation[] = new Reserv($dataR);
            $bookarray[] = new Book($dataR);
        }
        return [$reservation, $bookarray];
    }

    // Réservation - Admin - View
    public function viewReserv($id)
    {
        $db = $this->getdb();
        $req = $db->prepare('SELECT `id_reserv`, `book`.`id_book`, `book`.`title`, `book`.`isbn`, `date_reserv`, `end_date_reserv`, `user`.`num_member`, `condition_book`.`status_condition` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` INNER JOIN `condition_book` ON `condition_book`.`id_condition_book` = `reserv`.`id_condition_book` WHERE `id_book` = :id `');
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();

        $viewResa = [];
        $book = [];
        $condi = [];
        while ($vr = $req->fetch(PDO::FETCH_ASSOC)) {
            $viewResa[] = new Reserv($vr);
            $book[] = new Book($vr);
            $condi[] = new ConditionBook($vr);
        }
        return [$viewResa, $book, $condi];
    }
    public function viewReservAd()
    {
        $db = $this->getdb();
        $req = $db->query('SELECT `id_reserv`, `book`.`id_book`, `book`.`title`, `book`.`isbn`, `date_reserv`, `end_date_reserv`, `user`.`num_member`, `user`.`id_user`, `condition_book`.`id_condition_book`,`condition_book`.`status_condition` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` INNER JOIN `condition_book` ON `condition_book`.`id_condition_book` = `reserv`.`id_condition_book`');

        $viewResaUser = [];
        $book = [];
        while ($vr = $req->fetch(PDO::FETCH_ASSOC)) {
            $viewResaUser[] = [new Reserv($vr), new User($vr)];
            $book[] = new Book($vr);
        }
        return [$viewResaUser, $book];
    }

    public function returnBooking($datas)
    {
        if (isset($_POST['submit'])) {

            $db = $this->getDb();

            $confirmReturn = $db->prepare('INSERT INTO `return_booking` (`id_reserv`, `id_user`, `id_book`, `id_condition_book`, `date_return`) VALUES (:idReserv, :idUse, :id, :idCondition, :date_return)');
            $confirmReturn->bindParam('idReserv', $datas['id_reserv'], PDO::PARAM_INT);
            $confirmReturn->bindParam('idUse', $datas['id_user'], PDO::PARAM_INT);
            $confirmReturn->bindParam('id', $datas['id_book'], PDO::PARAM_INT);
            $confirmReturn->bindParam('idCondition', $datas['id_condition_book'], PDO::PARAM_INT);
            $confirmReturn->bindParam('date_return', $datas['date_return'], PDO::PARAM_STR);
            $confirmReturn->execute();

            echo 'ok ok ok';
        }
    }

    public function deleteReserv($datas)
    {
        if (isset($_POST['submit'])) {
            $db = $this->getDb();

            $deleteReserv = $db->prepare('DELETE FROM `reserv` WHERE `id_book` = :id');
            $deleteReserv->bindParam('id', $datas['id_book'], PDO::PARAM_INT);
            $deleteReserv->execute();
        }
    }
    public function viewReturn()
    {
        $db = $this->getDb();
        $selectReturn = $db->prepare('SELECT `id_return_booking`, `book`.`id_book`, `book`.`title`, `book`.`isbn`, `date_reserv`, `end_date_reserv`, `user`.`num_member`, `user`.`id_user`, `condition_book`.`id_condition_book`,`condition_book`.`status_condition`, `date_return` FROM `return_booking` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` INNER JOIN `condition_book` ON `condition_book`.`id_condition_book` = `reserv`.`id_condition_book`');

        $viewReturn = [];
        $book = [];
        while ($vrb = $selectReturn->fetch(PDO::FETCH_ASSOC)) {
            $viewReturn[] = [new ReturnBooking($vrb), new User($vrb)];
            $book[] = new Book($vrb);
        }
    }
}
