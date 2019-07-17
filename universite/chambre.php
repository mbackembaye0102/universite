<!DOCTYPE html>
<html>

<head>
    <title>CHAMBRE</title>
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
<h3 align="center">AJOUTER CHAMBRE</h3>
  

    <div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">home</i>
                    <input  type="text" name="chambre" class="validate">
                    <label for="icon_telephone">Nom Chambre</label>
                    </div>
        </div>

        <div class="row">
                    <div class="col s6"></div>
                    <div class="col s6">
                    <label>Batiment</label>
                        <select class="browser-default" name="batiment">
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
                        <input type="submit" value="AJOUTER" class="waves-effect waves-light btn" name="valider">
                    </label>
            </div> 
            </div>         
                    
                
    




        </form>
    </div>
            
    <?php 
             $objet = new EtudiantService();
            if(isset($_POST['valider'])){
                    $chambre = $_POST['chambre'];
                    $batiment = $_POST['batiment'];
                    $ch = new  ClassChambre($chambre, $batiment);
                    $objet->addchambre($ch);
                    
                }
                echo'<div class="row">
                    <div class="col s1"></div>
                    <div class=" col s10">';

            echo '
            <table class="highlight">
            <thead>
              <tr>
                  <th>Id Chambre</th>
                  <th>Nom Chambre</th>
                  <th>Nom Batiment</th>
                  <th>MODIFIER</th>
                  <th>SUPPRIMER</th>
            
              </tr>
            </thead>  
            ';
            foreach($objet->findAllChambre() as $liste){
                echo "  <tr>
                <td>$liste->id_chambre</td>
                <td>$liste->nom_chambre</td>
                <td>$liste->nombat</td>  ";  
                echo "<td ><a href='editchambre.php?id_chambre=$liste->id_chambre&nom_chambre=$liste->nom_chambre&nombat=$liste->nombat' class='btn btn-primary'>
                <i class='fa fa-fw fa-edit'></i>MODIFIER</a></td>";
                echo "<td ><a href='supchambre.php?id_chambre=$liste->id_chambre&nom_chambre=$liste->nom_chambre&nombat=$liste->nombat' '>
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