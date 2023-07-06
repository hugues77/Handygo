<?php
require_once 'function.php';

$searchTerm = $_POST['searchTerm'];
$req = $connexion->query("SELECT * FROM users WHERE NOT unique_id  = {$_SESSION["unique_id"]}  AND (prenom LIKE '%{$searchTerm}%' OR nom LIKE '%{$searchTerm}%')");

$output = "";
if($req->rowCount() > 0){
    require_once "partials/data.php";
}else{
    $output .= "Aucun resultat pour cette recherche...";
}
echo $output;
