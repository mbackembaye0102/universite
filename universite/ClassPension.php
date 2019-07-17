<?php
require_once 'Autoloader.php';
Autoloader::register();
    class ClassPension {
        protected $type_bourse;
        protected $montant;




        public function __construct ($type_bourse,$montant){
            $this->type_bourse=$type_bourse;
            $this->montant=$montant;



        }

        


        /**
         * Get the value of type_bourse
         */ 
        public function getType_bourse()
        {
                return $this->type_bourse;
        }

        /**
         * Set the value of type_bourse
         *
         * @return  self
         */ 
        public function setType_bourse($type_bourse)
        {
                $this->type_bourse = $type_bourse;

                return $this;
        }

      

        /**
         * Get the value of montant
         */ 
        public function getMontant()
        {
                return $this->montant;
        }

        /**
         * Set the value of montant
         *
         * @return  self
         */ 
        public function setMontant($montant)
        {
                $this->montant = $montant;

                return $this;
        }
    }
?>