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
            <h2 class="list-title">Faites vérifier vos pièces pour plus de confiance; C'est parti !</h2>
            <div class="list-content">
                <div class="col-list1"></div>
                <div class="col-list2">
                    <hr>
                    <div class="formulaire-info">
                        <form class="complete-user" enctype="multipart/form-data">
                            <div class="error-text error-name"></div>


                            <div class="field">
                                <select type="text" name="document-text" id="" placeholder="Choisir le document" class="">
                                    <option value="" selected>Selectionner un document</option>
                                    <option value="immatriculation">Immatriculation</option>
                                    <option value="image-vehicule">Photo du vehicule / moto</option>
                                    <option value="identite">Pièce d'identité</option>
                                    <option value="permis">Permis de conduire</option>
                                    <option value="j-adresse">Justificatif d'adresse</option>
                                </select>
                            </div>
                            <div class="field">
                                <input type="text" name="num_piece" placeholder="Indiquer le numéro de la pièce">
                            </div>
                            <div class="field image">
                                <!-- <input type="text" name="image" id="" placeholder="Choisir votre photo de profil " required> -->
                                <input type="file" name="document-user" id="file-user" hidden="hidden" accept=".pdf, .png, .jpg, .jpeg, .PDF, .PNG, .JPG, .JPEG">
                                <button class="custom-image"><i class="fas fa-camera-retro camera-retro"></i>Choisir votre document </button>
                                <span class="custom-text">Aucun fichier choisi pour l'instant</span>
                            </div>
                            <div class="field-user m-complete">

                                <div class="field m-field">
                                    <input type="submit" class="" value="annuler les modifications">
                                </div>
                                <div class="field">
                                    <input type="submit" class="" value="valider mes Informations">
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