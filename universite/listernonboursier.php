<!DOCTYPE html>
<html>

<head>
    <title>NON BOURSIER</title>
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
<h3 align="center">LA LISTE DES NON BOURSIERS</h3>
  

            
    <?php 
             $objet = new EtudiantService();
         

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
              <th>Adresse</th>
          </tr>
        </thead>
        
        ';
        foreach($objet->listernonboursier() as $liste){
            echo "  <tr>
            <td>$liste->matricule</td>
            <td>$liste->nom</td>    
            <td>$liste->prenom</td>
            <td>$liste->tel</td>    
            <td>$liste->mail</td>
            <td>$liste->date_naissance</td>    
            <td>$liste->adresse</td>
            ";
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