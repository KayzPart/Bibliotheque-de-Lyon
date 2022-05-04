<?php 
class Gender extends Classes{
    private $_id_gender;
    private $_name_gender;

    public function getId_gender(){
        return $this->_id_gender;
    }

    public function getName_gender(){
        return $this->_name_gender;
    }

    public function setId_gender($id_gender){
        $this->_id_gender = $id_gender;
    }

    public function setName_gender($name_gender){
        $this->_name_gender = $name_gender;
    }

}