<?php
require_once 'Autoloader.php';
Autoloader::register();
    class Boursier extends Etudiant{
        protected $id_type;

        public function __construct ($nom, $prenom, $tel, $mail, $date_naissance,$id_type){
            parent::__construct($nom, $prenom, $tel, $mail, $date_naissance);
            $this->id_type=$id_type;

        }

        


        /**
         * Get the value of id_type
         */ 
        public function getId_type()
        {
                return $this->id_type;
        }

        /**
         * Set the value of id_type
         *
         * @return  self
         */ 
        public function setId_type($id_type)
        {
                $this->id_type = $id_type;

                return $this;
        }
    }
?>