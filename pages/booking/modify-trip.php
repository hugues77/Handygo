<?php

//droit d'accès - accès une fois connectés
if(!isset($_SESSION['unique_id']) AND ($_GET['user_id'] != $_SESSION['unique_id'])){
    header("Location:/form");
}


$title = "Je modifie mon trajet!";
require_once "layout/partials/topbar-2.php"; 

$ref_voy = $_GET['ref_voy'];   

$row2 = details_modify_trip($ref_voy, $_SESSION['unique_id'] ); //selectionner la table trip pour user
$rep = $row2->fetch(PDO::FETCH_ASSOC);

$prix_bag = $rep['Prix_bag'] ? $rep['Prix_bag'] : 0;
$prix_cr  = $rep['Prix_courrier'] ? $rep['Prix_courrier'] : 0;  

$nb_bag = ($rep['nbre_bag'] < 10) ? '0'.$rep['nbre_bag'] : $rep['nbre_bag'];
$nb_courr = ($rep['nbre_doc'] < 10) ? '0'.$rep['nbre_doc'] : $rep['nbre_doc'];

// $mod_voy = isset($rep['mode_voy']) ? 'checked' : 'unchecked';
$mod_voy = $rep['Mode_voy'];
//verify if booked trip
$response_booked = display_user_booked($ref_voy, $_SESSION['unique_id']);
$verify_booked = $response_booked->rowCount();

?>

