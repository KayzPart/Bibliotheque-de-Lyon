<?php   
    class ModelResaBook extends Model{
        public function bookRsv($id){
            $db = $this->getDb();
            $idUser = $db->lastInsertId();
            $reqBooking = $db->prepare('INSERT INTO `reserv` (`id_book`, `id_user`, `change_condition`, `date_reserv`, `date_limit`) VALUES (:id_book,:change_condition, :date_reserv, :date_limit )');
            

            $reqBooking->execute();
        }
    } 