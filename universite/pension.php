<!DOCTYPE html>
<html>

<head>
    <title>PENSION</title>
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
<h3 align="center">AJOUTER TYPE DE BOURSE</h3>
  

    <div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">attach_money</i>
                    <input  type="text" name="type" class="validate">
                    <label for="icon_telephone">Type Bourse</label>
                    </div>
                    <div class="col s6"></div>
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">attach_money</i>
                    <input  type="number" name="montant" class="validate">
                    <label for="attach_money">Montant Bourse</label>
                    </div>
       

            </div>

           
                    

            
            <div class="row">
            <div class="col s6"></div>
            <div class="input-field col s6 " id="adresse" >
                    <br>
                    <label>
                        <input type="submit" value="AJOUTER" class="waves-effect waves-light btn" name="valider">
                    </label>
            </div> 
            </div>         
                    
                
    




        </form>
    </div>
            
    <?php 
             $objet = new EtudiantService();
            if(isset($_POST['valider'])){
                
                
                    $type = $_POST['type'];
                    $montant = $_POST['montant'];  

                    $p = new  ClassPension($type, $montant);
                    $objet->addpension($p);
            
                }
                echo'<div class="row">
                    <div class="col s1"></div>
                    <div class=" col s10">';

            echo '
            <table class="highlight">
            <thead>
              <tr>
                  <th>ID TYPE</th>
                  <th>TYPE BOURSE</th>
                  <th>MONTANT BOURSE</th>
                  <th>MODIFIER</th>
                  <th>SUPPRIMER</th>

              </tr>
            </thead>
            ';
            foreach($objet->findAll("Type_Bourse") as $liste){
                echo "  <tr>
                <td>$liste->id_type</td>
                <td>$liste->type_bourse</td>  
                <td>$liste->montant</td>   "; 
                echo "<td ><a href='editpension.php?id_type=$liste->id_type&type_bourse=$liste->type_bourse&montant=$liste->montant' class='btn btn-primary'>
                <i class='fa fa-fw fa-edit'></i>MODIFIER</a></td>";  
                echo "<td ><a href='suppension.php?id_type=$liste->id_type&type_bourse=$liste->type_bourse&montant=$liste->montant''>
                <button class='btn btn red'>SUPPRIMER</button></a></td>";        
                
            }
    
            echo"
                    </tr>
                </table>
            ";
                 
            
         
        
    
       echo"</div>
            </div>";
   


               
             
        
     
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