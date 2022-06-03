<?php

use Symfony\Component\VarDumper\VarDumper;

class ModelReserv extends Model
{
    public function bookSelect($idCondition)
    {
        $idUse = $_SESSION['userId'];
        $db = $this->getDb();
        $select = $db->prepare('SELECT `id_reserv`, `book`.`title`, `user`.`firstname`, `condition_book`.`status_condition`, `date_reserv`, `end_date_reserv` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` INNER JOIN `condition_book` ON `condition_book`.`id_condition_book` = `reserv`.`id_condition_book` WHERE `reserv`.`id_condition_book` = :idCondition');
        $select->bindParam('idCondition', $idCondition, PDO::PARAM_INT);
        $select->execute();
        $booking = [];
        $user = [];
        $condition = [];
        $book = [];
        while ($b = $select->fetch(PDO::FETCH_ASSOC)) {
            $booking[] = new Reserv($b);
            $user[] = new User($b);
            $condition[] = new ConditionBook($b);
            $book = new Book($b);
        }
        return [$booking, $user, $condition, $book];
    }



    // public function bookReserv($id, $idUse, $idCondition, $today, $limitReserv)
    // {
    //     $idUse = $_SESSION['userId'];
    //     if (isset($_POST['submit'])) {
    //         $id = $_POST['id_book'];
    //         $idCondition = $_POST['id_condition_book'];
    //         $db = $this->getdb();

    //         $reqReserv = $db->prepare('INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:id, :idUser, :idCondition, :today, :limitReserv,)');
    //         $reqReserv->bindParam('id', $id, PDO::PARAM_INT);
    //         $reqReserv->bindParam('idUser', $idUse, PDO::PARAM_INT);
    //         $reqReserv->bindParam('idCondition', $idCondition, PDO::PARAM_INT);
    //         $reqReserv->bindParam('today', $today, PDO::PARAM_STR);
    //         $reqReserv->bindParam('limitReserv', $limitReserv, PDO::PARAM_STR);
    //         $reqReserv->execute();

    //         $reservBookUser = [];
    //         while($res = $reqReserv->fecth(PDO::FETCH_ASSOC)){
    //             $reservBookUser[] = new Reserv($res);
    //         }
    //         return $reservBookUser;
    //         echo 'Votre réservation à bien été éffectuer';
    //     }
    // }

    public function bookReserv($datas)
    {

        if (isset($_POST['submit'])) {
            $idUse = $_SESSION['userId'];
            // $idUse = $_SESSION['userId'];
            
            $today = date('Y-m-d');
            $limitReserv = date('Y-m-d', strtotime('+21days'));
            $db = $this->getdb();

            $reqReserv = $db->prepare("INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:idBook, :idUse, :idCondition, :today, :limitReserv)");
            $reqReserv->bindParam('idBook', $datas['id_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('idUse', $idUse, PDO::PARAM_INT);
            $reqReserv->bindParam('idCondition', $datas['id_condition_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('today', $today, PDO::PARAM_STR);
            $reqReserv->bindParam('limitReserv', $limitReserv, PDO::PARAM_STR);
            $reqReserv->execute();

            echo 'Votre réservation à bien été éffectuer';
            var_dump($datas['id_book'], $idUse, $datas['id_condition_book'], $today, $limitReserv);
        }
    }
}
