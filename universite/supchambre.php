<!DOCTYPE html>
<html>

<head>
    <title>SUP CHAMBRE</title>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--  CDN jQuery -->
    <script src="jquery-3.4.1.min.js"></script>



</head>

<body>
    <?php
    require_once 'Autoloader.php';
    Autoloader::register();
    include 'header.php';
    ?>
                   
            
                   <label ><h4 align='center'>Voulez Vous Vraiment supprimer Cette ?</h4></label>
                 
                   <div class="col s6"></div>
            <form method="post">
            <div class="row">
            <div class="col s4"></div>

                    <div class="input-field col s3 " id="adresse" >
                    <i class="material-icons prefix">home</i>
                    <input  type="text" name="batiment" class="validate"
                    value="<?php  if(isset($_GET['nom_chambre'])) {echo $_GET['nom_chambre']; }?>" disabled >
                    <label for="icon_telephone">Nom Chambre</label>
                </div>
                </div> 
                <div class="row">
                <div class="col s4"></div>
                <input type="submit" class="btn btn green" name="oui" value="CONFIRMER">
                <input type="submit" class="btn btn red" name="non" value="ANNULER">
            </form>
        </div>  
        

    
    <?php 


        $id=$_GET['id_chambre'];
        $nomch=$_GET['nom_chambre'];
        $nombat=$_GET['nombat'];

        
         

             $objet = new EtudiantService();

            //  $req=$this->bd->prepare("SELECT nombat from batiment
            // WHERE idbat='$id' ");
            //   $req->execute();
             
    
            if(isset($_POST['oui'])){
                try {
                    $bdd = new PDO ('mysql: host = localhost; dbname=universite;charset=utf8', 'root','1lovem@ty',
                     array (PDO::ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION));
            
                } catch (Exception $e) {
                    die('Erreur : '. $e->getMessage());
                }
            
                    
            $req=$bdd->prepare("SELECT COUNT(*) from loge
            WHERE id_chambre='$id'");
              $req->execute();
              $reponse=$req->fetchColumn();
              if( $reponse!=0){
               echo"<h2 align=center style='color:red;'>Cette chambre  est déjà prise  </h2>";
                             
              } 
              else{
                $objet->delchambre($id);  
                header ("location:chambre.php");

              }

                }
              if(isset($_POST['non'])){
                    header ("location:chambre.php");
                    
                }

               
    ?>

    <script src="script.js"></script>

    <?php
   
    include 'footer.php';
    ?>

</body>

</html> 

