<?php
require_once 'Autoloader.php';
Autoloader::register();
    class ClassChambre {
        protected $nom_chambre;
        protected $idbat;



        public function __construct ($nom_chambre,$idbat){
            $this->nom_chambre=$nom_chambre;
            $this->idbat=$idbat;



        }

        


      

        /**
         * Get the value of id_chambre
         */ 
        public function getId_chambre()
        {
                return $this->id_chambre;
        }

        /**
         * Set the value of id_chambre
         *
         * @return  self
         */ 
        public function setId_chambre($id_chambre)
        {
                $this->id_chambre = $id_chambre;

                return $this;
        }

        /**
         * Get the value of nom_chambre
         */ 
        public function getNom_chambre()
        {
                return $this->nom_chambre;
        }

        /**
         * Set the value of nom_chambre
         *
         * @return  self
         */ 
        public function setNom_chambre($nom_chambre)
        {
                $this->nom_chambre = $nom_chambre;

                return $this;
        }

        /**
         * Get the value of idbat
         */ 
        public function getIdbat()
        {
                return $this->idbat;
        }

        /**
         * Set the value of idbat
         *
         * @return  self
         */ 
        public function setIdbat($idbat)
        {
                $this->idbat = $idbat;

                return $this;
        }
    }
?>