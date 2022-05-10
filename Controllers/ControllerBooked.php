<?php 

    class ControllerBooked{
        public static function resaBook($id){
            $manager = new ModelResaBook();
            $resa = $manager->bookRsv($id);
            require_once './Views/user_reserv.php';
        }
    }