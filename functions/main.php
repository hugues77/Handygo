<?php
    //--------------------------------------------
    //connexion de la base de données en ligne
    //------------------------------------------
     $dbhost = 'localhost';
     $dbname = 'tinda_colis';
     $dbuser = 'root';
     $dbpswd = 'root';

    try{
        $connexion = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
    }catch (PDOException $e){
            die("Erreur de connexion à la base de données, Merci");
    }
    //$connexion = new PDO('mysql:host=localhost; dbname=rhema','root','');
