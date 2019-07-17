<!DOCTYPE html>
<html>

<head>
    <title>MODIF CHAMBRE</title>
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
<h3 align="center">MODIFIER CHAMBRE</h3>
  
<div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">home</i>
                    <input  type="text" name="chambre" class="validate" 
                    value="<?php  if(isset($_GET['nom_chambre'])) {echo $_GET['nom_chambre']; }?>">
                    <label for="icon_telephone">Nom Chambre</label>
                    </div>
        </div>

        <div class="row">
                    <div class="col s6"></div>
                    <div class="col s6">
                    <label>Batiment</label>
                        <select class="browser-default" name="batiment"
                        value="<?php  if(isset($_GET['nombat'])) {echo $_GET['nombat']; }?>">
                        <option value="">Choisir un Batiment</option> 
                        <?php
                            $ch = new EtudiantService();
                            foreach ($ch->findAll('batiment') as $val) {
                                echo " <option value=$val->idbat> $val->nombat</option> ";
                            }
                            ?>
                        </select>
                        </div>
        </div>

       

           
                    

            
            <div class="row">
            <div class="col s6"></div>
            <div class="input-field col s6 " id="adresse" >
                    <br>
                    <label>
                        <input type="submit" value="MODIFIER" class="waves-effect waves-light btn" name="valider">
                    </label>
            </div> 
            </div>         
                    
                
    




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
             

            if(isset($_POST['valider'])){
                
                
                
                    $batiment = $_POST['batiment'];
                    $chambre = $_POST['chambre'];

                   
                   
                    $ch=new ClassChambre($chambre,$batiment );
                    $objet->editchambre($ch,$id);

                    header ("location:chambre.php");
                    
                }

               
    ?>

    <script src="script.js"></script>

    <?php
   
    include 'footer.php';
    ?>
 <style>
    body{
        background-image: url(diplomee.jpg);
        background-size: cover;
    }
    
    </style>
</body>

</html>