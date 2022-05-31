<?php 
class Reserv extends Classes{
    private $_id_reserv;
    private $_id_book;
    private $_id_user;
    private $_id_condition_book;
    private $_date_reserv;
    private $_end_date_reserv;

    public function getId_reserv(){
        return $this->_id_reserv;
    }
    public function getId_book(){
        return $this->_id_book;
    }
    public function getId_user(){
        return $this->_id_user;
    }
    public function getId_condition_book(){
        return $this->_id_condition_book;
    }
    public function getDate_reserv(){
        return $this->_date_reserv;
    }
    public function getEnd_date_reserv(){
        return $this->_end_date_reserv;
    }

    public function setId_reserv($id_reserv){
        $this->_id_reserv = $id_reserv;
    }

    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }
    
    public function setId_condition_book($id_condition_book){
        $this->_id_condition_book = $id_condition_book;
    }

    public function setDate_reserv($date_reserv){
        $this->_date_reserv = $date_reserv;
    }

    public function setEnd_date_limit($end_date_limit){
        $this->_end_date_limit = $end_date_limit;
    }

}