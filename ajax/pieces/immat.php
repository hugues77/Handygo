<?php
require_once '../function.php';

//Traitement pour suite signup user
$user_id = $_SESSION['unique_id'];        
$user_time = $_SESSION['time'];

$num_immat = htmlentities(trim($_POST['num_immat']));
$image_file_immat = $_FILES['image-file-immat']['name'];

//creer chaque dossier pour user create of the folder for each users
$directory = mkdir("../images/users/".$user_time ."/pieces");

if(!empty($image_file_immat) AND !empty($num_immat)){ 

    //traitement image, taille, extension et poids + save in database
    $image_type = $_FILES['image-file-immat']['type'];
    $image_tmp = $_FILES['image-file-immat']['tmp_name'];
    $image_size = $_FILES['image-file-immat']['size'];

    $extensions = ['.png','.jpg','.jpeg','.pdf','.doc', '.PNG','.JPG','.JPEG', '.PDF','.DOC'];
    $extension = strchr($image_file,'.');

    if($image_size < 2000000){  
        if(in_array($extension, $extensions)){ 
            $image_new = 'Immat_'.$user_time.$extension;

            if($directory == true){
                //chemin vers l'image user
                $path = "../images/users/".$user_time."/pieces/".$image_new;

                //deplacement du fichier dans le dossier
                $ismove_image = move_uploaded_file($image_tmp, $path);
                if($ismove_image){
                    // update image immat
                    // profil_user_image($num_immat, $image_new, $user_id);

                    // update naissance in db
                    echo 'success';  
                }else{
                    echo "Un problème est survenu lors du telechargement !";
                }

            }else{
                echo 'Impossible de creer un dossier utilisateur; réessayer';
            }      

        }else{
            echo "L'image sélectionnée doit etre en format: - jpg, - png, - jpeg !";
        }

    }else{
        echo "La taille du fichier est trop importante, Réessayer !";
    }
    
}else{
    echo "Tous les champs sont sont requis !";
}
