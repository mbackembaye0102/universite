<!DOCTYPE html>
<html>

<head>
    <title>BATIMENT</title>
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
<h3 align="center">AJOUTER BATIMENT</h3>
  

    <div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">home</i>
                    <input  type="text" name="batiment" class="validate" >
                    <label for="icon_telephone">Nom Batiment</label>
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
                
                
                
                    $batiment = $_POST['batiment'];
                   
                   
                   
                    $ch = new  ClassBatiment( $batiment);

                    $objet->addbatiment($ch);
                    
                }

                echo'<div class="row">
                <div class="col s1"></div>
                <div class=" col s10">';
        echo '
        <table class="highlight">
        <thead>
          <tr>
              <th>Id Batiment</th>
              <th>Nom Batiment</th>
              <th>MODIFIER</th>
                  <th>SUPPRIMER</th>

          </tr>
        </thead>
        
        ';

        foreach($objet->findAll("batiment") as $liste){
            echo "  <tr>
            <td>$liste->idbat</td>
            <td>$liste->nombat</td>  ";
            echo "<td ><a href='editbatiment.php?idbat=$liste->idbat&nombat=$liste->nombat' class='btn btn-primary'>
            <i class='fa fa-fw fa-edit'></i>MODIFIER</a></td>";
            echo "<td ><a href='supbatiment.php?idbat=$liste->idbat&nombat=$liste->nombat' '>
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

    <script language="javascript">
        function deleteme(id){
            if (confirm("Do you want to Delete?")){
                window.location.href="supbatiment.php?id="+id+"";
                return true;
            }
        }
    
    </script>



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