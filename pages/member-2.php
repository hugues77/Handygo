<?php
//droit d'accès - accès une fois connectés
// if (!isset($_SESSION['unique_id'])) {
//     header("Location:/");
// }

$title = "Mon Espace Abonnés";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes abonnes-2">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-4">
                <?php require_once "layout/partials/topbar-4.php"; ?>
                <div class="home-main">
                    <div class="topbar-main">
                        <div class="toggle">
                            <ion-icon name="menu-outline"></ion-icon>
                        </div>
                        <div class="search">
                            <label for="">
                                <input type="text" placeholder="recherche ici">
                                <ion-icon name="search-outline"></ion-icon>
                            </label>
                        </div>
                        <!-- userImg -->
                        <div class="user">
                            <img src="images/users/hand.jpg" alt="">
                        </div>
                    </div>
                    <!-- content -- cards  -->
                    <div class="content-main">
                        <h2 class="title-heading">Mon Compte Handy go, Débutant</h2>
                        <div class="cardBox">
                            <div class="card">
                                <div>
                                    <div class="numbers">1.504</div>
                                    <div class="cardName">Trajet en cours ...</div>
                                </div>
                                <div class="iconBx">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                            </div>
                            <div class="card">
                                <div>
                                    <div class="numbers">80</div>
                                    <div class="cardName">Déjà publiés</div>
                                </div>
                                <div class="iconBx">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                            </div>
                            <div class="card">
                                <div>
                                    <div class="numbers">284</div>
                                    <div class="cardName">Mes reservations</div>
                                </div>
                                <div class="iconBx">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                            </div>
                        </div>

                        <div class="details">
                            <!-- data list -->
                            <div class="recentOrders">
                                <div class="cardHeader">
                                    <h2>Dérnières Activités</h2>
                                    <a href="#" class="btn">Voir plus</a>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Départ</td>
                                            <td>Destination</td>
                                            <td>Prenom</td>
                                            <td>Prix</td>
                                            <td>Statut</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Metz</td>
                                            <td>Paris</td>
                                            <td>Andeas</td>
                                            <td>300 CDF</td>
                                            <td><span class="status realize">Trajet réalisé</span></td>
                                        </tr>
                                        <tr>
                                            <td>Kasai</td>
                                            <td>Lomami</td>
                                            <td>Pedro</td>
                                            <td>800 CDF</td>
                                            <td><span class="status not-realize">Trajet non réalisé</span></td>
                                        </tr>
                                        <tr>
                                            <td>mbandaka</td>
                                            <td>Lisala</td>
                                            <td>Magbetu</td>
                                            <td>1800 CDF</td>
                                            <td><span class="status on-hold">Trajet en attente</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- recents messages -->
                            <div class="recentMessages">
                                <div class="cardHeader">
                                    <h2>Mes Dérniers Messagers</h2>
                                </div>
                                <table>
                                    <tr>
                                        <td><div class="imgBx"><img src="/images/users/hand.jpg" alt=""></div></td>
                                        <td><h4>Hugues <br><span>kinshasa</span></h4></td>
                                    </tr>
                                    <tr>
                                        <td width="30px"><div class="imgBx"><img src="/images/users/bible_bg.jpg" alt=""></div></td>
                                        <td><h4>Hugues <br><span>kinshasa</span></h4></td>
                                    </tr>
                                    <tr>
                                        <td width="30px"><div class="imgBx"><img src="/images/users/1685382793.PNG" alt=""></div></td>
                                        <td><h4>Hugues <br><span>kinshasa</span></h4></td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>