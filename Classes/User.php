<?php 
class User extends Classes{
    private $_id_user;
    private $_firstname;
    private $_lastname;
    private $_password;
    private $_email;
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

    public function getPassword(){
        return $this->_password;
    }

    public function getEmail(){
        return $this->_email;
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

    public function setPassword($password){
        $this->_password = $password;
    }

    public function setEmail($email){
        $this->_email = $email;
    }

    public function setNum_member($num_member){
        $this->_num_member = $num_member;
    }
}