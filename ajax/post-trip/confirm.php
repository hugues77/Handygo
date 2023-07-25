<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){
    //Traitement pour page Date - post trip
    if(isset($_SESSION['ref'])){

        $tel_user = htmlentities(trim($_POST['tel-user']));
        $descrip_trajet = htmlentities(trim($_POST['descrip-trajet']));

        // $adresse_rdv = htmlentities(trim($_POST['adresse-rdv']));
        
        if(!empty($tel_user) && empty($descrip_trajet)){
            //Update the data of confirm trip for telephone user for trip
            update_trip_confirm($tel_user, $_SESSION['unique_id']);
            echo 'success';
        }elseif(!empty($tel_user) && !empty($descrip_trajet)){
            //Update the data of confirm trip for message
            update_trip_confirm($tel_user, $_SESSION['unique_id']);
            update_trip_confirm_d($descrip_trajet, $_SESSION['unique_id'], $_SESSION['ref']);
            echo 'success';
            set_flash("Trajet a été bien enregistré et publier");
        }else{
            echo "veuillez remplir tous les champs requis !";
        }
    }else{
        echo 'vous devriez d\'abord enregistrer le trajet';
    }
}else{
    echo 'Connectez-vous et publier votre trajet !';
}

//destroy the session of trip
unset($_SESSION['ref']);

?>
