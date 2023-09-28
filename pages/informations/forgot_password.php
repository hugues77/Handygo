<?php
//droit d'accès - accès une fois connectés  
if (!isset($_SESSION['unique_id']) AND !isset($_SESSION['token_verify'])) {
    header("Location:/");
}
$title = "Changement mot de Passe!";
//menu - Navbar
require_once "layout/partials/topbar-2.php";

//ma date d'anniversaire (date de naissance) 

?>
<section class="list">
    <div class="max-width">
        <h2 class="list-title">Modifier votre mot de passe en toute tranquilité; C'est parti !</h2>
        <div class="list-content">
            <div class="col-list1"></div>
            <div class="col-list2">
                <hr>
                <div class="formulaire-info">
                    <form class="password">
                        <div class="error-text error-name"></div>
                        <?php if (isset($_SESSION['unique_id'])) : ?>
                            <div class="field">
                                <input type="password" name="password_actuel" id="" placeholder="Mot de passe Actuel" required>
                                <!-- <i class="fas fa-eye"></i> -->
                            </div>
                        <?php endif; ?>
                        <div class="field">
                            <input type="password" name="password_new" id="" placeholder="Nouveau Mot de passe" required>
                            <!-- <i class="fas fa-eye"></i> -->
                        </div>
                        <div class="field">
                            <input type="password" name="password_confirm_new" id="" placeholder="Confirmer Nouveau Mot de passe" required>
                            <!-- <i class="fas fa-eye"></i> -->
                        </div>

                        <div class="field">
                            <input type="submit" class="btn-password" name="confirm-password" id="" value="valider votre modification"> 
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-list3"></div>
        </div>
    </div>
</section>