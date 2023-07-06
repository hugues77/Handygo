<?php
    require_once 'function.php';
    //Traitement pour connexion utilisateur
  
    $email_login = htmlentities(trim($_POST['email_login']));
    $password_login = htmlentities(trim($_POST['password_login']));
    $status = "En ligne maintenant";


    $success = 0;
    $msg = "Une Erreur !"; 

    if(!empty($email_login) && !empty($password_login)){
        //check user email is valid or not
        if(filter_var($email_login, FILTER_VALIDATE_EMAIL)){
               
            // if email and password is valid
            $res_login = login_user($email_login, $password_login)->rowCount();
            $rows_login = login_user($email_login, $password_login)->fetch(PDO::FETCH_ASSOC);  
            if($res_login > 0){
                //Update the status of user (online)
                $sql2 = $connexion->exec("UPDATE users SET statut ='{$status}' WHERE unique_id={$rows_login['Unique_ID']} ");

                //Creating the differents sessions for user
                $_SESSION['unique_id'] = $rows_login["Unique_ID"];
                $_SESSION['prenom'] = $rows_login["Prenom"];
                $_SESSION['nom'] = $rows_login["Nom"];
                $_SESSION['image'] = $rows_login["Image"];
                
                $success = 1;
                $msg ="";
                
            }else{
                $msg = 'Email ou Mot de passe incorrecte !';
            }
   
        }else{
            // echo $email_login." est une adresse invalide.";
            $msg =  $email_login." est une adresse invalide.";
        }

        
    }else{
        // echo "veuillez remplir tous les champs requis !";
        $msg =  "veuillez remplir tous les champs requis !";
    }

    $res = ["success" =>$success, "msg" => $msg];
    echo json_encode($res);
           
?>