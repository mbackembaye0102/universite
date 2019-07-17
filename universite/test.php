<?php
function die_r($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();


}

// require 'Autoloader.php';
// Autoloader::register();

require_once 'Autoloader.php';
Autoloader::register();


   $mbacke = new EtudiantService();
    //$x=new NonBoursier('Ndao', 'Ibou', '769854123', 'iboundao@gmail.com','1990-12-02','mbao');
    // $y=new Boursier('Diome', 'Theo', '784563214', 'theo@gmail.com','1989-11-12','1');
    //$z=new Loger('Sall', 'Awa', '769854123', 'awasall@gmail.com','1998-12-12','2','4A');

    // $mbacke->add($x);

    // $rep=$mbacke->delchambre("5");
    // var_dump($rep);

    // $ch=new ClassChambre("A1","4" );
    // $rep= $mbacke->editchambre($ch,"1");
    // var_dump($rep);

    // $bat=new ClassBatiment("AA" );
    // $rep= $mbacke->editbatiment($bat,"4");
    // var_dump($rep);


    // $bourse =new ClassPension("Demi","25000");
    // $rep= $mbacke->editpension($bourse,"4");
    // var_dump($rep);

       $etudiant =new Etudiant('Puissance','Faye', '778547896','puissance@gmail.com','1990-12-02');
    $rep= $mbacke->editetudiant($etudiant,"9");
    var_dump($rep);

    //   $rep=$mbacke->delbatiment("8");
    // var_dump($rep);

    //    $rep=$mbacke->delpension("6");
    // var_dump($rep);


    //  $rep=$mbacke->editpension("4","Demi","20000");
    // var_dump($rep);



    // var_dump($x);

    // $mbacke->add($y);
    // var_dump($y);
 //$mbacke->add($z);
   //ss var_dump($z);




 // $find=$mbacke->find ("etudiant","prenom","mbacke");
  //echo $find->id_chambre;
   //$findAll=$mbacke->findAll("etudiant");
   //$add=$mbacke->add ('Sene', 'Awa Ndiaye', '78965412', 'awasene@gmail.com','1997-07-04');




  // $addBoursier=$mbacke->addBoursier('8','2');

   // var_dump($find);
   //var_dump($findAll);
    // var_dump($add);
        // var_dump($addBoursier);




//die_r($find);
//die_r($findAll);
//die_r($add);
//die_r($addBoursier);



// $ch=new ClassChambre("1B","5" );
//     $rep= $mbacke->addchambre($ch);
//     var_dump($rep);










?>