<?php
//droit d'accès - accès une fois connectés
if (isset($_SESSION['unique_id'])) {

    $title = "Bienvenue au HandyGo, Amusez-vous bien !";
    //menu - Navbar
    require_once "layout/partials/topbar-2.php";

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

                        <div class="accordion-menu">
                            <div class="link">
                                <div class="dropdown">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    <span>Pièce d'identité</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>

                                <div class="submenuItems">

                                    <div class="error-text error"></div>
                                    <!-- <div class="header-menu"> -->
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <h3>Envoie Identité pour vérification </h3>
                                        <h4>Maximisez vos chances sur Handygo ? Envoie protegé!</h4>
                                    <!-- </div> -->
                                    <form method="post" class="form-complete-user" enctype="multipart/form-data">
                                        <div class="field">
                                            <input type="text" name="" placeholder="Numéro Pièce identité" id="">
                                        </div>
                                        <div class="field">
                                            <input type="file" name="image-file" id="file-user" hidden="hidden">
                                            <button class="custom-image"><i class="fas fa-camera-retro camera-retro"></i>Choisir votre Identité</button>
                                            <span class="custom-text">Aucun fichier choisi pour l'instant</span>
                                        </div>
                                        <div class="buttons">
                                            <div class="btn-fermer">Fermer</div>
                                            <div class="btn-envoyer">Envoyer</div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="link">
                                <div class="dropdown">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    <span>Permis de conduire</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>

                                <div class="submenuItems">

                                    <div class="error-text error"></div>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <h3>Envoie Permis de Conduire pour vérification </h3>
                                    <h4>Maximisez vos chances sur Handygo ? Envoie protegé!</h4>
                                    <form method="post" class="form-complete-user" enctype="multipart/form-data">
                                        <div class="field">
                                            <input type="text" name="" placeholder="Numéro nationale de votre permis" id="">
                                        </div>
                                        <div class="field">
                                            <input type="file" name="image-file" id="file-user" hidden="hidden">
                                            <button class="custom-image"><i class="fas fa-camera-retro camera-retro"></i>Choisir votre Permis</button>
                                            <span class="custom-text">Aucun fichier choisi pour l'instant</span>
                                        </div>
                                        <div class="buttons">
                                            <div class="btn-fermer">Fermer</div>
                                            <div class="btn-envoyer">Envoyer</div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="link">
                                <div class="dropdown">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    <span>Carte rose du vehicule / Moto</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>

                                <div class="submenuItems">

                                    <div class="error-text error"></div>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <h3>Faites savoir à vos passagers que votre véhicule est identifié </h3>
                                    <h4>Maximisez vos chances sur Handygo ? Envoie protegé!</h4>
                                    <form method="post" class="form-complete-user" enctype="multipart/form-data">
                                        <div class="field">
                                            <input type="text" name="" placeholder="Numéro de la pièce" id="">
                                        </div>
                                        <div class="field">
                                            <input type="file" name="image-file" id="file-user" hidden="hidden">
                                            <button class="custom-image"><i class="fas fa-camera-retro camera-retro"></i>Choisir votre Carte rose</button>
                                            <span class="custom-text">Aucun fichier choisi pour l'instant</span>
                                        </div>
                                        <div class="buttons">
                                            <div class="btn-fermer">Fermer</div>
                                            <div class="btn-envoyer">Envoyer</div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="link">
                                <div class="dropdown">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    <span>Confirmer votre email</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>

                                <div class="submenuItems">

                                    <div class="error-text error"></div>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <h3> vérification de l'e-mail </h3>
                                    <h4>Maximisez vos chances sur Handygo ? Envoie protegé!</h4>
                                    <form method="post" class="form-complete-user" enctype="multipart/form-data">
                                        <div class="field">
                                            <input type="text" name="" placeholder="votre email ici" id="">
                                        </div>
                                        <div class="buttons">
                                            <div class="btn-fermer">Fermer</div>
                                            <div class="btn-envoyer">Envoyer</div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="link">
                                <div class="dropdown">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    <span>Faire valider votre numéro de téléphone</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>

                                <div class="submenuItems">

                                    <div class="error-text error"></div>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <h3> vérification de numéro de téléphone </h3>
                                    <h4>Maximisez vos chances sur Handygo ? Envoie protegé!</h4>
                                    <form method="post" class="form-complete-user" enctype="multipart/form-data">
                                        <div class="field">
                                            <input type="text" name="" placeholder="votre téléphone ici" id="">
                                        </div>
                                        <div class="buttons">
                                            <div class="btn-fermer">Fermer</div>
                                            <div class="btn-envoyer">Envoyer</div>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                        <!-- 
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
                        </div> -->
                        <small class="justificatif">* le justificatif d'adresse peut simplement être une facture du SNEL, Régideso ou encore tout autre document officiel..</small>
                    </div>
                </div>
                <div class="col-list3"></div>
            </div>
        </div>
    </section>


    </section>

<?php
} else {
    header("Location:/form");
}

?>