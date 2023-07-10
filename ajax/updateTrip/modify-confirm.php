<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){

    $tel_user = htmlentities(trim($_POST['tel-user-mod']));
    $d_trajet = htmlentities(trim($_POST['descrip-trajet-mod']));

    $ref_voy = htmlentities(trim($_POST['ref_voy_upd']));  
    $user_id = $_SESSION['unique_id'];
    
    if(!empty($tel_user) ){
        if((strlen($tel_user) < 10)){
         echo "le champ téléphone requiert  au moins dix caractères !";
        }else{
            //Update the data of confirm trip for telephone user for trip
            update_modify_confirmation($tel_user,$d_trajet, $ref_voy, $user_id);
            echo 'success';
        }
    }else{
        echo "veuillez remplir tous les champs requis !";
    }
   
}else{
    echo 'Connectez-vous et publier votre trajet !';
}



// unset($_SESSION['ref']);

?>
