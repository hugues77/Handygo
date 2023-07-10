<?php

$title = "Je réserves mes bagages et Courriers";
require_once "layout/partials/topbar-2.php"; 

$ref_voy = $_GET['ref_voy'];  

$row = details_trip($ref_voy);
$res = $row->fetch(PDO::FETCH_ASSOC);  

$prix_bag = $res['Prix_bag'] ? $res['Prix_bag'] : 0;
$prix_cr  = $res['Prix_courrier'] ? $res['Prix_courrier'] : 0; 

$ID_user_voyageur = $res['Unique_ID'];  

//bagage reserve dans trip
$reslt = total_bagage_reservation($ref_voy);

$reslt_bag = $reslt['nbre_bag'] ? $reslt['nbre_bag'] : 0;
//droit d'accès - accès une fois connectés
if(!isset($_SESSION['unique_id'])){
    header("Location:/form");
}elseif($_SESSION['unique_id'] == $ID_user_voyageur){
//Empecher le client de reserver dans son propre trajet
    header("Location:/trip/".$ref_voy);
}
?>
<section class="trip"> 
    <div class="max-width">
        <h2 class="trip-title">Vérifiez les informations et réservez !</h2>
        <div class="trip-content reservation">
            <div class="col-trip1"></div>
            <div class="col-trip2">
                <div class="error-text  error-text-reservation"></div>
                <h4 class=""><?= ucfirst(strftime("%A, le %d %B %Y",strtotime($res['Date_depart']))) ?></h4>
                <div class="itineraire">
                    <div class="heure">
                        <p><?= date("H : i",(strtotime($res['Heure_depart'])))?></p>
                        <p><?= date("H : i",(strtotime($res['Heure_arrivee'])))?></p>
                    </div>
                    <div class="trajet">
                        <div class="trajet-user">
                            <p><?= ($res['Depart']) ?></p>
                            <p><?= ($res['Destination']) ?></p>
                        </div>
                        <div class="fleche">
                            <p><i class="fas fa-chevron-right"></i></p>
                            <p><i class="fas fa-chevron-right"></i></p>
                        </div>
                    </div>
                </div>
                <hr>
                <form  class="form-confirm">
                    <div class="prix-reservation ">
                        <div class="bagage">
                            <p class="<?= ($prix_bag == 0) ? 'btn-grise' : ''?>">Choisir le Nombre de places / personne souhaités</p>
                        </div>
                        <div class="confirm-prix">
                            <div class="nouveau_p field"> 

                                <input type="text" name="prixBag_kg" value="<?= $prix_bag?>" hidden> 

                                <input type="text" name="user_id_voyageur" value="<?= $ID_user_voyageur ?>" hidden>

                                <input type="text" name="trip_id" value="<?= ($ref_voy) ?>" hidden>

                                <input type="text" name="bagage_dispo" value="<?= $res['Bagage_dispo'] ?>" hidden>

                                <input type="text" name="bagage_reserver" value="<?= $reslt_bag?>" hidden>

                                <input type="text" name="courrier_dispo" value="<?= $res['Courrier_dispo'] ?>" hidden>

                                <div class="wrapper_prix <?= ($prix_bag == 0) ? 'btn-grise' : ''?>">
                                    <span class="minus_bag">-</span>
                                    <input type="text" name="qtyBox_bag_confirm" id="qtyBox_bag" value="0">
                                    <span class="plus_bag">+</span> 
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                    <hr>
                    <div class="p-total">
                        <?= ($prix_bag > 0) ? '<p>Prix Total bagage : <b class="p-total-bag">0</b> €</p>' : '' ?>
                    </div>
                    <div class="description-res">
                        <label for="description-res">Indiquez une brève description pour votre réservation</label>
                        <textarea name="des-reservation" id="description-res" cols="" rows="3" placeholder="Très important! ceci vous augmente la chance d'etre accepter par le voyageur. Ecrivez en qelques lignes le contenu du colis."></textarea>
                    </div>
                    <div class="confirm">
                        <button class="btn-reservation">Réserver</button> 
                    </div>
                </form>
            </div>
            <div class="col-trip3"></div>
        </div>
    </div>
</section>

<!-- requete pour trip actuel -->
<!-- select bagage_dispo, bagage_reserve from trip where date_depart >= CURDATE(); -->