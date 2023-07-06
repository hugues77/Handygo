<?php
require_once 'function.php';

    //Traitement pour inscription utilisateur
 
    $email_register = htmlentities(trim($_POST['email_register']));
    $password_register = htmlentities(trim($_POST['password_register']));
    $password_register_confirm = htmlentities(trim($_POST['password_register_confirm'])); 

    $time = time();
    $status = "En ligne maintenant"; 
    $random_id = rand(time(), 10000000); // creating random Id for user 

    if(!empty($email_register) && !empty($password_register) && !empty($password_register_confirm)){
        //check user email is valid or not
        if(filter_var($email_register, FILTER_VALIDATE_EMAIL)){
            //if email is valid
            if(user_exist($email_register) > 0){
                echo $email_register ." est une adresse appartenant à un autre compte";
            }else if($password_register != $password_register_confirm){
                echo "Les deux mot de passe doivent être identiques"; 
            }else{
                $password = sha1($password_register);
                //Here, we save user in the database
                $confirm_insert = register_user($email_register,$password,$random_id,$status);
                if($confirm_insert){
                    //select user for creating the sessions
                    $_SESSION['unique_id'] = $random_id;
                    $_SESSION['time'] = $time;

                    echo "success"; 
                }else{
                    echo "Un problème est survenue lors du sauvegarde; Réessayer";
                }
                
            }

        }else{
            echo $email_register." est une adresse invalide.";
        }

    }else{
        echo "veuillez remplir tous les champs requis !";
    }
           
?>