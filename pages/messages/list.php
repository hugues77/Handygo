<?php 
//droit d'accès - accès une fois connectés
if(!isset($_SESSION['unique_id'])){
    header("Location:/form");
}

//titre de la page 
$title = "Partager vos Kilos avec vos proches";
//menu - Navbar
require_once "layout/partials/topbar-2.php";

?> 
<section class="list"> 
    <div class="max-width">
        <h2 class="list-title">Ma Boite de récéption !</h2>
        <div class="list-content ">
            <div class="col-list1"></div>
            <div class="col-list2">
                <div class="users-list">
                    <header>
                        <?php
                        //query for select the news for user
                        $chat = user_chat($_SESSION["unique_id"]);
                        if($chat->rowCount() > 0){
                            $row = $chat->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <div class="content-list">
                            <img src="../images/users/<?=$row['Image'] ?>" alt="">
                            <div class="details-list">
                                <span><?=$row['Prenom']." ".$row['Nom'] ?></span>
                                <p><?=$row['Statut']?></p>
                            </div>
                        </div>
                        <a href="/logout/<?=$_SESSION["unique_id"]?>" class="logout">Logout</a> 
                    </header>
                    <div class="search-list">
                        <span class="text-list">Merci de selectionner un membre pour demarrer la discussion</span>
                        <input type="text" placeholder="Entrez le nom à rechercher...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="error-text"></div>
                    
                    <div class="users-list-item">
                        
                    </div>
                </div>
            </div>
            <div class="col-list3"></div> 
        </div>
    </div>
</section>