<!DOCTYPE html>
<html>

<head>
    <title>ETUDIANT</title>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="jquery.dataTables.min.css">

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
<h3 align="center">RECHERCHER UN ETUDIANT</h3>
  

    <!-- <div class="row">
        <form class="col s6" method="post">
            <div class="col s6"></div>
        <div class="row">
                    <div class="input-field col s6 " id="adresse" >
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" type="text" name="id" class="validate">
                    <label for="icon_telephone">Rechercher un Etudiant</label>
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
                     -->
                
    




        </form>
    </div>
            
    <?php 
            
            
           // if(isset($_POST['rechercher'])){    
               
                $objet = new EtudiantService();
                // $val = $_POST['id'];
                    echo'<div class="row">
                <div class="col s1"></div>
                <div class=" col s10">';     
                echo '
                <table id="myTable" class="highlight">
                <thead>
                  <tr>
                      <th>Matricule</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Téléphone</th>
                      <th>Email</th>
                      <th>Date de Naissance</th>
        
                  </tr>
                </thead>
                
                ';
        
                foreach($objet->findAll("etudiant") as $liste){
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




                 

                   

                        
                    
                    
               // }

                
               
             
        
     
    ?>

    <script src="script.js"></script>

    <script src="jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="jquery.dataTables.js"></script>

<script type="text/javascript">

// $(document).ready( function () {
    $(document).ready(function() {
        $('#myTable').dataTable( {
            language: {
        processing: "Traitement en cours...",
        search: "Rechercher&nbsp;:",
        lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
        info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix: "",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable: "Aucune donnée disponible dans le tableau",
        paginate: { first: "Premier", previous: "Pr&eacute;c&eacute;dent", next: "Suivant", last: "Dernier" },
        aria: { sortAscending: ": activer pour trier la colonne par ordre croissant", sortDescending: ": activer pour trier la colonne par ordre décroissant" }
    }
        
    // "lengthMenu":[[3, 6, 9, -1], [3, 6, 9, "All"]]
    // "pageLength": 5

    

} );
    } );
// } );

</script>

    <!-- <?php
   
    include 'footer.php';
    ?> -->

</body>

</html>