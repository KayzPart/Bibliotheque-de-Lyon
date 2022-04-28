<?php 
class Quantity_book {
    private $_id_quantity_book;
    private $_id_book; 
    private $_num_isbn; 

    public function getId_quantity_book(){
        return $this->_id_quantity_book;
    }

    public function getId_book(){
        return $this->_id_book;
    }

    public function getNum_isbn(){
        return $this->_num_isbn;
    }

    public function setId_quantity_book($id_quantity_book){
        $this->_id_quantity_book = $id_quantity_book;
    }

    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

    public function setNum_isbn($num_isbn){
        $this->_num_isbn = $num_isbn;
    }
}