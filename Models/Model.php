<?php 
abstract class Model {       
    private static $_db;    
    protected function getDb(){
        if(self::$_db === null){
            self::setDb();
        }

        return self::$_db;
    }

    private static function setDb(){
         try {                                    
            self::$_db = new PDO('mysql:host=localhost;dbname=library;charset=utf8','root');
        } catch (Exception $e) {
            echo 'Erreur :' .$e->getMessage();
        }
    }
}