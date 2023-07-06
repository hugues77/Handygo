<?php

while($row = $req->fetch(PDO::FETCH_ASSOC)){ 
    $user_id = $row['Unique_ID'] ;
    
    //query for messages
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$user_id} OR outgoing_msg_id = {$user_id}) AND (incoming_msg_id = {$_SESSION['unique_id']} OR outgoing_msg_id = {$_SESSION['unique_id']}) ORDER BY msg_id DESC LIMIT 1";

    $req2 = $connexion->query($sql2);
    $row2 = $req2->fetch(PDO::FETCH_ASSOC);

    if($req2->rowCount() > 0){
        //Normalement result devrait prendre la valeur du BIO du user
        $result = $row2['Messages'];
    }else{
        $result ="Aucun Message disponible ";
    }
    //verify the number of characters
    (strlen($result) > 30) ? $msg = substr($result,0, 30).' ...': $msg = $result;

    //check if user is offline or online
    ($row["Statut"] == "Hors ligne maintenant") ? $offline = "offline" : $offline="";
    
    $output .='
    <a href=" '.$router->generate("chat",["user_id" =>$user_id]).' ">
        <div class="content-list">
            <img src="../images/users/'.$row['Image'].'" alt="">
            <div class="details-list">
                <span>'.$row['Prenom'] ." ".$row['Nom'].'</span>
                <p>'.$msg.'</p> 
            </div>
        </div>
        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
    </a>
    ';
}