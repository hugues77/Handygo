<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
    //Traitement pour page Date - post trip
    if(isset($_SESSION['ref'])){ 
        
        $user_id = $_SESSION['unique_id'];
        $ref_voy = $_SESSION['ref'];
        
        $place = htmlentities(trim($_POST['place']));
        // $courrier = htmlentities(trim($_POST['courrier']));

        // $taille_s = isset($_POST['taille_s']) ? '1' : '0';
        // $taille_m = isset($_POST['taille_m']) ? '1' : '0';
        // $taille_l = isset($_POST['taille_l']) ? '1' : '0';
        // $taille_xl = isset($_POST['taille_xl']) ? '1' : '0';
        // $taille_xxl = isset($_POST['taille_xxl']) ? '1' : '0';

        // $descrip_bagage = htmlentities(trim($_POST['descrip-bagage']));
        
        if(!empty($place)){
            //Update the data of trip for date part
            update_trip_place($bagage, $ref_voy);
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