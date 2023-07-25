<?php
require_once 'function.php';

//Traitement pour suite signup user
$user_id = $_SESSION['unique_id'];
$user_time = $_SESSION['time'];
$naissance = htmlentities(trim($_POST['naissance']));
$image_file = $_FILES['image-file']['name'];

// Verify the old, if superior of 16
$year = date("Y");
$naissance_year = date("Y", strtotime($naissance));

//creer chaque dossier pour user create of the folder for each users
$directory = mkdir("../images/users/".$user_time);

if(!empty($naissance)){
    //calculate the age
    if(($year - $naissance_year) > 17){
        if(empty($image_file)){
            // update naissance in db
           naissance_user($naissance, $user_id);
           echo 'success';
        }else if(!empty($naissance) AND !empty($image_file)){
            //traitement image, taille, extension et poids + save in database
            $image_type = $_FILES['image-file']['type'];
            $image_tmp = $_FILES['image-file']['tmp_name'];
            $image_size = $_FILES['image-file']['size'];
        
            $extensions = ['.png','.jpg','.jpeg','.PNG','.JPG','.JPEG'];
            $extension = strchr($image_file,'.');

            if($image_size < 2000000){  
                if(in_array($extension, $extensions)){ 
                    $image_new = $_SESSION['nom'].'_'.$user_time.$extension;

                    if($directory == true){
                        //chemin vers l'image user
                        $path = "../images/users/".$user_time.'/'.$image_new;

                        //deplacement du fichier dans le dossier
                        $ismove_image = move_uploaded_file($image_tmp, $path);
                        if($ismove_image){
                            profil_user_image($naissance, $image_new, $user_id);
                            //create session image
                            $_SESSION['image'] = $image_new; 

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
           

            // naissance_user_image($naissance,$image, $user_id);
            // echo 'success';

        }

    }else{
        echo "Vous devriez avoir plus de 17 ans pour s'inscrire !";
    }
    //insert the data for date of birth ant image profil user
    // name_user($firstname_user, $lastname_user, $gender, $user_id);
}else{
    echo "Le champ date de naisance est requis !";
}
