<?php
session_start();
//connnected via DB Mysql

//--------------------------------------------
//connexion de la base de données en ligne
//------------------------------------------
$dbhost = 'localhost';
$dbname = 'tinda_colis';
$dbuser = 'root';
$dbpswd = 'root';

try {
    $connexion = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données, Merci");
}

//differents functions 

//function, verify if user exist
if (!function_exists('user_exist')) {
    function user_exist($email)
    {
        global $connexion;
        $tab = [
            'email' => $email
        ];
        $sql = "SELECT email FROM users WHERE email=:email";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        $res = $req->rowCount();
        return $res;
    }
}
//insert into user in the database
if (!function_exists('register_user')) {
    function register_user($email, $password, $unique_id,$user_time, $status)
    {
        global $connexion;
        $sql2 = "INSERT INTO users (unique_id,email, password, user_time, statut ) VALUES (?,?,?,?,?)";
        $req = $connexion->prepare($sql2);
        $data_insert = $req->execute(array($unique_id, $email, $password, $user_time, $status));
        return $data_insert;
    }
}

//Update to complete the data name + lastname into user in the database
if (!function_exists('name_user')) {
    function name_user($firstname, $lastname, $gender, $user_id)
    {
        global $connexion;
        $user_update = $connexion->prepare("UPDATE users SET nom =:nom, prenom=:prenom, sexe=:sexe WHERE unique_id=:unique_id");
        $user_update->execute(array('nom' => $lastname, 'prenom' => $firstname, 'sexe' => $gender, 'unique_id' => $user_id));
        return $user_update;
    }
}

//Update to complete the all user in the database
if (!function_exists('update_info_user')) {
    function update_info_user($nom, $prenom, $date, $tel, $bio, $user_id)
    {
        global $connexion;
        $user_update = $connexion->prepare("UPDATE users SET nom =:nom, prenom=:prenom, date_naissance =:date_naissance, tel1 =:tel1, bio =:bio WHERE unique_id=:unique_id");
        $user_update->execute(array('nom' => $nom, 'prenom' => $prenom, 'date_naissance' => $date, 'tel1' =>$tel, 'bio' =>$bio, 'unique_id' => $user_id));
        return $user_update;
    }
}

//Update to complete the data of naissance into user in the database
if (!function_exists('naissance_user')) {
    function naissance_user($naissance, $user_id)
    {
        global $connexion;
        $naissance_update = $connexion->prepare("UPDATE users SET date_naissance =:date_naissance WHERE unique_id=:unique_id");
        $naissance_update->execute(array('date_naissance' => $naissance, 'unique_id' => $user_id));
        return $naissance_update;
    }
}

//Update to complete the data of naissance with image into user in the database
if (!function_exists('profil_user_image')) {
    function profil_user_image($naissance, $image, $user_id)
    {
        global $connexion; 
        $naissance_update_img = $connexion->prepare("UPDATE users SET date_naissance =:date_naissance, image =:image WHERE unique_id=:unique_id");
        $naissance_update_img->execute(array('date_naissance' => $naissance, 'image' => $image, 'unique_id' =>$user_id));
        return $naissance_update_img;
    }
}

//insert user_id for table pieces in the database 
if (!function_exists('insert_user_id_piece')) {
    function insert_user_id_piece($user_id)
    {
        global $connexion;
        $sql2 = "INSERT INTO pieces (user_id) VALUES (?)";
        $req = $connexion->prepare($sql2);
        $data_insert = $req->execute(array( $user_id));
        return $data_insert;
    }
}

//function, verify if user_id exist table piece_id
if (!function_exists('user_id_piece')) {
    function user_id_piece($user_id)
    {
        global $connexion;
        $tab = [
            'user_id' => $user_id
        ];
        $sql = "SELECT user_id FROM users WHERE user_id=:user_id";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        $res = $req->rowCount();
        return $res;
    }
}
//Update to complete document foruser in the database
if (!function_exists('update_doc_user')) {
    function update_doc_user($doc_piece, $user_id)
    {
        global $connexion; 
        $upd_doc = $connexion->prepare("UPDATE pieces SET immatric =:immatric WHERE user_id=:user_id");
        $upd_doc->execute(array('immatric' => $doc_piece, 'user_id' =>$user_id));
        return $upd_doc;
    }
}

//function for update posted table piece
if (!function_exists("update_posted_piece")) {
    function update_posted_piece($user_id)
    {
        global $connexion;
        $upd_posted = $connexion->prepare("UPDATE pieces SET posted =:posted WHERE user_id=:user_id AND ref_voy =:ref_voy");
        $upd_posted->execute(array('posted' => 1, 'user_id' => $user_id));
        return $upd_posted;
    }
}


