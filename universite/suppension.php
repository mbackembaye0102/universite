<!DOCTYPE html>
<html>

<head>
    <title>SUP PENSION</title>
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
                   
            
                   <label ><h4 align='center'>Voulez Vous Vraiment Supprimer ce Type de Bourse ?</h4></label>
                 
                   <div class="col s6"></div>
            <form method="post">
            <div class="row">
            <div class="col s4"></div>

                    <div class="input-field col s3 " id="adresse" >
                    <i class="material-icons prefix">home</i>
                    <input  type="text" name="batiment" class="validate"
                    value="<?php  if(isset($_GET['type_bourse'])) {echo $_GET['type_bourse']; }?>" disabled >
                    <label for="icon_telephone">Type de Bourse</label>
                </div>
                </div> 
                <div class="row">
                <div class="col s4"></div>
                <input type="submit" class="btn btn green" name="oui" value="CONFIRMER">
                <input type="submit" class="btn btn red" name="non" value="ANNULER">
            </form>
        </div>  
        

    
    <?php 


            

            $id=$_GET['id_type'];
            $type_bourse=$_GET['type_bourse'];
            $montantbourse=$_GET['montant'];
                    

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
            
                    
            $req=$bdd->prepare("SELECT COUNT(*) from Boursier
            WHERE id_type='$id'");
              $req->execute();
              $reponse=$req->fetchColumn();
              if( $reponse!=0){
               echo"<h2 align=center style='color:red;'>Cette Pension est déjà alloué</h2>";
                             
              } 
              else{
                $objet->delpension($id);  
                header ("location:pension.php");

              }

                }
              if(isset($_POST['non'])){
                    header ("location:pension.php");
                    
                }

               
    ?>

    <script src="script.js"></script>

    <?php
   
    include 'footer.php';
    ?>

</body>

</html> 

