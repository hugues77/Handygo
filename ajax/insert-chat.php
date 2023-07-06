<?php
    require_once 'function.php';
    //Traitement pour connexion utilisateur
    if(isset($_SESSION['unique_id'])){

        $outgoing_id = htmlentities(trim($_POST['outgoing_id']));
        $incoming_id = htmlentities(trim($_POST['incoming_id']));
        $message = htmlentities(trim($_POST['message']));

        if(!empty($message)){
            insert_messages($incoming_id, $outgoing_id, $message);
        }
    }else{
        header("Location:/");
    }
