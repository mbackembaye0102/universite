<?php
require_once 'Autoloader.php';
Autoloader::register();
class Etudiant{

    //Declaration des variables
 // private $matricule;
    private $nom;
    private $prenom;
    private $mail;
    private $tel;
    private $date_naissance;


    public function __construct( $nom="", $prenom="",$tel=0,$mail="", $date_naissance="" ){
      //$this->matriucle = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->mail = $mail;
        $this->date_naissance = $date_naissance;


    }
  
    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of datenaissance
     */ 
    public function getDatenaissance()
    {
        return $this->date_naissance;
    }

    /**
     * Set the value of datenaissance
     *
     * @return  self
     */ 
    public function setDatenaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }



}


































?>