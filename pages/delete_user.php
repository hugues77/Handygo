<?php
    //droit d'accès - accès une fois connectés
    if(isset($_SESSION['unique_id'])){
        $user_id = $params['user_id']; //user_id passé en GET
        if(isset($user_id)){
            
            //delete for new user
            // $delete = delete_user($user_id);
            $connexion->exec("delete FROM users WHERE unique_id ='{$user_id}'");

            unset($_SESSION['unique_id']);
            unset($_SESSION['time'] );
            header("Location:/form"); 

        } else{
            header("Location:/form");
        }

    }else{
        header("Location:/form");
    }

?>

