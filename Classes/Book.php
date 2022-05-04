<?php 
class Book extends Classes{
    private $_id_book;
    private $_title;
    private $_author;
    private $_year_published;
    private $_description;
    private $_category;
    private $_num_isbn;
    private $_quantity;
    private $_photo;
    private $_emplacement;
    private $_lang;
    private $_condition;
    private $_date_limit;

    public function getId_book(){
        return $this->_id_book;
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

    public function getDescription(){
        return $this->_description;
    }

    public function getCategory(){
        return $this->_category;
    }

    public function getNum_isbn(){
        return $this->_num_isbn;
    }

    public function getQuantity(){
        return $this->_quantity;
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

    public function getCondition(){
        return $this->_condition;
    }

    public function getDate_limit(){
        return $this->_date_limit;
    }
    
    public function setId_book($id_book){
        $this->_id_book = $id_book;
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

    public function setDescription($description){
        $this->_description = $description;
    }

    public function setCategory($category){
        $this->_category = $category;
    }

    public function setNum_isbn($num_isbn){
        $this->_num_isbn = $num_isbn;
    }

    public function setQuantity($quantity){
        $this->_quantity = $quantity;
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

    public function setCondition($condition){
        $this->_condition = $condition;
    }

    public function setDate_limit($description){
        $this->_date_limit = $description;
    }
}