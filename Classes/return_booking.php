<?php 
    class ReturnBooking extends Classes{
        private $_id_return_booking;
        private $_id_reserv;
        private $_id_user;
        private $_id_book;
        private $_id_condition_book;
        private $_date_return;

        public function getId_return_booking(){
            return $this->_id_return_booking;
        }
        public function getId_reserv(){
            return $this->_id_reserv;
        }
        public function getId_user(){
            return $this->_id_user;
        }
        public function getId_book(){
            return $this->_id_book;
        }
        public function getId_condition_book(){
            return $this->_id_condition_book;
        }
        public function getDate_return(){
            return $this->_date_return;
        }

        public function setId_return_booking($id_return_booking){
            $this->_id_return_booking = $id_return_booking;
        }
        public function setId_reserv($id_reserv){
            $this->_id_reserv = $id_reserv;
        }
        public function setId_user($id_user){
            $this->_id_user = $id_user;
        }
        public function setId_book($id_book){
            $this->_id_book = $id_book;
        }
        public function setDate_return($date_return){
            $this->_date_return = $date_return;
        }
    }