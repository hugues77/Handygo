<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
    //Traitement pour page Date - post trip
    if(isset($_SESSION['ref'])){ 
        
        $user_id = $_SESSION['unique_id'];
        $ref_voy = $_SESSION['ref'];
        
        $place = htmlentities(trim($_POST['place']));
        
        
        if(!empty($place)){
            //Update the data of trip for date part
            update_trip_place($place, $ref_voy, $user_id);
            echo 'success';
        }else{
            echo "veuillez remplir l'un de champs requis !";
        }
    }else{
        echo 'vous devriez d\'abord enregistrer le trajet';
    }
}else{
    echo 'Connectez-vous et publier votre trajet !';
}

?>