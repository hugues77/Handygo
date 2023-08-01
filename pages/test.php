<?php
//selectionne voyage
$row_trip = details_trip($row['Ref_voy']);
$res = $row_trip->fetch(PDO::FETCH_ASSOC);

// display different customers who have booked this trip
$user_voyageur = $res['Unique_ID']; //selectionne user voyageur, celui qui a publier le trajet - table trip
$trip_booked = display_user_booked($row['Ref_voy'], $user_voyageur);
$response_display = $trip_booked->fetchAll(PDO::FETCH_ASSOC);

if ($_SESSION['unique_id'] == $res['Unique_ID']) {
    $req = show_trip();

    if ($req->rowCount() > 0) {
        $rows = $req->fetchAll(PDO::FETCH_ASSOC);




        foreach ($rows as $row) :
            $voy_id = $row['Ref_voy']; ?>

            <div class="card1  <?= (($row['nb_place']) == ($row['place_reserve'])) ? 'grise-card' : '' ?>">
                <a href="<?= $router->generate("trip", ["voy_id" => $voy_id]) ?>">
                    <div class="box">
                        <div class="voyage">
                            <div class="heure">
                                <div><?= date("H:i", strtotime($row['Heure_depart'])) ?></div>
                                <small><?= date("d/m/Y", strtotime($row['Date_depart'])) ?></small>

                                <div class="margheur"><?= date("H:i", strtotime($row['Heure_arrivee'])) ?></div>
                                <small><?= date("d/m/Y", strtotime($row['Date_depart'])) ?></small>

                            </div>
                            <div class="direction">
                                <div class="direction-ville">
                                    <p><?= substr(($row['Depart']), 0, 35) ?></p>
                                    <p class="heurret"><?= substr(($row['Destination']), 0, 35) ?></p>
                                </div>
                            </div>

                            <div class="prix">
                                <?= $row['Prix_bag'] ? '<p><i class="fa fa-bolt-lightning"></i>' . $row['Prix_bag'] . ' CDF / Pl</p>' : '' ?>

                            </div>
                        </div>
                        <hr>
                        <div class="voyageur">
                            <div class="profil-voy">
                                <?= $row['Image'] != 'image.png' ? '<img src="../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?>
                                <span><?= ucwords($row['Prenom'] . ' ' . $row['Nom']) ?></span>
                                <span class="note"><i class="fas fa-star"></i>5.0</span>
                            </div>
                            <div class="transp">
                                <?php
                                if ($row['Mode_voy'] == 'voiture') {
                                    echo '
                                                            <i class="fas fa-car"></i>
                                                            ';
                                } elseif ($row['Mode_voy'] == 'taxi') {
                                    echo '
                                                            <i class="fas fa-car"></i>
                                                            ';
                                } elseif ($row['Mode_voy'] == 'bus') {
                                    echo '
                                                            <i class="fas fa-bus"></i>
                                                            ';
                                } else {
                                    echo '
                                                            <i class="fas fa-motorcycle"></i>
                                                            ';
                                }
                                ?>
                            </div>
                            <span class="bio">J'aime ceux qui m'aime !</span>
                        </div>
                    </div>
                </a>
            </div>
            <?= $response_display ? "<h2>Booking</h2>" : "" ?>
            <div class="booking user-reservation">
                <?php
                foreach ($response_display as $resp) :
                ?>
                    <a href="/user/<?= $resp['unique_id'] ?>">
                        <div class="profil">
                            <p class="name-user"><?= $resp['prenom'] . ' ' . $resp['nom'] ?> </p>
                            <div class="user-img">
                                <?= $resp['Image'] != 'image.png' ? '<img src="../images/users/' . $resp['User_time'] . '/' . $resp['Image'] . ' " alt=" ' . $resp['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $resp['Prenom'] . '">' ?>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                <?php
                endforeach;
                ?>
            </div>
            <div class="trajet-oui">
                <div><a href="/">
                        <div class="btn btn-voir"><i class="fas fa-plus"></i> Annuler Trajet directement</div>
                    </a></div>
                <div><a href="/booking/modify-trip?<?= ($row['Destination']) ?>=<?= $lagguge ?>&ref_voy=<?= $row['Ref_voy'] ?>&user_id=<?= $_SESSION['unique_id'] ?>">
                        <div class="btn btn-pub"><i class="fas fa-folder-open"></i> Modifier mon trajet rapidement</div>
                    </a></div>
            </div>
            <hr class="trj">
    <?php endforeach;
    }
} else {
    ?>
    <p class="trajet-aucun"><i class="fa-solid fa-triangle-exclamation"></i><br>Aucun trajet publié / reservé pour l'instant !</p>
    <div class="trajet-non">
        <a href="/annonces">
            <div class="btn btn-voir"><i class="fas fa-plus"></i> Voir Trajets qui vous attendent</div>
        </a>
        <a href="/post-trip">
            <div class="btn btn-pub"><i class="fas fa-folder-open"></i> Publier un trajet rapidement</div>
        </a>
    </div>
<?php
}
?>

<?= $response_display ? "<h2>Booking</h2>" : "" ?>
<div class="booking user-reservation">
    <?php
    foreach ($response_display as $resp) :
    ?>
        <a href="/user/<?= $resp['unique_id'] ?>">
            <div class="profil">
                <p class="name-user"><?= $resp['prenom'] . ' ' . $resp['nom'] ?> </p>
                <div class="user-img">
                    <?= $resp['Image'] != 'image.png' ? '<img src="../images/users/' . $resp['User_time'] . '/' . $resp['Image'] . ' " alt=" ' . $resp['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $resp['Prenom'] . '">' ?>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>
    <?php
    endforeach;
    ?>
</div>