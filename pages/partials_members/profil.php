<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Mon profil Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-3">
                <?php  require_once "layout/partials/topbar-3.php";?> 
                <div class="home_content">
                    <h2 class="title-heading">Mon Profil Handy go, Débutant</h2>

                   
                </div>
            </div>
        </div>
    </div>
</div>