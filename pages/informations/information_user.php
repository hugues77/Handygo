<?php
//droit d'accès - accès une fois connectés
if (isset($_SESSION['unique_id'])) {

    $title = "Bienvenue au PECEP, Amusez-vous bien !";
    //menu - Navbar
    require_once "layout/partials/topbar-2.php";

    //ma date d'anniversaire (date de naissance) 

?>
    <section class="list">
        <div class="max-width">
            <h2 class="list-title">Mise à jour mes informations personnelles; C'est parti !</h2>
            <div class="list-content">
                <div class="col-list1"></div>
                <div class="col-list2">
                    <hr>
                    <div class="formulaire-info">
                        <form class="info-user" enctype="multipart/form-data">
                            <div class="error-text error-name"></div>
                            <div class="field-user">
                                <div class="field m-field">
                                    <input type="text" placeholder="Prenom">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="Nom">
                                </div>
                            </div>
                            <div class="field-user">

                                <div class="field m-field">
                                    <input type="text" placeholder="sexe">
                                </div>
                                <div class="field">
                                    <input type="text" placeholder="date de naissance">
                                </div>
                            </div>
                            <div class="field-user"> 

                                <div class="field">
                                    <input type="text" placeholder="telephone">
                                </div>
                                <!-- <div class="field">
                                    <input type="text" placeholder="email">
                                </div> -->
                            </div>
                            <hr class="line-info">


                            <div class="field">
                                <textarea name="bio-user" class="textarea-complete" placeholder="Mini bio"></textarea>
                            </div>
                            <div class="field-user">

                                <div class="field button-complete m-field">
                                    <input type="submit" class="btn-complete" value="annuler les modifications">
                                </div>
                                <div class="field button-complete">
                                    <input type="submit" class="btn-complete" value="valider mes Informations">
                                </div>
                            </div>
                        </form>
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