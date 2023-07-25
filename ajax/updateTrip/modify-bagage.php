<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
    //Traitement pour page Date - post trip   
    $user_id = $_SESSION['unique_id'];
    $ref_voy = htmlentities(trim($_POST['ref_voy_upd']));
    
    $place = htmlentities(trim($_POST['place_mod']));
    $place_reserve = htmlentities(trim($_POST['place_reserve']));

    
    if(!empty($place)){
        if($place_reserve >= $place){
            echo "Places disponible ne doit pas être inférieur au place déjà réservés par des clients !";
        }else{
            //Update the data of trip for bagage part
            update_trip_place($place, $ref_voy, $user_id);
            echo 'success';
        }

    }else{
        echo "veuillez remplir tous les champs requis !";
    }
}else{
    echo 'Connectez-vous et publier votre trajet !';
}

?>