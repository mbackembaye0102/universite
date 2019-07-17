<?php
require_once 'Autoloader.php';
Autoloader::register();
    class Loger extends Etudiant{
        protected $id_type;
        protected $id_chambre;


        public function __construct ($nom, $prenom, $tel, $mail, $date_naissance,$id_type,$id_chambre){
            parent::__construct($nom, $prenom, $tel, $mail, $date_naissance);
            $this->id_type=$id_type;
            $this->id_chambre=$id_chambre;


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
    }
?>