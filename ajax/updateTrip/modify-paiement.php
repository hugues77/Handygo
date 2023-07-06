<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
        
    $user_id = $_SESSION['unique_id'];
    $ref_voy = htmlentities(trim($_POST['ref_voy_upd']));  
    
    $prix_bag = htmlentities(trim($_POST['prix_bag_mod']));
    $prix_courr = htmlentities(trim($_POST['prix_courr_mod']));


    //verifier si les  champs sont vide
    if(($prix_bag > 0) || ($prix_courr > 0)){
        //Update the data of modify-trip
        update_modify_paiement($prix_bag, $prix_courr, $ref_voy, $user_id);
        echo 'success';
    }else{
        echo "veuillez remplir tous les champs requis !";
    }

}else{
    echo 'Connectez-vous et publier votre trajet !';
}

?>