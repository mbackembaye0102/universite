<!DOCTYPE html>
<html>

<head>
    <title>LISTER ETU</title>
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
<h3 align="center">LA LISTE DES ETUDIANTS</h3>
  

            
    <?php 
             $objet = new EtudiantService();
            $valeur="etudiant";

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
              <th>MODIFIER</th>
              <th>SUPPRIMER</th>
              
          </tr>
        </thead>
        
        ';
        foreach($objet->findAll($valeur) as $liste){
            echo "  <tr>
            <td>$liste->matricule</td>
            <td>$liste->nom</td>    
            <td>$liste->prenom</td>
            <td>$liste->tel</td>    
            <td>$liste->mail</td>
            <td>$liste->date_naissance</td>    
            ";
            echo "<td ><a href='editetudiant.php?matricule=$liste->matricule' class='btn btn-primary'>
                <i class='fa fa-fw fa-edit'></i>MODIFIER</a></td>";
                echo "<td ><a href='supetudiant.php?matricule=$liste->matricule'>
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