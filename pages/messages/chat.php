<?php
//droit d'accès - accès une fois connectés
if(!isset($_SESSION['unique_id'])){
    header("Location:/form");
}elseif($_SESSION['unique_id'] == $params['user_id']){
    header("Location:/espace-membre");
}
$title = "Partager vos trajets avec vos proches";
//menu - Navbar
require_once "layout/partials/topbar-2.php";

?>
<section class="chat">
    <div class="max-width">
        <!-- <h2 class="chat-title">Ma Boite de récéption !</h2> -->
        <div class="chat-content">
            <div class="col-chat1"></div>
            <div class="col-chat2">
                <div class="chat-area">
                    <header>
                        <?php
                        $user_id = $params['user_id'];
                        //echo $user_id; 
                        $chat = user_chat($user_id); 
                        if($chat->rowCount() > 0){
                            $row = $chat->fetch(PDO::FETCH_ASSOC);
                        } 
                        ?>
                        <div class="content-chat">
                            <a href="/messages/list" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                            <?= $row['Image'] != 'image.png' ? '<img src="../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?>
                             
                            <div class="details-chat"> 
                                <span><?=$row['Prenom']." ".$row['Nom'] ?></span>
                                <p><?=$row['Statut']?></p>
                            </div>
                        </div>
                    </header>
                    <hr>
                    <div class="chat-box">  
                        
                    </div>
                    <form action="#" class="typing-area" autocomplete="off"> 
                        <input type="text" name="outgoing_id" value="<?=$_SESSION['unique_id']?>" hidden>
                        <input type="text" name="incoming_id" value="<?=$user_id?>" hidden>
                        <input type="text" name="message" class="input-field" placeholder="Tapez votre message ici...">
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-chat3"></div> 
        </div>
    </div>
</section>