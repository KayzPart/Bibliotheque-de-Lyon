<?php 
class Comment extends Classes{
    private $_id_comment;
    private $_name_comment;
    private $_id_book;
    private $_id_user;

    public function getId_comment(){
        return $this->_id_comment;
    }

    public function getName_comment(){
        return $this->_name_comment;
    }

    public function getId_book(){
        return $this->_id_book;
    }

    public function getId_user(){
        return $this->_id_user;
    }

    public function setId_comment($id_comment){
        $this->_id_comment = $id_comment;
    }

    public function setName_comment($name_comment){
        $this->_name_comment = $name_comment;
    }

    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }
}