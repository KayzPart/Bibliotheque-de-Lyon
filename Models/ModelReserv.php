<?php
    class ModelReserv extends Model{
        public function bookReserv(){
            $idBook = $_GET['id_book'];
            $idUser = $_GET['id_user'];
            $idCondition = $_GET['id_condition_book'];
            $today = date('Y-m-d'); 
            $limitReserv = date('Y-m-d', strtotime('+21days'));

            $db = $this->getdb();
            $reqReserv = $db->prepare('INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:id_book, :id_user, :id_condition_book, :date_reserv, :end_date_reserv,)');
            $reqReserv->bindParam('id_book', $idBook['id_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('id_user', $idUser['id_user'], PDO::PARAM_INT);
            $reqReserv->bindParam('id_condition_book', $idCondition['id_condition_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('date_reserv', $today, PDO::PARAM_INT);
            $reqReserv->bindParam('end_date_reserv', $limitReserv, PDO::PARAM_INT);
        }
    }