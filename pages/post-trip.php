<?php
$title = "Proposer un Trajet | Tinda Colis";
//menu - Navbar
require_once "layout/partials/topbar-2.php";
?>

<div class="post-trip">
    <div class="post-trip-left">
        <div class="post-content">
            <div class="container">
                <header>Poster mon trajet</header>
                <div class="progress-bar">
                    <div class="step">
                        <p>Itinéraire</p>
                        <div class="bullet">
                            <span>1</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Dates</p>
                        <div class="bullet">
                            <span>2</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Bagages</p>
                        <div class="bullet">
                            <span>3</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Paiements</p>
                        <div class="bullet">
                            <span>4</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Confirmation</p>
                        <div class="bullet">
                            <span>5</span>
                        </div>
                        <div class="check fas fa-check"></div>
                    </div>
                </div>
                <div class="form-outer">
                    <div class="error-text error-post-trip"></div>
                    <form autocomplete="off">
                        <div class="page slidepage itineraire">
                            <div class="title1">Votre Itinéraire :</div>
                            <div class="field">
                                <div class="label">Ville de départ</div>
                                <input type="text" name="depart-voy" class="input-1" id="v-depart" placeholder=" " required>
                            </div>

                            <div class="field">
                                <div class="label">Ville d'arrivée</div>
                                <input type="text" name="Destination-voy" class="input-1" id="v-arrive" placeholder=" " required>
                            </div>
                            <div class="mode">
                                <div class="title-mode">Mode de transport :</div>
                                <div class="choix">
                                    <div class="av">
                                        <input type="radio" value="avion" name="mode-voy" id="av" class="choix-3" checked>
                                        <label for="av">Avion</label>
                                    </div>
                                    <div class="bus">
                                        <input type="radio" value="bus" name="mode-voy" id="bus" class="choix-3">
                                        <label for="bus">Bus</label>
                                    </div>
                                    <div class="v">
                                        <input type="radio" value="voiture" name="mode-voy" id="v" class="choix-3">
                                        <label for="v">Voiture</label>
                                    </div>
                                    <div class="b">
                                        <input type="radio" value="bateau" name="mode-voy" id="b" class="choix-3">
                                        <label for="b">Bateau</label>
                                    </div>
                                </div>
                            </div>

                            <div class="field nextBtn">
                                <button class="button-1">Suivant</button>
                            </div>
                        </div>

                        <div class="page date">
                            <div class="title1">Date de Voyage : </div>
                            <div class="field">
                                <div class="label">Date de départ</div>
                                <input type="text" id="date-depart" name="date-depart" class="input-2">
                            </div>
                            <div class="field">
                                <div class="label">Date d'arrivée</div>
                                <input type="text" id="date-arrivee" name="date-arrivee" class="input-2">
                            </div>
                            <div class="heure">
                                <div class="field">
                                    <div class="label">Heure de départ</div>
                                    <input type="time" name="h-depart" class="input-2 depart">
                                </div>
                                <div class="field">
                                    <div class="label">Heure d'arrivée</div>
                                    <input type="time" name="h-arrivee" class="input-2">
                                </div>
                            </div>
                            <div class="field btns">
                                <button class="prev-1 prev">Précédent</button>
                                <button class="next-1 next button-2">Suivant</button>
                            </div>
                        </div>

                        <div class="page bagage">
                            <div class="title1">Places Disponibles</div>
                            <div class="field">
                                <div class="label">Nombres de place Disponibles (Kg)</div>
                                <input type="number" name="bagage" class="input-3">
                            </div>
                            <div class="courrier">
                                <div class="title-mode">Avez-vous prévu de ramenez aussi des documents ?</div>
                                <div class="choix">
                                    <div class="av">
                                        <input type="radio" name="choix_c" id="no" class="choix-3" checked>
                                        <label for="no">Non</label>
                                    </div>
                                    <div class="bus">
                                        <input type="radio" name="choix_c" id="oui" class="choix-3">
                                        <label for="oui">Oui</label>
                                    </div>
                                </div>
                            </div>

                            <div class="field document">
                                <div class="label">Nombres des documents Disponibles</div>
                                <input type="number" name="courrier" class="input-3">
                            </div>
                            <div class="cont_ts">
                                <div class="label color_bag">Indiquer le format des Bagages souhaités:</div>

                                <label for="ts">
                                    <input type="checkbox" name="taille_s" class="input-3" id="ts">
                                    <span>Taille S</span>
                                </label>

                                <label for="tm">
                                    <input type="checkbox" name="taille_m" class="input-3" id="tm">
                                    <span>Taille M</span>
                                </label>

                                <label for="tl">
                                    <input type="checkbox" name="taille_l" class="input-3" id="tl">
                                    <span>Taille L</span>
                                </label>

                                <label for="txl">
                                    <input type="checkbox" name="taille_xl" class="input-3" id="txl">
                                    <span>Taille XL</span>
                                </label>

                                <label for="txx">
                                    <input type="checkbox" name="taille_xxl" class="input-3" id="txx">
                                    <span>Taille XXL</span>
                                </label>

                            </div>
                            <div class="bagage_w">
                                <div class="label color_bag">Préciser en texte le format des Bagages souhaités:</div>
                                <textarea name="descrip-bagage" id="" cols="30" rows="10" class="input-3"></textarea>
                            </div>
                            <div class="field_t format_t">
                                <div class="label"><a href="#">Je préfères indiquer le format de bagage en texte !</a></div>
                            </div>
                            <div class="field_t format_b">
                                <div class="label"><a href="#">Je préfères choisir le format de bagage par taille!</a></div>
                            </div>
                            <div class="field btns">
                                <button class="prev-2 prev">Précédent</button>
                                <button class="next-2 next button-3">Suivant</button>
                            </div>
                        </div>

                        <div class="page paiement">
                            <div class="title1">Proposer les paiements</div>
                            <div class="heure ancien_p">
                                <div class="field">
                                    <div class="label">Prix Récommandé Bagages / Kg</div>
                                    <input type="number" name="prix_bag" class="input-4 depart" value=10>
                                </div>
                                <div class="field">
                                    <div class="label">Prix Récommandé Courrier</div>
                                    <input type="number" name="prix_courr" class="input-4" value=10>
                                </div>
                            </div>
                            <div class="nouveau_p field">
                                <div class="label">Modifier le Prix / bagage (Kg)</div>

                                <div class="wrapper_prix">
                                    <span class="minus">-</span>
                                    <input type="text" name="qtyBox" id="qtyBox" readonly="" value="0">
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            <div class="nouveau_p prix_cr field">
                                <div class="label">Modifier le Prix / Courrier</div>

                                <div class="wrapper_prix">
                                    <span class="minus2">-</span>
                                    <input type="text" name="qtyBox2" id="qtyBox2" readonly="" value="0">
                                    <span class="plus2">+</span>
                                </div>
                            </div>
                            <p class="ancien_p">si vous n'etes pas d'accord avec le prix proposés, cliquer sur le bouton puis modifier. sinon passer a l'étape suivante.</p>
                            <p class="nouveau_p">En modifiant les prix, n'oubliez pas que Tinda Colis à été crée pour aider la communauté dans les partages des colis.</p>

                            <div class="field">
                                <button class="prix">Non, il faut que je modifie ce montant</button>
                            </div>
                            <div class="field btns">
                                <button class="prev-3 prev">Précédent</button>
                                <button class="next-3 next button-4">Suivant</button>
                            </div>
                        </div>

                        <div class="page confirmation">
                            <div class="title1"> informations complémentaires</div>
                            <div class="field">
                                <div class="label">Votre téléphone</div>
                                <input type="number" name="tel-user" class="input-5">
                            </div>
                            <div class="descrip-voy">
                                <div class="label">Description du voyage</div>
                                <textarea maxlength="500" name="descrip-trajet" placeholder="Message facultatif" onkeyup="countLetters();"></textarea>
                            </div>
                            <p class="p-count">Nombre de caractères : <span class="count">0</span>/500</p>

                            <div class="confirm-voy">
                                <div class="title-conf">Avez-vous prévu de rencontrer vos clients à l'aeroport dès votre arrivée / départ ?</div>
                                <div class="choix-conf">
                                    <div class="rdv">
                                        <input type="radio" name="choix_aero" id="oui-voy" class="choix-aero" checked>
                                        <label for="oui-voy">Oui</label>
                                    </div>
                                    <div class="aero">
                                        <input type="radio" name="choix_aero" id="no-voy" class="choix-aero">
                                        <label for="no-voy">Non</label>
                                    </div>
                                </div>
                            </div>
                            <div class="field adresse-voy">
                                <div class="label">Indiquer l'adresse Complète du rendez-vous !</div>
                                <input type="text" name="adresse-rdv" class="input-5" votre adresse complète>
                            </div>
                            <div class="field btns btn-confirm">
                                <button class="prev-4 prev">Précédent</button>
                                <button type="submit" name="confirm" class="submit next button-5">Confirmer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="post-trip-right">
        <div class="post-content-right">
            <div class="container">
                <header>Mes Informations du voyage</header>
                <?php
                $user = user_chat($_SESSION['unique_id']);
                if ($user->rowCount() > 0) {
                    $row = $user->fetch(PDO::FETCH_ASSOC);
                }
                if (isset($_SESSION['unique_id'])) {
                    // Verify the old, show old are you
                    $year = date("Y");
                    $naissance = $row['Date_naissance'];
                    $naissance_year = date("Y", strtotime($naissance));
                    // calcul de l'age
                    $old = ($year - $naissance);
                ?>
                    <div class="get-info-1">
                        <div class="head">
                            <div class="title">
                                <img src="images/users/<?= $row['Image'] ?>" alt="">
                                <div class="name">
                                    <span><?= $row['Prenom'] . " " . $row['Nom'] ?></span><br>
                                    <span><?= $old ?> Ans (<?= $row['Sexe'] ?>)</span>
                                </div>
                            </div>
                            <div class="mel">
                                <span><i class="fas fa-envelope"></i><?= $row['Email'] ?></span><br>
                                <span><i class="fas fa-phone-flip"></i><?= $row['Tel1'] ? $row["Tel1"] : 'Ajouter votre téléphone' ?></span>
                            </div>
                        </div>
                        <hr>
                    </div>
                <?php
                }
                ?>
                <div class="get-info-2">
                    <div class="timeline">
                        <div class="timeline-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>