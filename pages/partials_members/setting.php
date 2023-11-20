<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Mon Réglage Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes abonnes-2">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-4">
                <?php require_once "layout/partials/topbar-4.php"; ?>
                    <!-- content -- cards  -->
                    <div class="content-main">
                        <h2 class="title-heading">Parametres de mon compte Handy Go</h2>
                        <a href="/informations/avis/<?=$_SESSION['unique_id']?>">
                            <div class="mesinfos-trajets">
                                Mes Avis
                                <!-- <i class="fas fa-plus"></i> -->
                            </div>
                        </a>
                        <a href="/informations/forgot_password">
                            <div class="mesinfos-trajets">
                                Mot de Passe
                                <!-- <i class="fas fa-plus"></i> -->
                            </div>
                        </a>
                        <a href="/informations/preferences">
                            <div class="mesinfos-trajets">
                                Mes Préférences
                                <!-- <i class="fas fa-plus"></i> -->
                            </div>
                        </a>
                        <a href="/informations/user-data"> 
                            <div class="mesinfos-trajets">
                                Protection  de mes données
                                <!-- <i class="fas fa-plus"></i> -->
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>