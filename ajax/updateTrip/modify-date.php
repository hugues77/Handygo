<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){
    //Traitement pour page Date - modify-trip
    
    //transform date for format database
    $d_depart  = date_arr($_POST['date-depart-mod']);
    $d_arrivee  = date_arr($_POST['date-arrivee-mod']);

    $h_depart = htmlentities(trim($_POST['h-depart-mod'])); 
    $h_arrivee = htmlentities(trim($_POST['h-arrivee-mod']));
    $user_id = $_SESSION['unique_id'];
    
    $ref_voy = htmlentities(trim($_POST['ref_voy_upd']));  
    
    if(!empty($d_depart) && !empty($d_arrivee) && !empty($h_depart) && !empty($h_arrivee)){ 
        //Update the data of modify-trip
        update_modify_date($d_depart, $d_arrivee, $h_depart, $h_arrivee, $ref_voy, $user_id);
        echo 'success';
    }else{
        echo "veuillez remplir tous les champs requis !";
    }
    
}else{
    echo 'Connectez-vous et publier votre trajet !';
}

?>