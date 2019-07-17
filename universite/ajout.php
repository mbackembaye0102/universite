<!DOCTYPE html>
<html>

<head>
    <title>AJOUT</title>
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
<h3 align="center">AJOUTER ETUDIANT</h3>
  

    <div class="row">
        <form class="col s6" method="post">
            <div class="row">
                <div class="col s6"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" type="text" name="nom" class="validate">
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
                <div class="col s6">



                    <p id="nonboursier">
                        <label>
                            <input class="with-gap" name="group1" id="non" type="radio" />
                            <span>Non Boursier</span>
                        </label>
                    </p>
                    <p id="boursier">
                        <label>
                            <input class="with-gap" name="group1" type="radio" id="boursier" />
                            <span>Boursier</span>
                        </label>
                    </p>
                    <p id="loger">
                        <label>
                            <input class="with-gap" name="group1" id="loge" type="radio" />
                            <span>Logé</span>
                        </label>
                    </p>


                    <div class="row">
                    <div class="input-field col s12 " id="adresse" hidden>
                    <i class="material-icons prefix">home</i>
                    <input  type="tel" name="adresse" class="validate">
                    <label for="icon_telephone">Adresse</label>
                </div>
            </div>
                    <div id="id_type" hidden>
                        <label>Type de Bourse</label>
                        <select class="browser-default" name="id_type">
                        <option value=""></option> 
                        <?php
                            $ch = new EtudiantService();
                            foreach ($ch->findAll('Type_Bourse') as $val) {
                                echo " <option value=$val->id_type> $val->type_bourse</option> ";
                            }
                            ?> 
                        </select>
                    </div>
                    <div id="id_chambre" hidden>
                        <label>Chambre</label>
                        <select class="browser-default" name="id_chambre">
                        <option value=""></option> 
                            <?php
                            $ch = new EtudiantService();
                            foreach ($ch->findAll('chambre') as $val) {
                                echo " <option value=$val->id_chambre> $val->nom_chambre</option> ";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <label>
                        <input type="submit" value="AJOUTER" class="waves-effect waves-light btn" name="valider">
                    </label>
                </div>
            </div>




        </form>
    </div>
            
    <?php 
            
            if(isset($_POST['valider'])){
                
                
                
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $tel = $_POST['tel'];
                    $mail = $_POST['mail'];
                    $date_naissance = $_POST['date_naissance'];
                    $adresse = $_POST['adresse'];
                    $id_type = $_POST['id_type'];
                    $id_chambre = $_POST['id_chambre'];
                   
                    $objet = new EtudiantService();


                    if(!empty($adresse)){
                        $etudiant = new  NonBoursier($nom, $prenom,$tel,$mail, $date_naissance,$adresse);
                        $objet->add($etudiant);
                    }
                    elseif (!empty($id_type) && empty($id_chambre)){
                        $etudiant = new  Boursier($nom, $prenom,$tel,$mail, $date_naissance,$id_type);
                        $objet->add($etudiant);
                    }
                    else{
                        $etudiant = new  Loger($nom, $prenom,$tel,$mail, $date_naissance,$id_type,$id_chambre);
                        $objet->add($etudiant);
                    }
                   

                        
                    
                    
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