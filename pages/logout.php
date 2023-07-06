<?php
//droit d'accès - accès une fois connectés
if(isset($_SESSION['unique_id'])){
    $user_id = $params['user_id']; //user_id passé en GET
    if(isset($user_id)){
        $status = "Hors ligne maintenant";
        //update for new status connexion
        $logout = logout_user($user_id, $status);

        if($logout){
            unset($_SESSION['unique_id']);  
            unset($_SESSION['time']);
            unset($_SESSION['prenom']);
            unset($_SESSION['nom']);
            unset($_SESSION['image']);
            unset($_SESSION['statut']);
            unset($_SESSION['ref']);
            header("Location:/form"); 
        }else{
            header("Location:/messages/list");
        }

    } else{
        header("Location:/form");
    }

}else{
    header("Location:/form");
}


?>

