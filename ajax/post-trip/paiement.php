<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
    //Traitement pour page Date - post trip
    if(isset($_SESSION['ref'])){ 
        
        $user_id = $_SESSION['unique_id'];
        $ref_voy = $_SESSION['ref'];
        
        $prix_bag = htmlentities(trim($_POST['prix_bag']));
        $prix_courr = htmlentities(trim($_POST['prix_courr']));

        $bagage = htmlentities(trim($_POST['qtyBox']));
        $courrier = htmlentities(trim($_POST['qtyBox2'])); 

        //verifier si les  champs sont vide
        if(!empty($prix_bag) || !empty($prix_courr) || !empty($bagage) || !empty($courrier)){

            if(($bagage > 0 )|| ($courrier > 0)){
               if(!empty($bagage) || !empty($courrier)){
                    //box1: bagage / box2:courrier
                    update_trip_prix_rec($bagage, $courrier, $ref_voy, $user_id);
                    update_paiement($ref_voy, $user_id);
                    echo 'success';
                }elseif(!empty($bagage) && empty($courrier)) {
                    update_trip_prix_b($bagage, $ref_voy, $user_id);
                    update_paiement($ref_voy, $user_id);
                    echo 'success';
                
               }elseif(!empty($courrier) && empty($bagage))  {
                    update_trip_prix_c($courrier, $ref_voy, $user_id);
                    update_paiement($ref_voy, $user_id);
                    echo 'success';
                }
            }else{
                 //Update the data of trip for price part
                 if(!empty($prix_courr) && empty($prix_bag))  {
                    update_trip_prix_c($prix_courr, $ref_voy, $user_id);
                    update_paiement($ref_voy, $user_id);
                    echo 'success';
                }elseif(!empty($prix_bag) && empty($prix_courr)) {
                    update_trip_prix_b($prix_bag, $ref_voy, $user_id);
                    update_paiement($ref_voy, $user_id);
                    echo 'success';

                }else{
                    update_trip_prix_rec($prix_bag, $prix_courr, $ref_voy, $user_id);
                    update_paiement($ref_voy, $user_id);
                    echo 'success';
                }
            }
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