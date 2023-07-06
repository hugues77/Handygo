<?php
require_once '../function.php';

if(isset($_SESSION['unique_id'])){ 
    //Traitement pour page Date - post trip   
    $user_id = $_SESSION['unique_id'];
    $ref_voy = htmlentities(trim($_POST['ref_voy_upd']));
    
    $bagage = htmlentities(trim($_POST['bagage_mod']));
    $courrier = htmlentities(trim($_POST['courrier_mod']));

    $bagage_reserve = htmlentities(trim($_POST['bagage_reserve_mod']));


    $taille_s = isset($_POST['taille_s_mod']) ? '1' : '0';
    $taille_m = isset($_POST['taille_m_mod']) ? '1' : '0';
    $taille_l = isset($_POST['taille_l_mod']) ? '1' : '0';
    $taille_xl = isset($_POST['taille_xl_mod']) ? '1' : '0';
    $taille_xxl = isset($_POST['taille_xxl_mod']) ? '1' : '0';

    $descrip_bagage = htmlentities(trim($_POST['descrip-bagage-mod']));
    
    if(!empty($bagage)){
        if($bagage_reserve >= $bagage){
            echo "bagage disponible ne doit pas être inférieur au bagage déjà réservés par des clients !";
        }else{
            //Update the data of trip for bagage part
            update_trip_bagage($bagage, $courrier, $taille_s, $taille_m, $taille_l, $taille_xl, $taille_xxl, $descrip_bagage, $ref_voy, $user_id);
            echo 'success';
        }

    }else{
        echo "veuillez remplir tous les champs requis !";
    }
}else{
    echo 'Connectez-vous et publier votre trajet !';
}

?>