<section class="trip"> 
    <div class="max-width">
        <h2 class="trip-title">Revérifiez les informations et modifier votre trajet !</h2>
        <div class="error-text  error-text-reservation"></div>
        <div class="trip-content modify-trip">
            <div class="col-trip1"></div>
            <div class="col-trip2">
                Bienvenue dans votre pannel de controle sur vos trajets, vous pouvez modifiez en tout moment les options du trajet, seulement une restriction s'impose lorsque il existe déjà des personnes qui ont réservés ce trajet. <br><br>
                <div class="form-modify-trip">
                    <div class="error-text error-post-trip"></div>
                    <form autocomplete="off" class="form-confirm">
                        <!-- inputs en hidden -->
                        <input type="text" name="ref_voy_upd" value="<?= $ref_voy ?>" hidden> 
                        <input type="text" name="bagage_dispo_mod" value="<?=$rep['Bagage_dispo']?>" hidden> 
                        <input type="text" name="bagage_reserve_mod" value="<?=$rep['Bagage_reserve']?>" hidden>  



                        
                        <div class="trip-itineraire <?= ($verify_booked > 0) ? 'trip-itineraire-visible': ''?>">

                            <div class="title-trip-1">
                                <div class="">Votre Itinéraire</div> 
                                <div class="">
                                    <i class="fas fa-circle-plus" id="on-1"></i><i class="fas fa-circle-minus off-1"></i>
                                </div>
                            </div>
                            <div class="body-trip-1">
                                <div class="field">
                                    <div class="label">Ville de départ</div>
                                    <input type="text" name="depart-voy-mod" class="" id="v-depart" placeholder=" " value="<?=($rep['Depart']) ?>" required> 
                                </div>
                                <div class="field">
                                    <div class="label">Ville d'arrivée</div>
                                    <input type="text" name="arrivee-voy-mod" class="input-1" id="v-arrive" placeholder=" " value="<?=($rep['Destination'])?>" required>
                                </div>
                                <div class="mode">
                                    <div class="title-mode">Mode de transport :</div>
                                    <div class="choix">
                                        <div class="av">
                                            <input type="radio" value="avion" name="mode-voy-mod" id="av" class="choix-3" <?=$mod_voy ==='avion' ? 'checked' : ''  ?>>
                                            <label for="av">Avion</label>
                                        </div>
                                        <div class="bus">
                                            <input type="radio" value="bus" name="mode-voy-mod" id="bus" class="choix-3" <?=$mod_voy ==='bus' ? 'checked' : ''  ?>>
                                            <label for="bus">Bus</label>
                                        </div> 
                                        <div class="v">
                                            <input type="radio" value="voiture" name="mode-voy-mod" id="v" class="choix-3" <?=$mod_voy ==='voiture' ? 'checked' : ''  ?>>
                                            <label for="v">Voiture</label>
                                        </div>
                                        <div class="b">
                                            <input type="radio" value="bateau" name="mode-voy-mod" id="b" class="choix-3" <?=$mod_voy ==='bateau' ? 'checked' : ''  ?>>
                                            <label for="b">Bateau</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field btns">
                                    <button class="prev-1 prev" onClick="cancelBtn()">Annuler</button>
                                    <button class="next-1 next button-2 btn-itineraire">Enregistrer</button>
                                </div>
                            </div>
                        </div>  
                        <div class="trip-date <?= ($verify_booked > 0) ? 'trip-date-visible': ''?>">
                            <div class="title-trip-2">
                                <div class="">Date du Voyage</div> 
                                <div class="">
                                    <i class="fas fa-circle-plus" id="on-2"></i><i class="fas fa-circle-minus off-2"></i>
                                </div>
                            </div>
                            <div class="body-trip-2">
                                <div class="field">
                                    <div class="label">Date de départ</div>
                                    <input type="text" id="date-depart" name="date-depart-mod" value="<?=$rep['Date_depart']?>" class="input-2">
                                </div>
                                <div class="field">
                                    <div class="label">Date d'arrivée</div>
                                    <input type="text" id="date-arrivee" name="date-arrivee-mod" value="<?=$rep['Date_arrivee']?>" class="input-2"> 
                                </div>
                                <div class="heure">
                                    <div class="field">
                                        <div class="label">Heure de départ</div>
                                        <input type="time" name="h-depart-mod" value="<?=$rep['Heure_depart']?>" class="input-2 depart">
                                    </div>
                                    <div class="field">
                                        <div class="label">Heure d'arrivée</div>
                                        <input type="time" name="h-arrivee-mod" value="<?=$rep['Heure_arrivee']?>" class="input-2">
                                    </div>
                                </div>
                                <div class="field btns">
                                    <button class="prev-1 prev" onClick="cancelBtn()" >Annuler</button>
                                    <button class="next-1 next button-2 btn-date">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                        

                        <div class="trip-bagage">
                            <div class="title-trip-3">
                                <div class="">Bagages Disponibles</div> 
                                <div class="">
                                    <i class="fas fa-circle-plus" id="on-3"></i><i class="fas fa-circle-minus off-3"></i>
                                </div>
                            </div>
                            <div class="body-trip-3"> 
                                <div class="field">
                                    <div class="label">Nombres de Kilos Disponibles (Kg)</div>
                                    <input type="number" name="bagage_mod" value="<?=$rep['Bagage_dispo']?>" class="input-3">
                                </div>
                                <div class="courrier">
                                    <div class="title-mode">Avez-vous prévu de ramenez aussi des documents ?</div>
                                    <div class="choix">
                                        <div class="av">
                                            <input type="radio" name="choix_c" id="choix_no" class="choix-3" checked>
                                            <label for="no">Non</label>
                                        </div>
                                        <div class="bus">
                                            <input type="radio" name="choix_c" id="choix_oui" class="choix-3">
                                            <label for="oui">Oui</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field document">
                                    <div class="label">Nombres des documents Disponibles</div>
                                    <input type="number" name="courrier_mod" value="<?=$rep['Courrier_dispo']?>" class="input-3">
                                </div>
                                <div class="cont_ts">
                                    <div class="label color_bag">Indiquer le format des Bagages souhaités:</div>

                                    <label for="ts">
                                        <input type="checkbox" name="taille_s_mod" value="<?=$rep['Taille_bag_s']?>" class="input-3" id="ts" <?= $rep['Taille_bag_s'] ? 'checked':''?>>
                                        <span>Taille S</span>
                                    </label>

                                    <label for="tm">
                                        <input type="checkbox" name="taille_m_mod" value="<?=$rep['Courrier_dispo']?>" class="input-3" id="tm" <?= $rep['Taille_bag_m'] ? 'checked':''?>>
                                        <span>Taille M</span>
                                    </label>

                                    <label for="tl">
                                        <input type="checkbox" name="taille_l_mod" value="<?=$rep['Taille_bag_l']?>" class="input-3" id="tl" <?= $rep['Taille_bag_l'] ? 'checked':''?>>
                                        <span>Taille L</span>
                                    </label>

                                    <label for="txl">
                                        <input type="checkbox" name="taille_xl_mod" value="<?=$rep['Taille_bag_xl']?>" class="input-3" id="txl" <?= $rep['Taille_bag_xl'] ? 'checked':''?>>
                                        <span>Taille XL</span>
                                    </label>

                                    <label for="txx">
                                        <input type="checkbox" name="taille_xxl_mod" value="<?=$rep['Taille_bag_xxl']?>" class="input-3" id="txx" <?= $rep['Taille_bag_xxl'] ? 'checked':''?>>
                                        <span>Taille XXL</span>
                                    </label>

                                </div>
                                <div class="bagage_w">
                                    <div class="label color_bag">Préciser en texte le format des Bagages souhaités:</div>
                                    <textarea name="descrip-bagage-mod" value="<?=$rep['Descrip_bagage']?>" id="" cols="30" rows="10" class="input-3"></textarea>
                                </div>
                                <div class="field_t format_t">
                                    <div class="label"><a href="#">Je préfères indiquer le format de bagage en texte !</a></div>
                                </div>
                                <div class="field_t format_b">
                                    <div class="label"><a href="#">Je préfères choisir le format de bagage par taille!</a></div>
                                </div>
                                <div class="field btns">
                                    <button class="prev-2 prev" onClick="cancelBtn()">Annuler</button>
                                    <button class="next-2 next button-3 btn-bagage">Enregistrer</button>
                                </div>
                            </div>
                        </div>

                        <div class="trip-paiement">
                            <div class="title-trip-4">
                                <div class="">Proposer les paiements</div> 
                                <div class="">
                                    <i class="fas fa-circle-plus" id="on-4"></i><i class="fas fa-circle-minus off-4"></i>
                                </div>
                            </div>
                            <div class="body-trip-4">
                                <div class="nouveau_p field">
                                    <div class="label">Modifier le Prix / bagage (Kg) en  €</div>

                                    <div class="wrapper_prix">
                                        <span class="m_minus minus">-</span>
                                        <input type="text" name="prix_bag_mod" id="m_qtyBox" readonly="" value="<?=$prix_bag ?>">
                                        <span class="m_plus plus">+</span>
                                    </div>
                                </div>
                                <div class="nouveau_p prix_cr field">
                                    <div class="label">Modifier le Prix / Courrier en  €</div>

                                    <div class="wrapper_prix">
                                        <span class="minus2">-</span>
                                        <input type="text" name="prix_courr_mod" id="qtyBox2" readonly="" value="<?=$prix_cr?>">
                                        <span class="plus2">+</span>
                                    </div>
                                </div>
                                <p class="nouveau_p">En modifiant les prix, n'oubliez pas que Tinda Colis à été crée pour aider la communauté dans les partages des colis.</p>
                                <div class="field btns">
                                    <button class="prev-3 prev" onClick="cancelBtn()">Annuler</button>
                                    <button class="next-3 next button-4 btn-paiement">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="trip-confirm">
                            <div class="title-trip-5">
                                <div class="">informations complémentaires</div> 
                                <div class="">
                                    <i class="fas fa-circle-plus" id="on-5"></i><i class="fas fa-circle-minus off-5"></i>
                                </div>
                            </div>
                            <div class="body-trip-5">
                                <div class="field">
                                    <div class="label">Votre téléphone</div>
                                    <input type="number" name="tel-user-mod" value="<?=$rep['Tel2']?>" class="input-5">
                                </div>
                                <div class="descrip-voy">
                                    <div class="label">Description du voyage</div>
                                    <textarea  maxlength="500" name="descrip-trajet-mod" placeholder="Message facultatif" onkeyup="countLettersMod();"><?=$rep['Description_trip']?></textarea>
                                </div>
                                <p class="p-count">Nombre de caractères : <span class="count">0</span>/500</p>

                                <div class="confirm-voy">
                                    <div class="title-conf">Avez-vous prévu de rencontrer vos clients à l'aeroport dès votre arrivée / départ ?</div>
                                    <div class="choix-conf">
                                        <div class="rdv">
                                            <input type="radio" name="choix_aero" id="oui-voy-mod" class="choix-aero" checked>
                                            <label for="oui-voy">Oui</label>
                                        </div>
                                        <div class="aero">
                                            <input type="radio" name="choix_aero" id="no-voy-mod" class="choix-aero">
                                            <label for="no-voy">Non</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="field adresse-voy">
                                    <div class="label">Indiquer l'adresse Complète du rendez-vous !</div>
                                    <input type="text" name="adresse-rdv-mod" value="<?=$rep['Adresse_trip']?>" class="input-5" votre adresse complète>
                                </div>
                                <div class="field btns btn-confirm">
                                    <button class="prev-4 prev" onClick="cancelBtn()">Annuler</button>
                                    <button type="submit" name="confirm" class="submit next button-5 btn-confirmation">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-trip3"></div>
        </div>
    </div>
</section>
