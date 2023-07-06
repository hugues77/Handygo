<?php
//verify if user exist
if(!function_exists('user_exist')){
    function user_exist($email){
        global $connexion;
        $tab =[
            'email' =>$email
        ];
        $sql = "SELECT * FROM users WHERE email=:email";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        $res = $req->rowCount();
        return $res;
    }
}

//function for show des user chat (user_id)
if(!function_exists('user_chat')){
    function user_chat($user_id){
        global $connexion;
        $tab =[
            'unique_id' =>$user_id
        ];
        $sql = "SELECT * FROM users WHERE unique_id=:unique_id";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->rowCount();
        return $req; 
    }
}

//function for logout user with her user id
if(!function_exists("logout_user")){
    function logout_user($user_id, $status){
        global $connexion;
        $logout = $connexion->prepare("UPDATE users SET statut =:statut WHERE unique_id=:unique_id");
        $logout->execute(array('statut' => $status, 'unique_id' =>$user_id));
        return $logout;
    }
}

//function for logout user with her user id
// if(!function_exists("delete_user")){
//     function delete_user($user_id){
//         global $connexion;
//         $delete = $connexion->prepare("delete FROM user WHERE unique_id =:unique_id");
//         $delete->execute(array('unique_id' =>$user_id));
//         return $delete;
//     }
// }

//function pour rediriger le client s'il n'est pas connecté
function auth($page){
    if(!isset($_SESSION['unique_id'])){
        header("Location:/$page");
    }
}

//function pour afficher les trajets postés depuis la Bdd
if(!function_exists('show_trip')){
    function show_trip(){
        global $connexion;
 
        $sql = "SELECT * FROM users, trip WHERE users.unique_id = trip.user_id AND date_depart >= CURDATE() ORDER BY id_voy DESC";
        $req = $connexion->query($sql);

        // $trip = $req->fetchAll(PDO::FETCH_OBJ);
        // $req->execute($tab);

        return $req;
    }
}

//function pour afficher les trajets recherchés par user passés en get
if(!function_exists('show_trip_search')){
    function show_trip_search($depart, $destination, $date_dep){
        global $connexion;

        $tab =[
            'depart' =>$depart,
            'destination'=>$destination,
            'date_depart' =>$date_dep
        ];
 
        $sql = "SELECT * FROM users, trip WHERE users.unique_id = trip.user_id AND depart= :depart AND destination= :destination AND date_depart= :date_depart  ORDER BY id_voy DESC";

        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $req;
    }
}

//function pour afficher les trajets recherchés par depart + retour passés en get
if(!function_exists('show_trip_tard')){
    function show_trip_tard($depart, $dest){
        global $connexion;

        $tab =[
            'depart' =>$depart,
            'destination'=>$dest
        ];
 
        $sql = "SELECT * FROM users, trip WHERE users.unique_id = trip.user_id AND depart= :depart AND destination= :destination AND date_depart >= CURDATE()  ORDER BY id_voy DESC";

        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $req;
    }
}

//function pour afficher le details du  trajet et user
if(!function_exists('details_trip')){
    function details_trip($ref){
        global $connexion;
 
        $sql = "SELECT * FROM users, trip WHERE users.unique_id = trip.user_id AND ref_voy = '$ref'  ORDER BY id_voy DESC";
        $req = $connexion->query($sql);

        // $trip = $req->fetchAll(PDO::FETCH_OBJ);
        // $req->execute($tab);

        return $req;
    }
}

//function for date format, convert to date for database
if(!function_exists('date_arr')){
    function date_arr($date){
        $text  =$date;
        $mois = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');
        $moisarr = array('01','02','03','04','05','06','07','08','09','10','11','12');
        $text1 = str_replace(' ','-',$text);
        $text2 = str_replace($mois, $moisarr, $text1);
        return $date_search =  date("Y-m-d", strtotime($text2));
    }
}

//function pour afficher les utilisateurs qui ont déjà reserver le  trajet 
if(!function_exists('display_user_booked')){ 
    function display_user_booked($ref, $user_voy){
        global $connexion;
 
        $sql = "SELECT U.nom, U.prenom, U.image, U.unique_id FROM users U, reservation R WHERE U.unique_id = R.ID_user_client AND R.trip_id = '$ref' AND R.ID_user_voyageur = '$user_voy' ORDER BY R.id_res ";
        $req = $connexion->query($sql);

        // $trip = $req->fetchAll(PDO::FETCH_ASSOC);
        // $req->execute($tab);
        return $req;
    }
}

//function pour verifier si l'utilisateur à deja reserver
if(!function_exists('verify_user_booked')){
    function verify_user_booked($user_id, $trip_id){
        global $connexion;

        $tab =[
            'ID_user_client' =>$user_id,
            'trip_id'        =>$trip_id
        ];
        $sql = "SELECT * FROM reservation WHERE ID_user_client =:ID_user_client AND trip_id =:trip_id";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        $res = $req->rowCount();
        return $res;
    }
}

//function pour afficher le details de chaque reservation 
if(!function_exists('details_reservation')){
    function details_reservation($ref, $user){ 
        global $connexion;
        $sql = "SELECT * FROM trip, reservation WHERE trip.user_id = reservation.ID_user_voyageur AND reservation.trip_id = '$ref'AND  reservation.ID_user_client = '$user' ";

        $req = $connexion->query($sql);

        // $req = $req->fetchAll(PDO::FETCH_OBJ);
        return $req;
    }
}

//function for calculate the different kg bagage with ref voy
if(!function_exists('total_bagage_reservation')){
    function total_bagage_reservation($ref){
        global $connexion;
        $tab =[
            'trip_id' =>$ref
        ];
        $sql = "SELECT SUM(nbre_bag) AS nbre_bag FROM reservation WHERE trip_id =:trip_id ";
        $req = $connexion->prepare($sql);
        $req->execute($tab);
        // $res = $req->rowCount();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
} 

// page modify Trip
//function pour afficher le details du voyage publier par user 
if(!function_exists('details_modify_trip')){
    function details_modify_trip($ref, $user){ 
        global $connexion;
        $sql = "SELECT * FROM trip,users WHERE trip.user_id = users.unique_id AND ref_voy = '$ref'AND user_id = '$user' ";

        $req = $connexion->query($sql);

        // $req = $req->fetchAll(PDO::FETCH_OBJ);
        return $req;
    }
}