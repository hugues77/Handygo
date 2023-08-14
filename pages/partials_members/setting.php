<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Mon Réglage Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-3">
                <?php require_once "layout/partials/topbar-3.php"; ?>
                <div class="home_content">
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
                    <a href="/informations/archives">
                        <div class="mesinfos-trajets">
                            Mes Préferences
                            <!-- <i class="fas fa-plus"></i> -->
                        </div>
                    </a>
                    <a href="/informations/archives">
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