<?php
require_once 'function.php';
//selectionner tous les users
$sql = "SELECT * FROM users WHERE NOT unique_id  = {$_SESSION["unique_id"]}";
$req = $connexion->query($sql);
$res = $req->rowCount();
$output = "";
        if($res == 1){
            $output .="Aucun Utilisateur disponible.";
        }elseif($res > 0){
            require_once 'partials/data.php';
        }
    echo $output;