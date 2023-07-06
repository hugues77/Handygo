<?php
$title = "Mon Profil public | Handy go";
//menu - Navbar
require_once "layout/partials/topbar-2.php";

    $user_id = $params['user_id'];
    //echo $user_id; 
    $chat = user_chat($user_id); 
    if($chat->rowCount() > 0){
        $row = $chat->fetch(PDO::FETCH_ASSOC);

        //show the old for user
        $naissance_year = date("Y", strtotime($row['Date_naissance']));
        $year = date("Y");
        $old = $year - $naissance_year;

    } ?>

    <section class="user">
        <div class="max-width">
            <div class="user-content">
                <div class="col-user1"></div>  
                <div class="col-user2">
                    <div class="user-img">
                        <img src="/images/users/<?=$row['Image']?>" alt="">
                        <h2 class="user-title"><?= $row['Prenom'] .' '. $row['Nom']?></h2>
                        <span class="user-age"><?= $old ?> ans</span>
                        <div class="barre"></div>
                    </div>
                    <p class="expert">Niveau d'expérience : Ambassadeur</p>
                    <small>Bonjour,
                        CPE de profession, je suis passionné de jeux de société (modernes !), de musique et de fantasy. Egalement très intéressé par les sciences, la philosophie, la politique, le sport, les séries TV, ...  
                        Au plaisir de vous rencontrer.
                    </small>
                    <a href="/avis">
                        <div class="avis">
                            <div class="note">
                                <small><i class="fas fa-star"></i>4,4 / 5 - 22 avis</small>
                            </div>
                            <div class="fleche">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                    <p><i class="far fa-comment-dots"></i>J'aime bien discuter quand je me sens à l'aise</p>
                    <hr>
                    <p><i class="fas fa-check-circle"></i>Pièce d'identité vérifiée</p>
                    <p><i class="fas fa-check-circle"></i>Permis de conduire vérifiée</p>
                    <p><i class="fas fa-check-circle"></i>Immatriculation véhicule vérifiée</p>
                    <p><i class="fas fa-check-circle"></i>Numéro de téléphone vérifié</p>
                    <p><i class="fas fa-check-circle"></i>E-mail vérifié</p>
                    <hr>
                    <p>11 trajets publiés</p>
                    <p>Membre depuis <?=strftime("%B %Y", strtotime($row['Date_inscription']))?></p>
                    <a class="" href="/report/report">
                        <div class="avis signaler-user">
                            <div class="note">
                                <small><i class="fas fa-skull-crossbones"></i>Signaler ce membre</small>
                            </div>
                            <div class="fleche">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                    <hr>
                    <p><?= $row['Prenom'] .' '. $row['Nom']?> est un membre non-professionnel.</p>
                </div>
                <div class="col-user3"></div>
            </div>
        </div>
    </section>