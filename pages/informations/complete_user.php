<?php
//droit d'accès - accès une fois connectés
if (isset($_SESSION['unique_id'])) {

    $title = "Bienvenue au HandyGo, Amusez-vous bien !";
    //menu - Navbar
    require_once "layout/partials/topbar-2.php";

    //ma date d'anniversaire (date de naissance) 

?> 
    <section class="list">
        <div class="max-width">
            <h2 class="list-title">Faites vérifier vos pièces pour plus de confiance; C'est parti !</h2>
            <div class="list-content">
                <div class="col-list1"></div>
                <div class="col-list2 complete-user">
                    <hr>
                    <div class="formulaire-info">
                        <div class="error-text error-name"></div>

                        <div class="piece identite">
                            <span>Pièce d'identité</span>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                        <div class="piece permis">
                            <span>Permis de conduire</span>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                        <div class="piece immat">
                            <span>Plaque d'immatriculation </span>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                        <div class="piece telephone">
                            <span>Numéro de téléphone</span>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                        <div class="piece adresse-phy">
                            <span>Adresse physique</span>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                        <div class="piece email">
                            <span>Email</span>
                            <span><i class="fa-solid fa-chevron-right"></i></span>
                        </div>
                        <small class="justificatif">* le justificatif d'adresse peut simplement être une facture du SNEL, Régideso ou encore tout autre document officiel..</small>
                    </div>
                </div>
                <div class="col-list3"></div>
            </div>
        </div>
    </section>

<?php
} else {
    header("Location:/form");
}

?>