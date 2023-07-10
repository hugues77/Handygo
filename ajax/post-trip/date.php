<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){
    //Traitement pour page Date - post trip
    if(isset($_SESSION['ref'])){

        //transform date for format database
        $date_depart  = date_arr($_POST['date-depart']);
        // $date_arrivee  = date_arr($_POST['date-arrivee']);

        $h_depart = htmlentities(trim($_POST['h-depart'])); 
        $h_arrivee = htmlentities(trim($_POST['h-arrivee']));
        $date_voy = 1;  
        
        if(!empty($date_depart) && !empty($h_depart)){ 
            //Update the data of trip for date part
            update_trip_date($date_depart, $h_depart,$h_arrivee, $_SESSION['ref'],  $date_voy);
            echo 'success';
        }else{
            echo "veuillez remplir tous les champs requis !";
        }
    }else{
        echo 'vous devriez d\'abord enregistrer le trajet';
    }
}else{
    echo 'Connectez-vous et publier votre trajet !';
}

?>