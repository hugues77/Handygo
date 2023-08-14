<?php
require_once 'function.php';

//Traitement pour suite signup user
$user_id = $_SESSION['unique_id'];
$user_time = $_SESSION['time'];

$doc_text = htmlentities(trim($_POST['document-text']));

$doc_file = $_FILES['doc-user']['name'];



if(!empty($doc_text) AND !empty($doc_file)){
            
    //traitement image, taille, extension et poids + save in database
    $doc_type = $_FILES['doc-user']['type'];
    $doc_tmp = $_FILES['doc-user']['tmp_name'];
    $doc_size = $_FILES['doc-user']['size'];

    $extensions = ['.png','.jpg','.jpeg','.pdf','.PNG','.JPG','.JPEG','.PDF'];
    $extension = strchr($doc_file,'.');


    if($doc_size < 2000000){  
        if(in_array($extension, $extensions)){ 
                $doc_file_new = $doc_text.'_'.$user_time.$extension;

                //chemin vers l'image user
                $path = "../images/users/".$user_time.'/'.$doc_file_new;

                //deplacement du fichier dans le dossier
                $ismove_image = move_uploaded_file($doc_tmp, $path);
                if($ismove_image){
                    if(user_id_piece($user_id)){
                        echo 'ozali';
                    }else{
                        $user = insert_user_id_piece($user_id);
                        if($user){
                            echo 'tu es inscrit';
                        }
                    }
                                          
                    // if($doc_text =='immatriculation'){
                    //     update_doc_user($doc_file_new, $user_id);                         
                    //     echo 'success Immatriculation';  
                    // }elseif($doc_text =='identite'){
                    //     // update_doc_user($doc_file_new, $user_id);                                    
                    //     echo 'success identité'; 
                    // }else{
                    //     echo 'rien ne marche !';
                    // }
                

                }else{ 
                    echo "Un problème est survenu lors du téléchargement du fichier !";
                }                      

        }else{
            echo "Le document sélectionné doit etre en format: - jpg, - png, - jpeg, -pdf !";
        }

    }else{
        echo "La taille du fichier est trop importante, Réessayer !";
    }

}else{
    echo "veuillez remplir tous les champs requis !"; 
}

