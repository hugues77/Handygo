<?php
require_once 'function.php';

    if(isset($_SESSION['unique_id'])){
        $user_id = $_SESSION['unique_id'];
        $titre_temoignage = trim($_POST['titre-tem']);
        $description_temoignage = trim($_POST['description-tem']);

        if(!empty($titre_temoignage) AND !empty($description_temoignage)){
            $insert = insert_comment($user_id, $titre_temoignage, $description_temoignage);
            if($insert){
            echo 'success';
            }else{
                echo 'Problème lors d\'enregistrement du commentaire';
            }
        }else{
            echo 'Tous les champs sont requis!';
        }

    }else{
        echo 'Connectez-vous pour poursuivre'. $user_id;
    }
?>