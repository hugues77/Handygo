<?php
    require_once '../function.php';

        //Traitement pour connexion utilisateur
        if(isset($_SESSION['unique_id'])){

            $unique_id = $_SESSION['unique_id'];
            $ref_voy = $_SESSION['ref'];

            //update for title itineraire for 1
            $update_title = update_bagage_title($unique_id, $ref_voy);
            if($update_title){
                echo 'success';
            }else{
                echo "Erreur d'affichage lors de retour";
            }
        }
?>