//Update to complete the data of naissance with image into user in the database
if (!function_exists('update_profil_user_image')) {
    function update_profil_user_image( $image, $user_id)
    {
        global $connexion; 
        $naissance_update_img = $connexion->prepare("UPDATE users SET image =:image WHERE unique_id=:unique_id");
        $naissance_update_img->execute(array( 'image' => $image, 'unique_id' =>$user_id));
        return $naissance_update_img;  
    }
}

//select user
if (!function_exists('select_user')) {
    function select_user($email)
    {
        global $connexion;
        $tab = [
            'email' => $email
        ];
        $sql = "SELECT email FROM users WHERE email=:email";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->rowCount();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}

//login user into the database
if (!function_exists('login_user')) {
    function login_user($email, $password)
    {
        global $connexion;
        $tab = [
            'email' => $email,
            'password' => sha1($password)
        ];
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->rowCount();
        // $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $req;
    }
}

//insert into messages for user in the database/ table message
if (!function_exists('insert_messages')) {
    function insert_messages($incoming_id, $outgoing_id, $message)
    {
        global $connexion;
        $sq = "INSERT INTO messages (Incoming_msg_ID,Outgoing_msg_id, Messages) VALUES (?,?,?)";

        $req = $connexion->prepare($sq);
        $data_insert = $req->execute(array($incoming_id, $outgoing_id, $message));

        return $data_insert;
    }
}

//Insert or Update the differents data for trip user

//insert into trip in the database for itineraire
if (!function_exists('insert_trip')) {
    function insert_trip($depart, $dest, $mode, $ref, $user_id)
    {
        global $connexion;
        $sql2 = "INSERT INTO trip (depart, Destination, mode_voy, ref_voy, user_id, itineraire ) VALUES (?,?,?,?,?,?)";
        $req = $connexion->prepare($sql2);
        $data_insert = $req->execute(array($depart, $dest, $mode, $ref, $user_id, 1));
        return $data_insert;
    }
}

//Update into trip in the database for date
if (!function_exists('update_trip_date')) {
    function update_trip_date($d_depart, $h_depart, $h_arrivee, $ref,  $date_voy)
    {
        global $connexion;

        $trip_date = $connexion->prepare("UPDATE trip SET Date_depart =:Date_depart, Heure_depart =:Heure_depart, Heure_arrivee =:Heure_arrivee, date_voy =:date_voy WHERE ref_voy =:ref_voy");
        $trip_date->execute(array('Date_depart' => $d_depart, 'Heure_depart' => $h_depart, 'Heure_arrivee' => $h_arrivee, 'date_voy' => $date_voy, 'ref_voy' => $ref));
        return $trip_date;
    }
}

//Update into trip in the database for Bagage  

if (!function_exists('update_trip_place')) {
    function update_trip_place($place, $ref, $user_id)
    {
        global $connexion;
        $place_title = 1;
        $trip_prix = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id SET nb_place =:nb_place, bagage_title =:bagage_title WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $trip_prix->execute(array('nb_place' => $place, 'ref_voy' => $ref, 'user_id' => $user_id, 'bagage_title' =>$place_title));
        return $trip_prix;
    }
}



//Update into trip in the database for prix recommandé
if (!function_exists('update_trip_prix_rec')) {
    function update_trip_prix_rec($prix_bag, $prix_courr, $ref, $user_id)
    {
        global $connexion;
        $trip_prix_rec = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id SET prix_bag =:prix_bag, prix_courrier =:prix_courrier WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $trip_prix_rec->execute(array('prix_bag' => $prix_bag, 'prix_courrier' => $prix_courr, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $trip_prix_rec;
    }
}
//modif title paiement en 1
if (!function_exists('update_paiement')) {
    function update_paiement($ref, $user_id)
    {
        global $connexion; 
        $paiement = 1;
        $pam = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id SET paiement_title =:paiement_title WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $pam->execute(array('paiement_title' => $paiement, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $pam;
    }
}


//Update into trip in the database for prix recommandé pour juste bagage
if (!function_exists('update_trip_prix_b')) {
    function update_trip_prix($prix, $ref, $user_id)
    {
        global $connexion;
        $trip_prix = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id SET prix_bag =:prix_bag WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $trip_prix->execute(array('prix_bag' => $prix, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $trip_prix;
    }
}
//Update into trip in the database for prix recommandé pour juste courrier
if (!function_exists('update_trip_prix_c')) {
    function update_trip_prix_c($prix_courr, $ref, $user_id)
    {
        global $connexion;
        $trip_prix_c = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id SET prix_courrier =:prix_courrier WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $trip_prix_c->execute(array('prix_courrier' => $prix_courr, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $trip_prix_c;
    }
}


//Update into trip in the database for comfirmation
if (!function_exists('update_trip_confirm')) {
    function update_trip_confirm($tel, $user_id)
    {
        global $connexion;
        $trip_confirm = $connexion->prepare("UPDATE users SET tel2 =:tel2 WHERE unique_id =:unique_id");
        $trip_confirm->execute(array('tel2' => $tel, 'unique_id' => $user_id));
        return $trip_confirm;
    }
}

//Update into trip in the database for confirm2
if (!function_exists('update_trip_confirm_d')) {
    function update_trip_confirm_d($descrip, $user_id, $ref)
    {
        global $connexion;
        $trip_confirm_d = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id SET description_trip =:description_trip WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $trip_confirm_d->execute(array('description_trip' => $descrip, 'user_id' => $user_id, 'ref_voy' => $ref));
        return $trip_confirm_d;
    }
}

//Update into trip in the database for confirm3
if (!function_exists('update_trip_confirm_a')) {
    function update_trip_confirm_a($adresse, $user_id, $ref)
    {
        global $connexion;
        $trip_confirm_a = $connexion->prepare("UPDATE trip INNER JOIN users ON users.unique_id = trip.user_id  SET adresse_trip =:adresse_trip WHERE ref_voy =:ref_voy AND user_id =:user_id");
        $trip_confirm_a->execute(array('adresse_trip' => $adresse, 'user_id' => $user_id, 'ref_voy' => $ref));
        return $trip_confirm_a;
    }
}

//function for buton retour post-trip with title section ITINERAIRE
if (!function_exists("update_itiner_title")) {
    function update_itiner_title($user_id, $ref) 
    {
        global $connexion;
        $upd_itin = $connexion->prepare("UPDATE trip SET itineraire =:itineraire WHERE user_id=:user_id AND ref_voy =:ref_voy");
        $upd_itin->execute(array('itineraire' => 0, 'user_id' => $user_id, 'ref_voy' => $ref));
        return $upd_itin;
    }
}
//function for button retour ITINERAIRE / delete trajet
if (!function_exists("delete_ref_trip")) {
    function delete_ref_trip($ref) 
    {
        global $connexion;
        $del_itin = $connexion->prepare("DELETE FROM trip WHERE ref_voy =:ref_voy");
        $del_itin->execute(array('ref_voy' => $ref));
        return $del_itin;
    }
}

//function for buton retour post-trip with title section date
if (!function_exists("update_date_title")) {
    function update_date_title($user_id, $voy_id)
    {
        global $connexion;
        $upd_itin = $connexion->prepare("UPDATE trip SET date_voy =:date_voy WHERE user_id=:user_id AND ref_voy =:ref_voy");
        $upd_itin->execute(array('date_voy' => 0, 'user_id' => $user_id, 'ref_voy' => $voy_id));
        return $upd_itin;
    }
}

//function for buton retour post-trip with title section BAGAGE
if (!function_exists("update_bagage_title")) {
    function update_bagage_title($user_id, $voy_id)
    {
        global $connexion;
        $upd_itin = $connexion->prepare("UPDATE trip SET bagage_title =:bagage_title WHERE user_id =:user_id AND ref_voy =:ref_voy");
        $upd_itin->execute(array('bagage_title' => 0, 'user_id' => $user_id, 'ref_voy' => $voy_id));
        return $upd_itin;
    }
}

//function for buton retour post-trip with title section PAIEMENT
if (!function_exists("update_paiement_title")) {
    function update_paiement_title($user_id, $voy_id)
    {
        global $connexion;
        $upd_itin = $connexion->prepare("UPDATE trip SET paiement_title =:paiement_title WHERE user_id=:user_id AND ref_voy =:ref_voy");
        $upd_itin->execute(array('paiement_title' => 0, 'user_id' => $user_id, 'ref_voy' => $voy_id));
        return $upd_itin;
    }
}

//function for date format, convert to date for database
if (!function_exists('date_arr')) {
    function date_arr($date){
        $text  =$date;
        $mois = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre');
        $moisarr = array('01','02','03','04','05','06','07','08','09','10','11','12');
        $text1 = str_replace(' ','-',$text);
        $text2 = str_replace($mois, $moisarr, $text1);
        return  date("Y-m-d", strtotime($text2));
    }
}

//insert into resevation in the database for reservation trip
if (!function_exists('insert_trip_reservation')) {
    function insert_trip_reservation($user1, $user2, $trip_id, $nb1, $prix1, $description)
    {
        global $connexion;
        $sql2 = "INSERT INTO reservation (ID_user_voyageur, ID_user_client,  Trip_ID, nbre_bag, prix_tot_bag, Description_res) VALUES (?,?,?,?,?,?)";
        $req = $connexion->prepare($sql2);
        $data_insert_res = $req->execute(array($user1, $user2, $trip_id, $nb1, $prix1, $description));
        return $data_insert_res;
    }
}

//Update into booking in the database for reservation
if (!function_exists('update_trip_reservation')) {
    function update_trip_reservation($user2, $trip_id, $nb1, $prix1, $description)
    {
        global $connexion;
        $upt_res = $connexion->prepare("UPDATE reservation SET nbre_bag =:nbre_bag, prix_tot_bag =:prix_tot_bag, description_res =:description_res WHERE trip_id =:trip_id AND ID_user_client =:ID_user_client");
        $upt_res->execute(array('description_res' => $description, 'ID_user_client' => $user2, 'trip_id' => $trip_id, 'nbre_bag' => $nb1));
        return $upt_res;
    }
}


//Update to total luggage in trip
if (!function_exists('update_bagage_reserve')) {
    function  update_bagage_reserve($ref, $b_reserver)
    {
        global $connexion;
        $user_bagage = $connexion->prepare("UPDATE trip SET place_reserve =:place_reserve WHERE ref_voy =:ref_voy");
        $user_bagage->execute(array('place_reserve' => $b_reserver, 'ref_voy' => $ref));
        return $user_bagage;
    }
}

// update itineraire trip in the database - modify trip 
if (!function_exists('update_itineraire_trip')) {
    function update_itineraire_trip($depart, $destination, $mode, $ref, $user_id)
    {
        global $connexion;
        $sql2 = "UPDATE trip SET depart =:depart, destination =:destination, mode_voy =:mode_voy WHERE ref_voy =:ref_voy AND user_id =:user_id";
        $data_upd = $connexion->prepare($sql2);
        $data_upd->execute(array('depart' => $depart, 'destination' => $destination, 'mode_voy' => $mode, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $data_upd;
    }
}
// update date trip in the database - modify trip 
if (!function_exists('update_modify_date')) {
    function update_modify_date($date1, $h_depart, $h_arrivee, $ref, $user_id)
    {
        global $connexion;
        $sql2 = "UPDATE trip SET date_depart =:date_depart, Heure_depart =:Heure_depart, heure_arrivee =:heure_arrivee WHERE ref_voy =:ref_voy AND user_id =:user_id";
        $data_upd = $connexion->prepare($sql2);
        $data_upd->execute(array('date_depart' => $date1, 'heure_depart' => $h_depart, 'heure_arrivee' => $h_arrivee, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $data_upd;
    }
}
// update paiement trip in the database - modify trip 
if (!function_exists('update_modify_paiement')) {
    function update_modify_paiement($prix_bag, $ref, $user_id)
    {
        global $connexion;
        $sql2 = "UPDATE trip SET prix_bag =:prix_bag WHERE ref_voy =:ref_voy AND user_id =:user_id";
        $data_upd = $connexion->prepare($sql2);
        $data_upd->execute(array('prix_bag' => $prix_bag, 'ref_voy' => $ref, 'user_id' => $user_id));
        return $data_upd;
    }
}

// update confirm trip in the database - modify trip 
if (!function_exists('update_modify_confirmation')) {
    function update_modify_confirmation($tel2, $description, $ref, $user_id)
    {
        global $connexion;
        $trip_confirm = $connexion->prepare("UPDATE trip, users SET description_trip =:description_trip, tel2 =:tel2 WHERE ref_voy =:ref_voy AND user_id =:user_id AND trip.user_id = users.unique_id");
        $trip_confirm->execute(array('description_trip' => $description,  'tel2' => $tel2, 'user_id' => $user_id, 'ref_voy' => $ref));
        return $trip_confirm;
    }
}

//verify if session ref is equals avec trip_id in the database
if (!function_exists('verify_session_ref')) {
    function verify_session_ref($ref, $user_id)
    {
        global $connexion;
        $tab = [
            'Ref_voy' => $ref,
            'unique_id' => $user_id
        ];
        $sql = "SELECT ref_voy FROM trip WHERE Ref_voy=:Ref_voy AND unique_id=:unique_id";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->rowCount();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}


//insert into comment in the database
if (!function_exists('insert_comment')) {
    function insert_comment($unique_id, $titre, $description)
    {
        global $connexion;
        $sql2 = "INSERT INTO comment (user_id, titre_com, description_com ) VALUES (?,?,?)";
        $req = $connexion->prepare($sql2);
        $data_insert = $req->execute(array($unique_id, $titre, $description));
        return $data_insert;
    }
}














//PHP Router
require_once 'vendor/autoload.php';
$router = new AltoRouter();
$router->map('GET|POST', '/messages/chat/[i:user_id]', 'messages/chat', 'chat');
