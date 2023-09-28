<?php
require_once 'function.php';
//Traitement pour connexion utilisateur
$user_id = $_SESSION['unique_id'];
$password_actuel = htmlentities(trim($_POST['password_actuel']));
$password_new = htmlentities(trim($_POST['password_new']));
$password_confirm_new = htmlentities(trim($_POST['password_confirm_new']));

if (isset($_SESSION['unique_id'])) {
    if (!empty($password_actuel) && !empty($password_new) && !empty($password_confirm_new)) {
        if ($password_actuel != $password_new) {
            if ($password_new == $password_confirm_new) {
                //function pour verifier password actuel
                $pass = verify_password_user($user_id, $password_actuel);
                if ($pass) {
                    //update password user
                    $update_pass = update_password_user($password_confirm_new, $user_id);
                    if ($update_pass) {
                        echo 'success';
                    
                    } else {
                        echo 'un problème est survenue lors du changement. réessayer';
                    }
                } else {
                    echo 'Le mot de passe actuel n\'est pas valide';
                }
            } else {
                echo "Les deux mot de passe doivent être identiques";
            }
        }else{
            echo 'Le nouveau mot de passe doit etre different de l\'ancien';
        }
    } else {
        echo "veuillez remplir tous les champs requis !";
    }
} 



?>