<?php
require_once 'function.php';

//Traitement pour suite signup user
$user_id = $_SESSION['unique_id'];
$prenom_user = htmlentities(trim($_POST['prenom-user']));
$nom_user = htmlentities(trim($_POST['nom-user']));

$date_user = htmlentities(trim($_POST['date-user'])); 
$tel_user = htmlentities(trim($_POST['tel-user']));
$bio_user = htmlentities(trim($_POST['bio-user']));


if(!empty($nom_user) && !empty($prenom_user) && !empty($date_user)){
    //update the data for lastuser name and firsname
    update_info_user($nom_user, $prenom_user, $date_user, $tel_user, $bio_user,  $user_id); 
    echo 'success';
    // setflash("votre profil a été mise à jour");
}else{
    echo "veuillez remplir tous les champs requis !"; 
}


?>