<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){
    //Traitement pour page itinéraire - post trip 
    $user_id = $_SESSION['unique_id'];
    $depart_voy = trim($_POST['depart-voy']);
    $dest_voy = trim($_POST['Destination-voy']);

    $mode = trim($_POST['mode-voy']); 
    //on formate recuperer juste la ville pour depart et destination 
    $depart_formated = strstr($depart_voy, ',',true);
    $dest_formated = strstr($depart_voy, ',',true);

    $ref_voy = substr(str_shuffle($depart_formated.$dest_formated.$mode.$user_id), 0,30); //on applique shuffle

    //on remplace les espaces dans $ref_voy par undescore
    $ref_voy_confirm = (str_replace(' ','_',$ref_voy));
// 

    if(!empty($depart_voy) && !empty($dest_voy) && !empty($mode)){ 

        //insert the data of trip
        insert_trip($depart_voy, $dest_voy, $mode, $ref_voy_confirm, $user_id);
        $_SESSION['ref'] = $ref_voy_confirm; //creating session of trip, la detruire après confirmation publication    
        echo 'success'; 
        
    }else{
        echo "veuillez remplir tous les champs requis !";
    }
}else{
    echo "Connectez-vous et publier votre trajet !";
}

?>