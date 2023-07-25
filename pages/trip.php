<?php
// $title = "Trajet Metz - Paris";
//menu - Navbar
require_once "layout/partials/topbar-2.php";
$ref_voy = $params['voy_id'];
$row = details_trip($ref_voy);
$res = $row->fetch(PDO::FETCH_ASSOC); 
$title_depart = strstr($res['Destination'], ',', true);
$title = "Trajet - ".$title_depart;

//create complete URL
$lagguge = str_repeat(str_shuffle($title_depart.'123456789'),5);

// display different customers who have booked this trip
$user_voyageur = $res['Unique_ID']; //selectionne user voyageur, celui qui a publier le trajet
$trip_booked = display_user_booked($ref_voy, $user_voyageur);
$response_display = $trip_booked->fetchAll(PDO::FETCH_ASSOC);

// verify if user has reserved the trip
$verify = verify_user_booked($_SESSION['unique_id'], $ref_voy);

if(!$res){
    header("Location:/");
}else{ ?>

    <section class="trip">
        <div class="max-width">
            <h2 class="trip-title"><?= ucfirst(strftime("%A, le %d %B %Y",strtotime($res['Date_depart']))) ?></h2>
            <div class="trip-content">
                <div class="col-trip1"></div>
                <div class="col-trip2">
                    <div class="itineraire">
                        <div class="heure">
                            <p><?= date("H : i",(strtotime($res['Heure_depart'])))?></p>
                            <p><?= date("H : i",(strtotime($res['Heure_arrivee'])))?></p>
                        </div>
                        <div class="trajet">
                            <div class="trajet-user">
                                <p><?= $res['Depart'] ?></p>
                                <p><?= $res['Destination'] ?></p>
                            </div>
                            <div class="fleche">
                                <p><i class="fas fa-chevron-right"></i></p>
                                <p><i class="fas fa-chevron-right"></i></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="prix">
                        <div class="courrier">
                            <?=$res['Prix_bag'] ? "<p>Prix total pour 1 Place : ". $res['Prix_bag']." CDF</p>" : ''?>
                        </div>
                    </div>
                    <hr>
                    <!-- description du trajet -->
                    <div class="description-trajet">
                     <?=$res['Description_trip'] ? "<p>".(nl2br($res['Description_trip']))."</p>" : "" ?>
                    </div>
                    <a href="/user/<?=$res['Unique_ID'] ?>">
                        <div class="prix profil">
                            <div class="auteur">
                                <p><?= ucwords($res['Prenom'] .' '. $res['Nom']) ?></p>
                                <small><i class="fas fa-star"></i>4,4 / 5 - 22 avis</small>
                            </div>
                            <div class="colis auteur">
                                <img src="../images/users/<?=$res['Image'] ?>" alt="">      
                            </div>
                        </div>
                    </a>
                    <a href="/messages/chat/<?= $res['Unique_ID']?>">
                        <p class="contact"><i class="far fa-comments"></i>Contactez <?=$res['Prenom'] .' '. $res['Nom'] ?></p>
                    </a>
                    <hr>
                    <div class="details">
                        <p><i class="fas fa-exclamation-triangle"></i>Je ne tolère pas du retard</p>
                        <p><i class="fas fa-cube"></i>Je ne peux prendre que 3 Personnes</p>
                        <p><i class="fas fa-bolt"></i>Acceptation automatique</p>
                    </div>
                    <hr>
                    <div class="prix profil">
                        <div class="auteur">
                            <p>Mode de Voyage</p>
                            <small><?= ucwords($res['Mode_voy']) ?></small>
                        </div>
                        <div class="colis auteur">
                            <?php
                                if($res['Mode_voy'] == 'voiture'){
                                    echo '
                                    <img src="../images/car.png" alt="" style = transform:scaleX(-1)>
                                    <i class="fas fa-chevron-right"></i>
                                    ';
                                }elseif($res['Mode_voy'] == 'taxi'){
                                    echo '
                                    <img src="../images/taxi.jpg" alt="">
                                    <i class="fas fa-chevron-right"></i>
                                    ';
                                }elseif($res['Mode_voy'] == 'bus'){
                                    echo '
                                    <img src="../images/bus.png" alt="" style = transform:scaleX(-1)>
                                    <i class="fas fa-chevron-right"></i>
                                    ';
                                }else{
                                    echo '
                                    <img src="../images/moto.jpg" alt="">
                                    <i class="fas fa-chevron-right"></i>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                    
                    <!-- Booking a afficher si seulement le trajet a été reserv& par un ou +sieurs clients -->
                    <?= $response_display ? "<h2>Booking</h2>" : "" ?>
                    <div class="booking">
                        <?php
                            foreach($response_display as $resp): 
                        ?>
                            <a href="/user/<?=$resp['unique_id']?>">
                                <div class="profil">
                                    <p class="name-user"><?=$resp['prenom'].' '.$resp['nom'] ?> </p>
                                    <div class="user-img">
                                        <img src="../images/users/<?=$resp['image']?>" alt="<?=$resp['prenom']?>">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </a>
                        <?php 
                            endforeach;
                         ?>
                    </div>
                     
                    
                    <?php if(!isset($_SESSION['unique_id'])) : ?>
                            
                        <div class="confirm">
                            <a href="/booking/book-luggage?<?= ($res['Destination']) ?>=<?=$lagguge?>&ref_voy=<?=($res['Ref_voy'])?>">Continuer</a>
                        </div>
                    <?php else : ?>
                        <?php if($_SESSION['unique_id'] == $res['Unique_ID'] ): ?>
                            <div class="confirm">
                                <a href="/booking/modify-trip?<?= ($res['Destination']) ?>=<?=$lagguge?>&ref_voy=<?=($res['Ref_voy'])?>&user_id=<?=$_SESSION['unique_id']?>">Modifier mon trajet</a>
                            </div>
                        <?php elseif($verify > 0) :?>
                            <div class="confirm">
                                <a href="/booking/modify-booking?<?= ($res['Destination']) ?>=<?=$lagguge?>&ref_voy=<?=($res['Ref_voy'])?>&user_id=<?=$_SESSION['unique_id']?>">Modifier ma réservation</a>
                            </div>
                        <?php else :?>
                            <div class="confirm">
                                <a href="/booking/book-luggage?<?= ($res['Destination']) ?>=<?=$lagguge?>&ref_voy=<?=($res['Ref_voy'])?>">Continuer</a>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
        
                </div>
                <div class="col-trip3"></div> 
            </div>
        </div>
    </section>
<?php
    }
?>

