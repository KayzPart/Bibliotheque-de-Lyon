<?php 
class Favorite extends Classes{
    private $_id_favorite;
    private $_id_user;
    private $_id_book;

    public function getId_favorite(){
        return $this->_id_favorite;
    }

    public function getId_user(){
        return $this->_id_user;
    }

    public function getId_book(){
        return $this->_id_book;
    }

    public function setId_favorite($id_favorite){
        $this->_id_favorite = $id_favorite;
    }

    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }

    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

}