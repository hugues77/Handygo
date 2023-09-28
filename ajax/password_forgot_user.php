<?php
    require_once 'function.php';
    //on verifie email si existe
    //creation de token, sauvegarde à la base
    //on envoie le mail avec lien token à l'adresse indiqué puis confirmation de l'envoie

    $email_password_forgot = htmlentities(trim($_POST['mail_password_forgot']));

    if(!empty($email_password_forgot)){ 
        if(filter_var($email_password_forgot, FILTER_VALIDATE_EMAIL)){
            if(user_exist($email_password_forgot) > 0){
                //on crée le token
                $lagguge = str_repeat(str_shuffle($email_password_forgot.'123456789'),5);
                // $token = substr($lagguge,0,30);
                $token ='handyOLIVE';
                //on sauvegarde le token - update token_user
                $token_insert = update_token_password($token, $email_password_forgot);
                if($token_insert){
                    //sending mail for update password
                    echo 'un email vient de vous etre envoyé, vérifier puis gérer votre mot de passe';
                }
            }else{
                echo $email_password_forgot ." n'est associé à aucun compte";
            }

        }else{
            echo $email_password_forgot." est une adresse invalide.";
        }

    }else{
        echo "Le champs e-mail est requis !";
    }

?>