<?php
require_once 'function.php';

//Traitement pour suite signup user
$user_id = $_SESSION['unique_id'];
$user_time = $_SESSION['time'];
$user_time_image = time();
$image_file = $_FILES['user_profil']['name'];

//creer chaque dossier pour user create of the folder for each users
// $directory = mkdir("../images/users/" . $user_time);



if (empty($image_file)) {
    // update naissance in db
    echo 'Merci de choisir une image pour votre profil';
} else {
    //traitement image, taille, extension et poids + save in database
    $image_type = $_FILES['user_profil']['type'];
    $image_tmp = $_FILES['user_profil']['tmp_name'];
    $image_size = $_FILES['user_profil']['size'];

    $extensions = ['.png', '.jpg', '.jpeg', '.PNG', '.JPG', '.JPEG'];
    $extension = strchr($image_file, '.');

    if ($image_size < 2000000) {
        if (in_array($extension, $extensions)) {
            $image_new = $_SESSION['nom'] . '_' . $user_time_image . $extension;

            //chemin vers l'image user
            $path = "../images/users/" . $user_time . '/' . $image_new;

            //deplacement du fichier dans le dossier
            $ismove_image = move_uploaded_file($image_tmp, $path);
            if ($ismove_image) {
                update_profil_user_image($image_new, $user_id);
                //create session image
                $_SESSION['image'] = $image_new;

                // update naissance in db
                echo 'success';
            } else {
                echo "Un problème est survenu lors du téléchargement !";
            }
        } else {
            echo "L'image sélectionnée doit etre en format: - jpg, - png, - jpeg !";
        }
    } else {
        echo "La taille du fichier est trop importante, Réessayer !";
    }

}
