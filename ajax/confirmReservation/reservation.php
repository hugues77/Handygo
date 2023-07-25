<?php
    require_once '../function.php';

    if(isset($_SESSION['unique_id'])){
        //Traitement pour page itinéraire - post trip 
        $user_id_client = $_SESSION['unique_id'];
        $user_id_voyageur = htmlentities(trim($_POST['user_id_voyageur']));  

        $trip_id = htmlentities(trim($_POST['trip_id']));

        $b_reserver = htmlentities(trim($_POST['place_reserve']));  
        $bagage_dispo = htmlentities(trim($_POST['nb_place']));


        $nb_kg_bag = htmlentities(trim($_POST['qtyBox_bag_confirm']));
        
        $descript_reservation = htmlentities(trim($_POST['des-reservation']));

        //les prix indiquer par le voyageur
        $prix_bag = htmlentities(trim($_POST['prixBag_kg']));

        //calcul du prix total pour une réservation
        $prixTotBag = ($prix_bag * $nb_kg_bag);
    
        //calcul du bagage reserve pour ce trajet + ref voy decoder
        $b_reserver_total = $nb_kg_bag + $b_reserver;

        //calcul du bagage disponible dans le meme trajet 
        $bag_pret = $bagage_dispo - $b_reserver;

        if(($nb_kg_bag == 0)){
            //$_SESSION['ref'] = $ref_voy; //creating session of trip, la detruire après confirmation publication 
            echo 'Merci de choisir le nombre de(s) place(s) souhaités';
        }elseif($nb_kg_bag > $bag_pret){
            echo "place demandé est supérieur au places disponible. Actuellement il y a ".$bag_pret ." place(s)";
        }
        // elseif($courrier_dispo < $nb_courr){
        //     echo 'le nombre des courrier est supérieur au nombre disponible. il reste '.$courrier_dispo.' pour vous' ;
        // }
        elseif(empty($descript_reservation)){ 
            echo "vous avez oublier de remplir la brève description !";  
        }else{
            // insert the data of trip reservation
            $datares = insert_trip_reservation($user_id_voyageur, $user_id_client, $trip_id, $nb_kg_bag,$prixTotBag,$descript_reservation);  

            if($datares){
                //update bagage disponible pour prochains client
                $upd_bag = update_bagage_reserve($trip_id, $b_reserver_total); 
                if($upd_bag){
                    echo "success"; 
                }else{
                    echo "Oups une erreur est survenue veuillez réessayer plus tard. merci";
                }
            }else{
                echo "Erreur d'enregistrement pour cette réservation";

            }
        }
    }else{
        echo "Connectez-vous et réserver votre trajet !";
    }

?>