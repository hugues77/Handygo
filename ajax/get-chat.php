<?php
    require_once 'function.php';
    //Traitement pour connexion utilisateur
    if(isset($_SESSION['unique_id'])){

        $outgoing_id = htmlentities(trim($_POST['outgoing_id']));
        $incoming_id = htmlentities(trim($_POST['incoming_id']));

        $output ="";

        $tab = [
            "Incoming_msg_id" =>$incoming_id,
            "Outgoing_msg_id" =>$outgoing_id
        ];
        
        $sq = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id WHERE (Outgoing_msg_id =:Outgoing_msg_id AND Incoming_msg_id =:Incoming_msg_id ) OR (Outgoing_msg_id =:Incoming_msg_id AND Incoming_msg_id =:Outgoing_msg_id) ORDER BY msg_id";
        $req = $connexion->prepare($sq);
        $req->execute($tab); 
        
        if($req->rowCount() > 0){
            //if messages exist for two users
            while($row = $req->fetch(PDO::FETCH_ASSOC)){
                if($row['Outgoing_msg_ID'] === $outgoing_id){//if this equals then show the message sender
                    $output .='
                        <div class="chat outgoing">
                            <div class="details">
                                <p>'.$row["Messages"].'</p>
                            </div>
                        </div>
                    ';

                }else{//he is the message receiver
                    $output .='
                    <div class="chat incoming">
                        <img src="../../images/users/'.$row["Image"].'" alt="">
                        <div class="details">
                            <p>'.$row["Messages"].'</p>
                        </div>
                    </div> 
                    ';
                }
            }
            echo $output;
        }
       
       
    }else{
        header("Location:/");
    }
