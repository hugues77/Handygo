<?php

//droit d'accès - accès une fois connectés
if(!isset($_SESSION['unique_id']) AND ($_GET['user_id'] != $_SESSION['unique_id'])){
    header("Location:/form");
}


$title = "Je modifie ma réservation!";
require_once "layout/partials/topbar-2.php"; 

$ref_voy = $_GET['ref_voy'];   

$row2 = details_reservation($ref_voy, $_SESSION['unique_id'] ); //lier la table trip et reservation  
$rep = $row2->fetch(PDO::FETCH_ASSOC);

$prix_bag = $rep['Prix_bag'] ? $rep['Prix_bag'] : 0;
$user_id_voyageur = $rep['user_id'];  

$nb_bag = ($rep['nbre_bag'] < 10) ? '0'.$rep['nbre_bag'] : $rep['nbre_bag'];

//bagage reserve dans trip
$reslt = total_bagage_reservation($ref_voy); 

?>
<section class="trip"> 
    <div class="max-width">
        <h2 class="trip-title">Revérifiez les informations et modifier votre réservation !</h2>
        
        <div class="trip-content reservation">
            <div class="col-trip1"></div>
            <div class="col-trip2">
                <div class="error-text  error-text-reservation"></div>
                <h4 class=""><?= ucfirst(strftime("%A, le %d %B %Y",strtotime($rep['Date_depart']))) ?></h4>
                <div class="itineraire"> 
                    <div class="heure">
                        <p><?= date("H : i",(strtotime($rep['Heure_depart'])))?></p>
                        <p><?= date("H : i",(strtotime($rep['Heure_arrivee'])))?></p>
                    </div>
                    <div class="trajet">
                        <div class="trajet-user">
                            <p><?= ($rep['Depart']) ?></p>
                            <p><?= ($rep['Destination']) ?></p>
                        </div>
                        <div class="fleche">
                            <p><i class="fas fa-chevron-right"></i></p>
                            <p><i class="fas fa-chevron-right"></i></p>
                        </div>
                    </div>
                </div>
                <hr>
                <form  class="form-confirm upd">
                    <div class="prix-reservation ">
                        <!-- inputs en hidden -->
                        <input type="text" name="prixBag_kg_upd" value="<?= $prix_bag?>" hidden>
                        <input type="text" name="prixDoc_upd" value="<?= $prix_cr?>"  hidden>

                        <input type="text" name="user_id_voyageur" value="<?= $user_id_voyageur ?>" hidden>

                        <input type="text" name="trip_id_upd" value="<?= ($ref_voy) ?>" hidden>

                        <input type="text" name="bagage_reserver_upd" value="<?= $reslt['nbre_bag'] ?>" hidden>
                        <input type="text" name="bagage_dispo_upd" value="<?= $rep['Bagage_dispo'] ?>" hidden>
                        <input type="text" name="courrier_dispo_upd" value="<?= $rep['Courrier_dispo'] ?>" hidden>

                        <input type="text" name="b_reserver_initial" value="<?= $nb_bag?>" hidden>
                        
                        <div class="bagage">
                            <p class="<?= ($prix_bag == 0) ? 'btn-grise' : ''?>">Choisir le Nombre de places / personne souhaités</p>
                        </div>
                        <div class="confirm-prix">
                            <div class="nouveau_p field"> 
                                <div class="wrapper_prix <?= ($prix_bag == 0) ? 'btn-grise' : ''?>">
                                    <span class="minus_bag upd">-</span>
                                    <input type="text" name="qtyBox_bag_upd" id="qtyBox_bag_upd" value="<?=$nb_bag?>">
                                    <span class="plus_bag upd">+</span>  
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <hr> 
                    <div class="p-total">
                        <?= ($prix_bag > 0 ) ? '<p>Prix Total bagage : <b class="p-total-bag-upd">'.($rep['nbre_bag']*$prix_bag).'</b> €</p>' : '' ?>
                    </div>
                    <div class="description-res">
                        <label for="description-res">Indiquez une brève description pour votre réservation</label>
                        <textarea name="des-reservation_upd" id="description-res" cols="" rows="3" placeholder="Très important! ceci vous augmente la chance d'etre accepter par le voyageur. Ecrivez en qelques lignes le contenu du colis."><?= $rep['Description_res']?></textarea>
                    </div>
                    <div class="confirm">
                        <button class="btn-update-reservation">Confirmer la modification</button>
                    </div> 
                </form>
            </div> 
            <div class="col-trip3"></div> 
        </div>
    </div>
</section>
