<!DOCTYPE html>
<html>

<head>
    <title>MODIF ETU</title>
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
<h3 align="center">MODIFIER ETUDIANT</h3>
                    

<div class="row">
        <form class="col s6" method="post">
            <div class="row">
                <div class="col s6"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" type="text" name="nom" class="validate" 
                    value="<?php echo $reponse['nom'];?>">
                    <label for="icon_prefix"> Nom</label>
                </div>

            </div>
            <div class="row">
                <div class="col s6"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" name ="prenom" type="text" class="validate" required>
                    <label for="icon_prefix">Prenom</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" name="tel" type="tel" class="validate" required>
                    <label for="icon_telephone">Telephone</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="mail" class="validate" required>
                    <label for="Email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">date_range</i>
                    <input name="date_naissance" type="date" class="datepicker" required>
                    <label for="icon_prefix">Date de Naissance</label>
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
            $id=$_GET['matricule'];

          
                try {
                    $bdd = new PDO ('mysql: host = localhost; dbname=universite;charset=utf8', 'root','1lovem@ty',
                     array (PDO::ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION));
            
                } catch (Exception $e) {
                    die('Erreur : '. $e->getMessage());
                }
                $req=$bdd->prepare("SELECT * from etudiant
            WHERE matricule='$id'");
              $req->execute();
              $reponse=$req->fetch();




            
          


             $objet = new EtudiantService();

            //  $req=$this->bd->prepare("SELECT nombat from batiment
            // WHERE idbat='$id' ");
            //   $req->execute();
             

            if(isset($_POST['valider'])){
                
                
                
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $tel = $_POST['tel'];
                    $mail = $_POST['mail'];
                    $datenaissance = $_POST['datenaissance'];


                   
                   
                    $et=new Etudiant($chambre,$batiment );
                    $objet->editetudiant($et,$id);

                    header ("location:listeretudiant.php");
                    
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