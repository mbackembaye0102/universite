<!DOCTYPE html>
<html>

<head>
    <title>CHECK STATUT</title>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="materialize.min.js"></script>
    <!--  CDN jQuery -->
    <script src="jquery-3.4.1.min.js"></script>



   
</head>

<body>
    <?php
    require_once 'Autoloader.php';
    Autoloader::register();
    include 'header.php';
    ?>
<h3 align="center">RECHERCHER STATUT</h3>
<div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" type="number" name="matricule" class="validate">
                    <label for="icon_telephone">Statut Etudiant</label>
                </div>
            </div>

            
            <div class="row">
            <div class="col s6"></div>
            <div class="input-field col s6 " id="adresse" >
                    <br>
                    <label>
                        <input type="submit" value="RECHERCHER" class="waves-effect waves-light btn" name="rechercher">
                    </label>
            </div> 
            </div>         
                    
                
    




        </form>
    </div>
   

            
    <?php 
             $objet = new EtudiantService();
          
         
             if(isset($_POST['rechercher'])){
                $val = $_POST['matricule'];
              
                $rep=$objet->checkstatut($val);
                //var_dump($rep);
              
                echo'<div class="row">
                <div class="col s1"></div>
                <div class=" col s10">';
        echo '
        <table class="highlight">
        <thead>
          <tr>
              <th>Matricule</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Tel</th>
              <th>Mail</th>
              <th>Date De Naissance</th>
          </tr>
        </thead>
        
        ';
        foreach($objet->findEtudiant($val) as $liste){
            echo "  <tr>
            <td>$liste->matricule</td>
            <td>$liste->nom</td>    
            <td>$liste->prenom</td>
            <td>$liste->tel</td>    
            <td>$liste->mail</td>
            <td>$liste->date_naissance</td> 
            ";
        }

        echo"
                </tr>
            </table>
        ";
   echo"</div>
        </div>";

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