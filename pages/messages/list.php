<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Liste messages Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-3">
                <?php require_once "layout/partials/topbar-3.php"; ?>
                <div class="home_content">
                    <h2 class="title-heading">Ma Boite de récéption !</h2>


                    <div class="list">
                        <div class="">
                            <div class="list-content-3 ">
                                <div class="col-list1"></div>
                                <div class="col-list2">
                                    <div class="users-list">
                                        <header>
                                            <?php
                                            //query for select the news for user
                                            // $chat = user_chat($_SESSION["unique_id"]);
                                            // if ($chat->rowCount() > 0) {
                                            //     $row = $chat->fetch(PDO::FETCH_ASSOC);
                                            // }
                                            ?> 
                                            <div class="content-list">
                                                <?= $row['Image'] != 'image.png' ? '<img src="../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?>
                                                <div class="details-list">
                                                    <span><?= $row['Prenom'] . " " . $row['Nom'] ?></span>
                                                    <p><?= $row['Statut'] ?></p>
                                                </div>
                                            </div>
                                            <a href="/logout/<?= $_SESSION["unique_id"] ?>" class="logout">Logout</a>
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
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>