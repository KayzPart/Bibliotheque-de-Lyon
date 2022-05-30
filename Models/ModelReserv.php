<?php
    class ModelReserv extends Model{
        public function bookReserv(){
            $idBook = $_GET['id_book'];
            $idUser = $_GET['id_user'];
            $idCondition = $_GET['id_condition_book'];
            $today = date('Y-m-d'); 
            $limitReserv = date('Y-m-d', strtotime('+21days'));

            $db = $this->getdb();

            // Select id_user
            $reqUser = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `password`, `email`, `num_member` FROM `user` WHERE `id_user` = :idUser');
            $reqUser->bindParam('id_user', $idUser, PDO::PARAM_INT);
            $reqUser->execute();

            // Select book 
            $reqBook = $db->prepare('SELECT `id_book`,`id_condition_book`, `quantity` FROM `book` WHERE `id_condition_book` = :idCondition');
            $reqBook->bindParam('idCondition', $idCondition['id_condition_book']); 
            $reqBook->execute();
            $dataBook = $reqBook->fetch(PDO::FETCH_ASSOC);
            $book = new Book($dataBook);

            $dataUser = $reqUser->fetch(PDO::FETCH_ASSOC);
            $user = new User($dataUser);

            $reqReserv = $db->prepare('INSERT INTO `reserv`(`id_book`, `id_user`, `id_condition_book`, `date_reserv`, `end_date_reserv`) VALUES (:id_book, :id_user, :id_condition_book, :date_reserv, :end_date_reserv,)');
            $reqReserv->bindParam('id_book', $idBook['id_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('id_user', $idUser['id_user'], PDO::PARAM_INT);
            $reqReserv->bindParam('id_condition_book', $idCondition['id_condition_book'], PDO::PARAM_INT);
            $reqReserv->bindParam('date_reserv', $today, PDO::PARAM_INT);
            $reqReserv->bindParam('end_date_reserv', $limitReserv, PDO::PARAM_INT);
            $reqReserv->execute();

            $dataReserv = $reqReserv->fetch(PDO::FETCH_ASSOC);
            $reserv = new Reserv($dataReserv);
            
            return [$user, $book, $reserv];
        }
    }