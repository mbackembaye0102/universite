<?php

require_once 'Autoloader.php';
Autoloader::register();
class EtudiantService{
    public $isconnect;
    protected $bd;

    

  public function __construct( $login="root", $password="1lovem@ty", $server="localhost",$dbname="universite"){
    $this->isconnect=true;
      try{
          $this->bd=new PDO ("mysql:host={$server};dbname={$dbname}", $login,$password);
          $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      }
      catch(PDOException $e){
          throw new exception($e->getMessage());
      }
  }

  public function deconnexion(){
    $this->bd=NULL;
    $this->isconnect=FALSE;
  }

  public function findEtudiant($valeur){
    try{
        $prepare=$this->bd->prepare("SELECT * FROM etudiant 
             WHERE matricule = $valeur


        -- WHERE matricule like '%$valeur%' OR
        -- nom like '%$valeur%'  OR
        -- prenom like '%$valeur%'  OR
        -- tel like '%$valeur%'  OR
        -- mail like '%$valeur%'  OR
        -- date_naissance like '%$valeur%' 

        -- WHERE UPPER(matricule)=UPPER($valeur) OR
        -- UPPER(nom) =UPPER($valeur)  OR
        -- UPPER(prenom) =UPPER($valeur)  OR
        -- UPPER(tel) =UPPER($valeur)  OR
        -- UPPER(mail) =UPPER($valeur)  OR
        -- UPPER(date_naissance) =UPPER($valeur) 
        
        
        ");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        throw new Exception ($e->getMessage());
    }

  }
  public function findBoursier($valeur){
    try{
        $prepare=$this->bd->prepare("SELECT DISTINCT etudiant.matricule as matricule, etudiant.nom as nom ,
        etudiant.prenom as prenom ,etudiant.tel as tel , etudiant.mail as mail,
        etudiant.date_naissance as date_naissance, Type_Bourse.type_bourse as type_bourse,
         Type_Bourse.montant as montant
       FROM etudiant,Type_Bourse,Boursier
      WHERE etudiant.matricule = '$valeur'
      AND etudiant.matricule=Boursier.matricule
      AND Type_Bourse.id_type=Boursier.id_type");
        $prepare->execute();
        // var_dump($prepare); 
        // die();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        throw new Exception ($e->getMessage());
    }
    

}

public function findNonBoursier($valeur){
    try{
        $prepare=$this->bd->prepare("select etudiant.matricule as matricule, etudiant.nom as nom,
        etudiant.prenom as prenom ,etudiant.tel as tel , etudiant.mail as mail ,
        etudiant.date_naissance as date_naissance, nonboursier.adresse as adresse
       FROM etudiant ,nonboursier
      WHERE etudiant.matricule =$valeur
    and etudiant.matricule=nonboursier.matricule");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        throw new Exception ($e->getMessage());
    }

}

public function findLoger($valeur){
    try{
        $prepare=$this->bd->prepare("SELECT  DISTINCT etudiant.matricule as matricule,
        etudiant.nom as nom, etudiant.prenom as prenom,
        etudiant.tel as tel , etudiant.mail as mail,
        etudiant.date_naissance as date_naissance, 
        Type_Bourse.type_bourse  as type_bourse,
         Type_Bourse.montant as montant, chambre.id_chambre as chambre, batiment.nombat as batiment
       FROM etudiant, Type_Bourse, loge, chambre, batiment, Boursier
      WHERE etudiant.matricule = $valeur
      AND etudiant.matricule = Boursier.matricule
      AND loge.matricule=Boursier.matricule
      AND Type_Bourse.id_type=Boursier.id_type
      AND loge.id_chambre=chambre.id_chambre
      AND chambre.idbat=batiment.idbat");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        throw new Exception ($e->getMessage());
    }

}



  public function findAll($table){
    try{
        $prepare=$this->bd->prepare("select * from $table");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        throw new Exception ($e->getMessage());
    }

}


public function findAllChambre(){
    try{
        $prepare=$this->bd->prepare("SELECT DISTINCT chambre.id_chambre as id_chambre , 
        chambre.nom_chambre  as nom_chambre , 
        batiment.nombat as nombat
        FROM chambre, batiment
        where chambre.idbat=batiment.idbat");
        $prepare->execute();
        return $prepare->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        throw new Exception ($e->getMessage());
    }

}





        public function add(Etudiant $etudiant){
            $nom=$etudiant->getNom();
            $prenom=$etudiant->getPrenom();
            $tel=$etudiant->getTel();
            $mail=$etudiant->getMail();
            $date_naissance=$etudiant->getDateNaissance();
          
            $req=$this->bd->prepare("SELECT COUNT(*) from etudiant
            WHERE tel='$tel' or mail='$mail'");
              $req->execute();
              $reponse=$req->fetchColumn();
              if( $reponse!=0){
               echo"<h2 align=center style='color:red;'>L'email ou le téléphone existe déjà</h2>";
                   echo '';               
              }
              else{
                try{
                    //$matricule=$etudiant->getMatricule();
                        
                            $prepare=$this->bd->prepare("insert into etudiant (nom, prenom, tel, mail, date_naissance)
                             VALUES        
                             (:nom, :prenom, :tel, :mail, :date_naissance)");
                             $prepare->bindParam(':nom', $nom);
                             $prepare->bindParam(':prenom', $prenom);
                             $prepare->bindParam(':tel', $tel);
                             $prepare->bindParam(':mail', $mail);
                             $prepare->bindParam(':date_naissance', $date_naissance);
                            $prepare->execute();
                            //return true;
                        }
                        catch(PDOException $e){
                            throw new Exception ($e->getMessage());
                        }
    
              }
          
           $rep =$this->bd->query("SELECT MAX(matricule) as id FROM etudiant");
            

            while($valDerniereInsertion = $rep->fetch()){
                $id= $valDerniereInsertion["id"];
                break;

            }

            if (get_class($etudiant)=='NonBoursier') {

              //  echo 'ok';
              $adresse=$etudiant->getAdresse();
                $prepare=$this->bd->prepare("insert into nonboursier (matricule, adresse)
                        VALUES (:matricule, :adresse)");
                         $prepare->bindParam(':matricule', $id);
                         $prepare->bindParam(':adresse', $adresse);
                        $prepare->execute();
                   // return $donnee;
            
            }  
            else if (get_class($etudiant)=='Boursier' || get_class($etudiant)=='Loger' ) {
      //  echo 'ok';
                $id_type=$etudiant->getId_type();
                $prepare=$this->bd->prepare("insert into Boursier (matricule, id_type)
                VALUES (:matricule, :id_type)");
                 $prepare->bindParam(':matricule', $id);
                 $prepare->bindParam(':id_type', $id_type);
                $prepare->execute();

                if(get_class($etudiant)=='Loger'){
                    $id_chambre=$etudiant->getId_chambre();
                    $prepare=$this->bd->prepare("insert into loge (matricule, id_chambre)
                    VALUES (:matricule, :id_chambre)");
                     $prepare->bindParam(':matricule', $id);
                     $prepare->bindParam(':id_chambre', $id_chambre);
                    $prepare->execute();
                }
            }

            
        }


      

        public function addbatiment(ClassBatiment $batimentClass){
            $batiment=$batimentClass->getNombat();

            $req=$this->bd->prepare("SELECT COUNT(*) from batiment
            WHERE nombat='$batiment'");
              $req->execute();
              $reponse=$req->fetchColumn();
              if( $reponse!=0){
               echo"<h2 align=center style='color:red;'>Ce nom de batiment existe déjà</h2>";
                   echo '';               
              }
              else{
                try{
                
                    $prepare=$this->bd->prepare("insert into batiment (nombat)
                    VALUES        
                    (:nombat)");
                    $prepare->bindParam(':nombat', $batiment);
                    
                   $prepare->execute();
    
                        }
                        catch(PDOException $e){
                            throw new Exception ($e->getMessage());
                        }
    
              }
                   }

        public function addchambre(ClassChambre $chambre){
            $ch=$chambre->getNom_chambre();
              $bat=$chambre->getIdbat();
            $req=$this->bd->prepare("SELECT COUNT(*) from chambre
             WHERE nom_chambre='$ch'");
               $req->execute();
               $reponse=$req->fetchColumn();
               if( $reponse!=0){
                echo"<h2 align=center style='color:red;'>Ce nom ce chambre existe déjà</h2>";
               }
                else{
                        try{
                            $prepare=$this->bd->prepare("insert into chambre (nom_chambre, idbat)
                            VALUES        
                            (:nom_chambre, :idbat)");
                            $prepare->bindParam(':nom_chambre', $ch);
                            $prepare->bindParam(':idbat', $bat); 
                            $prepare->execute();
                            return $prepare;
                                }
                                catch(PDOException $e){
                                    throw new Exception ($e->getMessage());
                                }
                       } 
                   
               }
              
            
                   //   var_dump($REP);
       
        

        public function addpension(ClassPension $pension){
            $type=$pension->getType_bourse();
            $montant=$pension->getMontant();

            $req=$this->bd->prepare("SELECT COUNT(*) from Type_Bourse
            WHERE type_bourse='$type'");
              $req->execute();
              $reponse=$req->fetchColumn();
              if( $reponse!=0){
               echo"<h2 align=center style='color:red;'>Ce Libelé existe déjà</h2>";
                   echo '';               
              }
               else{
                try{
                  

                    $prepare=$this->bd->prepare("insert into Type_Bourse (type_bourse, montant)
                    VALUES        
                    (:type_bourse, :montant)");
                    $prepare->bindParam(':type_bourse', $type);
                    $prepare->bindParam(':montant', $montant); 
                   $prepare->execute();
                        }
                        catch(PDOException $e){
                            throw new Exception ($e->getMessage());
                        }
               }

            
        }

        public function listernonboursier(){
            try{
              //  $batiment=$batimentClass->getNombat();
                
                $prepare=$this->bd->prepare("SELECT etudiant.matricule as matricule, etudiant.nom as nom,
                 etudiant.prenom as prenom ,etudiant.tel as tel , etudiant.mail as mail ,
                 etudiant.date_naissance as date_naissance, nonboursier.adresse as adresse
                FROM etudiant ,nonboursier
               WHERE etudiant.matricule = nonboursier.matricule");
                
               $prepare->execute();
                return $prepare->fetchAll(PDO::FETCH_OBJ);


               return $prepare;

                    }
                    catch(PDOException $e){
                        throw new Exception ($e->getMessage());
                    }
        }


        public function listerboursier(){
            try{
              //  $batiment=$batimentClass->getNombat();
                
                $prepare=$this->bd->prepare("SELECT etudiant.matricule as matricule, etudiant.nom as nom ,
                 etudiant.prenom as prenom ,etudiant.tel as tel , etudiant.mail as mail,
                 etudiant.date_naissance as date_naissance, Type_Bourse.type_bourse as type_bourse,
                  Type_Bourse.montant as montant
                FROM `etudiant`,`Type_Bourse`,`Boursier`
               WHERE etudiant.matricule = Boursier.matricule
               AND Type_Bourse.id_type=Boursier.id_type");
                
               $prepare->execute();
                return $prepare->fetchAll(PDO::FETCH_OBJ);


               return $prepare;

                    }
                    catch(PDOException $e){
                        throw new Exception ($e->getMessage());
                    }
        }

        public function listerloger(){
            try{
              //  $batiment=$batimentClass->getNombat();
                
                $prepare=$this->bd->prepare("SELECT  DISTINCT etudiant.matricule as matricule,
                 etudiant.nom as nom, etudiant.prenom as prenom,
                 etudiant.tel as tel , etudiant.mail as mail,
                 etudiant.date_naissance as date_naissance, 
                 Type_Bourse.type_bourse  as type_bourse,
                  Type_Bourse.montant as montant, chambre.nom_chambre as chambre, batiment.nombat as batiment
                FROM etudiant, Type_Bourse, loge, chambre, batiment, Boursier
               WHERE etudiant.matricule = Boursier.matricule
               AND loge.matricule=Boursier.matricule
               AND Type_Bourse.id_type=Boursier.id_type
               AND loge.id_chambre=chambre.id_chambre
               AND chambre.idbat=batiment.idbat");
                
               $prepare->execute();
                return $prepare->fetchAll(PDO::FETCH_OBJ);


               return $prepare;

                    }
                    catch(PDOException $e){
                        throw new Exception ($e->getMessage());
                    }
        }


        public function checkstatut($valeur){
            
            $requete=$this->bd->prepare("SELECT * FROM etudiant, Boursier,loge
            WHERE etudiant.matricule=Boursier.matricule
            AND loge.matricule=Boursier.matricule
            AND etudiant.matricule=$valeur");
           // $requete->execute(array($_POST['matricule']));
          $rep= $requete->execute();
           
            if($resultat=$requete->fetch(PDO::FETCH_OBJ)){
                
                $resultat="<h2 align=center style='color:red;'>C'est un Etudiant Boursier et Logé</h2>";
                echo $resultat;
            }
         
            $requete=$this->bd->prepare("SELECT * FROM etudiant, Boursier,loge
            WHERE etudiant.matricule=Boursier.matricule
            AND Boursier.matricule
            NOT IN 
            (SELECT loge.matricule FROM loge)
            AND etudiant.matricule=$valeur");
           // $requete->execute(array($_POST['matricule']));
           $requete->execute();

            if($resultat=$requete->fetch(PDO::FETCH_OBJ)){
                $resultat="<h2 align=center style='color:red;'>C'est un Etudiant Boursier</h2>";
                echo $resultat;
            }

            $requete=$this->bd->prepare("SELECT * FROM etudiant, nonboursier       
                 WHERE etudiant.matricule=nonboursier.matricule
            AND etudiant.matricule=$valeur");
           // $requete->execute(array($_POST['matricule']));
           $requete->execute();
            if($resultat=$requete->fetch(PDO::FETCH_OBJ)){
                $resultat="<h2 align=center style='color:red;'>C'est un Etudiant Non Boursier</h2>";
                echo $resultat;
            }


            
        }

        public function delchambre($matricule){
            $requete=$this->bd->prepare("DELETE FROM chambre       
            WHERE id_chambre=$matricule");
           $rep= $requete->execute();
            if($rep!=null){
                echo 'suppression reussi';
            }
            else{
                echo 'suppression echoué';
            }
        }

        public function editchambre(ClassChambre $chambre, $id){

        $nom = $chambre->getNom_chambre();
        $bat = $chambre->getIdbat();
    
        $sql = "UPDATE chambre
         SET nom_chambre = '$nom',idbat='$bat'
          WHERE id_chambre='$id'";
        var_dump($sql);
    
        // Prepare statement
        $req = $this->bd->prepare($sql);
    
        // execute the query
        $req->execute();
    
        }

        public function delbatiment($id){


          
                $requete=$this->bd->prepare("DELETE FROM batiment       
                WHERE idbat=$id");
               $requete->execute();
                // if($rep!=null){
                //     echo 'suppression reussi';
                // }
                // else{
                //     echo 'suppression echoué';
                
              


            
        }


        public function editbatiment(ClassBatiment $batiment, $id){
            $nom = $batiment->getNombat();
    
        $sql = "UPDATE batiment
         SET nombat = '$nom'
          WHERE idbat='$id'";
        // var_dump($sql);
    
        // Prepare statement
        $req = $this->bd->prepare($sql);
    
        // execute the query
        $req->execute();
    
        }

        public function editetudiant(Etudiant $etudiant, $id){
            $nom=$etudiant->getNom();
            $prenom=$etudiant->getPrenom();
            $tel=$etudiant->getTel();
            $mail=$etudiant->getMail();
            $date_naissance=$etudiant->getDateNaissance();

        $sql = "UPDATE etudiant
         SET nom = '$nom' and prenom ='$prenom' and
         tel ='$tel' and mail ='$mail' and date_naissance ='$date_naissance'
          WHERE matricule='$id'";
        // var_dump($sql);
    
        // Prepare statement
        $req = $this->bd->prepare($sql);
    
        // execute the query
        $req->execute();
    
        }

        public function delpension($matricule){
            $requete=$this->bd->prepare("DELETE FROM Type_Bourse       
            WHERE id_type=$matricule");
           $requete->execute();
           
        }


        public function editpension(ClassPension $pension,$id){ 
            $type_bourse = $pension->getType_bourse();
            $montant = $pension->getMontant();
    
        $sql = "UPDATE Type_Bourse
         SET type_bourse = '$type_bourse', montant='$montant'
          WHERE id_type='$id'";
        var_dump($sql);
    
        // Prepare statement
        $req = $this->bd->prepare($sql);
    
        // execute the query
        $req->execute();
        }

    


//SUPPRESSION

           


}
?>