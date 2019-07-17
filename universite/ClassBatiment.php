<?php
require_once 'Autoloader.php';
Autoloader::register();
    class ClassBatiment {
        protected $nombat;



        public function __construct ($nombat){
            $this->nombat=$nombat;



        }

        

        /**
         * Get the value of nombat
         */ 
        public function getNombat()
        {
                return $this->nombat;
        }

        /**
         * Set the value of nombat
         *
         * @return  self
         */ 
        public function setNombat($nombat)
        {
                $this->nombat = $nombat;

                return $this;
        }
    }
?>