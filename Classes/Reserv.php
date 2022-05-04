<?php 
class Reserv extends Classes{
    private $_id_reserv;
    private $_id_user;
    private $_id_book;
    private $_change_condition;

    public function getId_reserv(){
        return $this->_id_reserv;
    }

    public function getId_user(){
        return $this->_id_user;
    }

    public function getId_book(){
        return $this->_id_book;
    }

    public function getChange_condition(){
        return $this->_change_condition;
    }

    public function getDate_reserv(){
        return $this->_date_reserv;
    }

    public function getDate_limit(){
        return $this->_date_limit;
    }

    public function setId_reserv($id_reserv){
        $this->_id_reserv = $id_reserv;
    }

    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }

    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }
    
    public function setChange_condition($change_condition){
        $this->_change_condition = $change_condition;
    }

    public function setDate_reserv($date_reserv){
        $this->_date_reserv = $date_reserv;
    }

    public function setDate_limit($date_limit){
        $this->_date_limit = $date_limit;
    }

}