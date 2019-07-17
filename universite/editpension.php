<!DOCTYPE html>
<html>

<head>
    <title>MODIF PENSION</title>
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
<h3 align="center">MODIFIER TYPE DE BOURSE</h3>
  
<div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">attach_money</i>
                    <input  type="text" name="type" class="validate"
                    value="<?php  if(isset($_GET['type_bourse'])) {echo $_GET['type_bourse']; }?>">
                    <label for="icon_telephone">Type Bourse</label>
                    </div>
                    <div class="col s6"></div>
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">attach_money</i>
                    <input  type="number" name="montant" class="validate"
                    value="<?php  if(isset($_GET['montant'])) {echo $_GET['montant']; }?>">
                    <label for="attach_money">Montant Bourse</label>
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
            $id=$_GET['id_type'];
            $type_bourse=$_GET['type_bourse'];
            $montantbourse=$_GET['montant'];


             $objet = new EtudiantService();

            //  $req=$this->bd->prepare("SELECT nombat from batiment
            // WHERE idbat='$id' ");
            //   $req->execute();
             

            if(isset($_POST['valider'])){
                
                
                
                    $type = $_POST['type'];
                    $montant = $_POST['montant'];

                   
                   
                    $bourse =new ClassPension($type,$montant);
                    $objet->editpension($bourse,$id);

                    header ("location:pension.php");
                    
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