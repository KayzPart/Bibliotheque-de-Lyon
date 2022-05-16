<?php   
    class Category extends Classes{
        private $_id_category;
        private $_name_category;

        public function getId_category(){
            return $this->_id_category;
        }
        public function getName_category(){
            return $this->_name_category;
        }
        public function setId_category( $id_category){
            $this->_id_category = $id_category;
        }
        public function setName_category($name_category){
            $this->_name_category = $name_category;
        }

    }