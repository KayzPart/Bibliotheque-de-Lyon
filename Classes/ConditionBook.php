<?php   
    class ConditionBook extends Classes{
        private $_id_condition_book;
        private $_status_condition;

        public function getId_condition_book(){
            return $this->_id_condition_book;
        }
        public function getStatus_condition(){
            return $this->_status_condition;
        }
        public function setId_condition_book(int $id_condition_book){
            $this->_id_condition_book = $id_condition_book;
        }
        public function setStatus_condition($status_condition){
            $this->_status_condition = $status_condition;
        }
    }