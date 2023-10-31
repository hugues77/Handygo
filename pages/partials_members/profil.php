<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/"); 
}

$title = "Mon profil Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";
// Verify the old, show old are you
$year = date("Y");
$naissance = $row['Date_naissance'];
$naissance_year = date("Y", strtotime($naissance));
// calcul de l'age
$old = ($year-$naissance); 


?> 
<div class="abonnes abonnes-2">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-4">
                <?php require_once "layout/partials/topbar-4.php"; ?>
                    <!-- content -- cards  -->
                    <div class="content-main">
                        <h2 class="title-heading">Mon Profil Handy go, Débutant</h2>
                        
                        <form class="" enctype="multipart/form-data">
                            <div class="error-text error-name"></div>

                            <div class="user">
                                <div class="">
                                    <div class="user-content">
                                        <div class="col-user1"></div>
                                        <div class="col-user2">

                                            <div class="user-img">
                                                <?= $row['Image'] != 'image.png' ? '<img src="../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?>
                                            </div>
                                            <div class="round-profil">
                                                <input type="file" name="user_profil" id="user-profil" accept=".png, .jpg, .jpeg">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                        </div>
                                        <div class="col-user3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="identite">
                                <div class="name">
                                    <span><i class="fa-solid fa-user"></i><?= $row['Prenom'] . " " . $row['Nom'] ?></span><br>
                                    <span><i class="fa-solid fa-folder"></i><?= $old ?> Ans (<?= ($row['Sexe'] == 'h') ? "Homme" : "Femme" ?>)</span>
                                    <p><i class="fa-solid fa-circle-info"></i>Membre depuis <?= strftime("%B %Y", strtotime($row['Date_inscription'])) ?></p>
                                </div>
                                <div class="mel">
                                    <span><i class="fas fa-envelope"></i><?= $row['Email'] ?></span><br>
                                    <span><i class="fa fa-phone"></i><?= strlen($row['Tel1']) >10 ? $row["Tel1"] : 'Ajouter votre téléphone' ?></span>
                                    <p><i class="fas fa-id-badge"></i> <?= $row['Unique_ID'] ?> </p>
                                </div>
                            </div>
                            <hr class="line-profil">
                            <div class="identite">
                                <?php
                                    //query for select the news for user
                                    $pieces = show_piece($_SESSION["unique_id"]);
                                    if ($pieces->rowCount() > 0) {
                                        $piece = $pieces->fetch(PDO::FETCH_ASSOC);
                                    }
                                ?> 
                                <div class="vehicule">
                                    <span><i class="fa-solid fa-hourglass-start"></i>Immatriculation vérifiée</span><br>
                                    <span><i class="fas fa-xmark-circle"></i>Permis de conduire vérifié</span><br>
                                    <span><i class="fas fa-xmark-circle"></i>Numéro de téléphone vérifié</span><br>
                                    <span><i class="fas fa-xmark-circle"></i>Email vérifié</span>
                                </div>
                                <div class="pieces">
                                    <span><i class="fas fa-xmark-circle"></i>Pièce d'identité vérifiée</span><br> 
                                    <span><i class="fa-solid fa-hourglass-start"></i>Adresse physique vérifiée</span><br>
                                    <span><i class="fas fa-xmark-circle"></i>Casier judiciaire vérifié</span>
                                </div>
                            </div>

                            <div class="user-bio">
                                <p><i class="fa-solid fa-quote-left"></i><?= $row['Bio'] ? $row['Bio'] : "Handygo me facilite tellement la vie pour l'ensemble de mes trajets,Rejoins-nous dans l'aventure" ?></p>
                            </div>
                            <a href="/informations/information_user">
                                <div class="mesinfos1">
                                    Modifier mes informations personelles<i class="fas fa-plus"></i>
                                </div>
                            </a>
                            <a href="/informations/complete_user">
                                <div class="mesinfos">
                                    Faire Vérifier mes informations <i class="fas fa-plus"></i>
                                </div>
                            </a>
                            <div class="btn-profil">

                                <div class="btn-voir cancel-btn" onClick="cancelBtn()"><i class="fas fa-plus"></i> Annuler la modification</div>

                                <div class="btn-pub image-profil"><i class="fas fa-folder-open"></i> Modifier ma photo de profil</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>