<?php 
class Admin {
    private $_id_admin;
    private $_number_employer;
    private $_password_admin;

    public function getId_admin(){
        return $this->_id_admin;
    }

    public function getNumber_employer(){
        return $this->_number_employer;
    }

    public function getPassword_admin(){
        return $this->_password_admin;
    }

    public function setId_admin($id_admin){
        $this->_id_admin = $id_admin;
    }

    public function setNumber_employer($number_employer){
        $this->_number_employer = $number_employer;
    }

    public function setPassword_admin($password_admin){
        $this->_password_admin = $password_admin;
    }
}