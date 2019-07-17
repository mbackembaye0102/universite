<?php

class Autoloader{

    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

 
    static function autoload($class_name){
     require $class_name.'.php';
 }

}

///C'EST LE CODE QUIL FAUT METTRE DANS TOYT LES PAGES
            
//require 'Autoloader.php';
//Autoloader::register();






















?>