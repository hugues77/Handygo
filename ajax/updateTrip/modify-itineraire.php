<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){
    //Traitement pour page itinéraire - post trip 
    $user_id = $_SESSION['unique_id'];
    $depart_voy = trim($_POST['depart-voy-mod']);
    $arrivee_voy = trim($_POST['arrivee-voy-mod']);

    $mode = trim($_POST['mode-voy-mod']);  
    $ref_voy = htmlentities(trim($_POST['ref_voy_upd']));  
    

    if(!empty($depart_voy) && !empty( $arrivee_voy) && !empty($mode)){
        //update the data of modify trip, itineraire
        $update = update_itineraire_trip($depart_voy, $arrivee_voy, $mode, $ref_voy, $user_id);
        if($update){
            echo 'success';
        }else{
            echo 'l\'opération est à refaire '; 
        }
    }else{
        echo "veuillez remplir tous les champs requis !";
    }
}else{
    echo "Connectez-vous et publier votre trajet !";
}

?>