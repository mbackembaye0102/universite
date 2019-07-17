<?php
    class TypeBourse{
        private $id_bourse;
        private $libelle;
        private $montant;
        
        public function __construct ($id_bourse, $libelle, $montant){
            $this->id_bourse = $id_bourse;
            $this->libelle = $libelle;
            $this->montant = $montant;

        }

    }
?>