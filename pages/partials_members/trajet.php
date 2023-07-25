<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Trajets Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-3">
                <?php require_once "layout/partials/topbar-3.php"; ?>
                <div class="home_content">
                    <h2 class="title-heading">Mes trajets Handy Go</h2>
                    <div class="trajet-es">
                        <div class="prochains" id="prochains">
                            <div class="max-width">
                                <div class="serv-content">
                                    <?php
                                    $req = show_trip();
                                    if ($req->rowCount() > 0) {
                                        $rows = $req->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row) :
                                            $voy_id = $row['Ref_voy']; ?>
                                            <div class="card1 <?= (($row['nb_place']) == ($row['place_reserve'])) ? 'grise-card' : '' ?>">
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
                                                                <img src="/images/users/<?= $row['Image'] ?>" alt="<?= $row['Prenom'] ?>">
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
                                    <?php endforeach;
                                    } else { ?>
                                        <p class="trajet-aucun"><i class="fa-solid fa-triangle-exclamation"></i><br>Aucun trajet publié pour l'instant !</p>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="btn-annonce trajet-non">
                                <a href="/annonces"><div class="btn btn-voir"><i class="fas fa-plus"></i> Voir Trajets qui vous attendent</div></a>
                                <a href="/post-trip"><div class="btn btn-pub"><i class="fas fa-folder-open"></i> Publier un trajet rapidement</div></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>