<?php
require_once 'Autoloader.php';
Autoloader::register();
    class NonBoursier extends Etudiant{
        protected $adresse;

        public function __construct ($nom, $prenom, $tel, $mail, $date_naissance,$adresse){
            parent::__construct( $nom, $prenom, $tel, $mail, $date_naissance);
            $this->adresse=$adresse;

        }


        /**
         * Get the value of adresse
         */ 
        public function getAdresse()
        {
                return $this->adresse;
        }

        /**
         * Set the value of adresse
         *
         * @return  self
         */ 
        public function setAdresse($adresse)
        {
                $this->adresse = $adresse;

                return $this;
        }
    }
?>