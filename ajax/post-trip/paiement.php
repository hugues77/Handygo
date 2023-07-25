<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
    //Traitement pour page Date - post trip
    if(isset($_SESSION['ref'])){ 
        
        $user_id = $_SESSION['unique_id'];
        $ref_voy = $_SESSION['ref'];

        $prix_pl = htmlentities(trim($_POST['paiement']));  

        //verifier si les  champs sont vide
        if(!empty($prix_pl)){

            update_trip_prix($prix_pl, $ref_voy, $user_id);
            update_paiement($ref_voy, $user_id);
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