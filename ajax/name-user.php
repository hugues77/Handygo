<?php
require_once 'function.php';

//Traitement pour suite signup user
$user_id = $_SESSION['unique_id'];
$firstname_user = htmlentities(trim($_POST['firstname-user']));
$lastname_user = htmlentities(trim($_POST['lastname-user']));

$gender = htmlentities(trim($_POST['gender-user'])); 

if(!empty($firstname_user) && !empty($lastname_user) && !empty($gender)){
    //insert the data for lastuser name and firsname
    name_user($firstname_user, $lastname_user, $gender, $user_id); 
    $_SESSION['nom'] = $lastname_user;
    $_SESSION['prenom'] = $firstname_user; 


    echo 'success';
}else{
    echo "veuillez remplir tous les champs requis !";
}


?>