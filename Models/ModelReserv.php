<?php
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



    public function bookReserv($idBk, $idUse, $idCondition, $today, $limitReserv)
    {
        $idUse = $_SESSION['userId']; 
        $db = $this->getdb();

        $reqReserv = $db->prepare('INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:idBook, :idUser, :idCondition, :today, :limitReserv,)');
        $reqReserv->bindParam('id_book', $idBk['id_book'], PDO::PARAM_INT);
        $reqReserv->bindParam('id_user', $idUse, PDO::PARAM_INT);
        $reqReserv->bindParam('id_condition_book', $idCondition, PDO::PARAM_INT);
        $reqReserv->bindParam('date_reserv', $today, PDO::PARAM_STR);
        $reqReserv->bindParam('end_date_reserv', $limitReserv, PDO::PARAM_STR);
        $reqReserv->execute();

        return 'Réservation effectuer';

        $dataReserv = $reqReserv->fetch(PDO::FETCH_ASSOC);
        $reserv = new Reserv($dataReserv);
        return $reserv;
    }
}
