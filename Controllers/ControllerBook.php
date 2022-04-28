<?php
    class ControllerBook {
        public static function listAllBook(){
            $datas = new ModelBook ();

            $allBooks = $datas->listAll();
            require_once './Views/homepage.php';
        }

        public static function readBook(int $id){
            $datas = new ModelBook ();
            $book = $datas->select($id);
            require_once './Views/formBook.php';
        }
    }