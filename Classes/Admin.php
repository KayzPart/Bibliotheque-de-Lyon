<?php 
class Admin extends Classes {
    private $_id_admin;
    private $_login;
    private $_password;

    public function getId_admin(){
        return $this->_id_admin;
    }

    public function getLogin(){
        return $this->_login;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function setId_admin($id_admin){
        $this->_id_admin = $id_admin;
    }

    public function setLogin($login){
        $this->_login = $login;
    }

    public function setPassword($password){
        $this->_password = $password;
    }
}