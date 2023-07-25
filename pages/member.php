<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Mon Espace Abonnés";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-3">
                <?php require_once "layout/partials/topbar-3.php"; ?>
                <div class="home_content">
                    <h2 class="title-heading">Mon Compte Handy go, Débutant</h2>

                    <div class="row">
                        <div class="pannel">
                            <div class="tete">
                                <span>1</span>
                                <h3>Trajet en cours ...</h3>
                            </div>
                            <div class="tete">
                                <span>7</span>
                                <h3>Déjà publiés</h3>
                            </div>
                            <div class="tete">
                                <span>5</span>
                                <h3>Mes reservations</h3>
                            </div>
                        </div>

                        <!-- <div class="column">
                            <div class="card">
                                <div class="icon-wrapper">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <h3>Mes Annonces</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, consequuntur laudantium magni quam cupiditate dignissimos expedita eos quibusdam reprehenderit nihil provident. At sapiente quibusdam illo excepturi, voluptate ex nihil! Asperiores!</p>
                            </div>
                        </div> -->

                    </div>

                    <h2>Dérnières Activités</h2>
                </div>
            </div>
        </div>
    </div>
</div>