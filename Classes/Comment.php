<?php 
class Comment extends Classes{
    private $_id_comment;
    private $_title_comment;
    private $_content_comment;
    private $_id_book;
    private $_id_user;

    public function getId_comment(){
        return $this->_id_comment;
    }

    public function getTitle_comment(){
        return $this->_title_comment;
    }

    public function getContent_comment(){
        return $this->_content_comment;
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

    public function setTitle_comment($title_comment){
        $this->_title_comment = $title_comment;
    }

    public function setContent_comment($content_comment){
        $this->_content_comment = $content_comment;
    }

    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }
}