<?php

use Symfony\Component\VarDumper\VarDumper;

class ModelReserv extends Model
{
    // Insert réservation
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
    // Sélect Réservation 
    public function selectReserv($id){
        $id = isset($_SESSION['userId']) ? $_SESSION['userId'] : 'test';
        $db = $this->getDb();
        $select = $db->prepare('SELECT `id_reserv`, `book`.`id_book`, `book`.`title`, `book`.`isbn`, `end_date_reserv` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` WHERE `reserv`.`id_user` = :id_use');
        $select->bindParam('id_use', $id, PDO::PARAM_INT);
        $select->execute(); 

        $reservation = [];  
        $bookarray = [];
        while($dataR = $select->fetch(PDO::FETCH_ASSOC)){
            $reservation[] = new Reserv($dataR); 
            $bookarray[] = new Book($dataR);
        }
        return [$reservation, $bookarray];

    }

    // Réservation - Admin - View
    public function viewReserv($id){
        $db = $this->getdb(); 
        $req = $db->prepare('SELECT `id_reserv`, `book`.`id_book`, `book`.`title`, `book`.`isbn`, `date_reserv`, `end_date_reserv`, `user`.`num_member`, `condition_book`.`status_condition` FROM `reserv` INNER JOIN `book` ON `book`.`id_book` = `reserv`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `reserv`.`id_user` INNER JOIN `condition_book` ON `condition_book`.`id_condition_book` = `reserv`.`id_condition_book` WHERE `id_book` = :id `'); 
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();

        $viewResa = []; 
        $book = [];
        $condi = [];
        while($vr = $req->fetch(PDO::FETCH_ASSOC)){
            $viewResa[] = new Reserv($vr);
            $book[] = new Book($vr);
            $condi[] = new ConditionBook($vr);
        }
        return [$viewResa, $book, $condi];
    }
}
