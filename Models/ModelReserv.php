<?php
class ModelReserv extends Model
{
    public function bookSelect($id)
    {
        $db = $this->getDb();
        $select = $db->prepare('SELECT `reserv`.`id_reserv`, `reserv`.`id_book`, `reserv`.`id_user`, `reserv`.`id_condition_book`, `date_reserv`, `end_date_reserv` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`ìd_user` INNER JOIN `condition_book` ON `condition_book`.`id_condition_book` = `reserv`.`id_condition_book` WHERE `reserv`.`id_book` = :id');
        $select->bindParam('id', $id, PDO::PARAM_INT);
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



    public function bookReserv($idUser, $idBook, $idCondition)
    {
        $today = date('Y-m-d');
        $limitReserv = date('Y-m-d', strtotime('+21days'));

        $db = $this->getdb();

        $reqReserv = $db->prepare('INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:idBook, :idUser, :idCondition, :today, :limitReserv,)');
        $reqReserv->bindParam('id_book', $idBook, PDO::PARAM_INT);
        $reqReserv->bindParam('id_user', $idUser, PDO::PARAM_INT);
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
