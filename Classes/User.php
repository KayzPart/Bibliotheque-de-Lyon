<?php 
class User {
    private $_id_user;
    private $_firstname;
    private $_lastname;
    private $_password_user;
    private $_num_member;

    public function getId_user(){
        return $this->_id_user;
    }

    public function getFirstname(){
        return $this->_firstname;
    }

    public function getLastname(){
        return $this->_lastname;
    }

    public function getPassword_user(){
        return $this->_password_user;
    }

    public function getNum_member(){
        return $this->_num_member;
    }

    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }

    public function setFirstname($firstname){
        $this->_firstname = $firstname;
    }

    public function setLastname($lastname){
        $this->_lastname = $lastname;
    }

    public function setPassword_user($password_user){
        $this->_password_user = $password_user;
    }

    public function setNum_member($num_member){
        $this->_num_member = $num_member;
    }
}