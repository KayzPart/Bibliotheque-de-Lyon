<?php 
class Book extends Classes{

    private $_id_book;
    private $_id_category;
    private $_id_condition_book;
    private $_title;
    private $_author;
    private $_year_published;
    private $_descrip;
    private $_isbn;
    private $_photo;
    private $_emplacement;
    private $_lang;
    private $_quantity;

    public function getId_book(){
        return $this->_id_book;
    }

    public function getId_category(){
        return $this->_id_category;
    }

    public function getId_condition_book(){
        return $this->_id_condition_book;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getAuthor(){
        return $this->_author;
    }

    public function getYear_published(){
        return $this->_year_published;
    }

    public function getDescrip(){
        return $this->_descrip;
    }

    public function getIsbn(){
        return $this->_isbn;
    }

    public function getPhoto(){
        return $this->_photo;
    }

    public function getEmplacement(){
        return $this->_emplacement;
    }

    public function getLang(){
        return $this->_lang;
    }

    public function getQuantity(){
        return $this->_quantity;
    }
    
    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

    public function setId_category($id_category){
        $this->_id_category = $id_category;
    }

    public function setId_condition_book($id_condition_book){
        $this->_id_condition_book = $id_condition_book;
    }

    public function setTitle($title){
        $this->_title = $title;
    }

    public function setAuthor($author){
        $this->_author = $author;
    }

    public function setYear_published($year_published){
        $this->_year_published = $year_published;
    }

    public function setDescrip($descrip){
        $this->_descrip = $descrip;
    }

    public function setIsbn($isbn){
        $this->_isbn = $isbn;
    }

    public function setPhoto($photo){
        $this->_photo = $photo;
    }

    public function setEmplacement($emplacement){
        $this->_emplacement = $emplacement;
    }

    public function setLang($lang){
        $this->_lang = $lang;
    }

    public function setQuantity($quantity){
        $this->_quantity = $quantity;
    }
}