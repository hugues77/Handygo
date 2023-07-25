<?php
$title = "Annonces des voyages";
require_once "layout/partials/topbar-2.php"; 
//section start
require_once "layout/partials/section_start.php"; 
// require_once "layout/partials/search_section.php";  

?>
<div class="form-search-home">
    <form  method="GET">
        <div class="search-bar-home annonce_bar">
            <div class="depart-input"> 
                <input type="text" name="depart" placeholder="Ville de Départ" id="v-dep">
                <i class="fas fa-circle-dot trj_d"></i>
            </div>
            <div>
                <input type="text" name="retour" placeholder="Ville de  Destination" id="v-arr">
                <i class="fas fa-circle-dot trj_a"></i>
            </div> 
            <div>
                <input id="date_search" name="date_dep" class="date-search" type="text" placeholder="Choisir la date">
                <i class="fas fa-calendar-days date_part"></i>
            </div>
        </div>
        <div class="search-bar-right annonce_bar">
            <input type="submit" name="search" value="Réchercher">
            <i class="fas fa-search"></i>
        </div>
    </form>
</div>

<!-- Annonces section start -->
<!-- <section class="annonces" id="annonces">
    <div class="max-width">  
        <div class="annonces-content">
            <p>Handy Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur ab voluptas quidem sed exercitationem culpa aspernatur repudiandae modi soluta libero?</p>
            <div class="search-bar-annonces">
                <form action="#" method="post">
                    <input class="annonce-depart" type="text" placeholder="Votre ville de départ">
                    <input type="text" placeholder="Votre ville d'arrivée">
                    <input type="date" value="2021-12-29">

                    <button type="submit"><i class="fas fa-search"></i>Réchercher</button>
                </form>
            </div>
        </div>
    </div>
</section> -->
<section class="annonces-2" id="annonces"> 
    <div class="max-width">
        <!-- <h2 class="title">Prochains Voyages</h2> -->
        <div class="annonces-col">
            <div class="annonces-filter">
                <h2>Filtrer les résultats :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus praesentium consequatur blanditiis ab ex quos autem est, odit quidem similique obcaecati recusandae, nisi, quia eum reprehenderit fuga ullam quasi. Facilis harum, magni doloribus corporis unde perspiciatis aspernatur dignissimos, ipsa distinctio architecto libero animi sunt aliquam aperiam ullam tenetur tempore nihil.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus praesentium consequatur blanditiis ab ex quos autem est, odit quidem similique obcaecati recusandae, nisi, quia eum reprehenderit fuga ullam quasi. Facilis harum, magni doloribus corporis unde perspiciatis aspernatur dignissimos, ipsa distinctio architecto libero animi sunt aliquam aperiam ullam tenetur tempore nihil.</p>
            </div>
            <div class="annonces-card"> 
                <?php
                    // verifier si les parametres de recherche existe
                    $depart = $_GET['depart']; 
                    $arrivee = $_GET['arrivee'];
                    $date_dep = date_arr($_GET['date_dep']);
                    
                    // verifier si tous les champs passés en GET sont remplis
                    if(isset($_GET['search']) || $_GET['choisir_dep']){
                        if(!empty($depart) AND !empty($arrivee) AND !empty($_GET['date_dep'])){
                            if(isset($_GET['search'])){

                                //afficher les resultats en rapport avec les parametres passés en get
                                $req = show_trip_search($depart, $arrivee, $date_dep);
                                if($req->rowCount() > 0){    
                                    require_once "layout/partials/annonces-card.php";
                                    
                                }else{
                                    
                                    ?>
                                    <div class="annonce_alert">
                                        <div class="title-alert">Il n'y a pas encore de trajet disponible le <?= $_GET['date_dep'] ?> pour ce trajet.</div>
                                        <p><?= $depart .'  ' ?><i class="fas fa-arrow-right"></i><?=' '.$arrivee?></p>
                                        <a href="report/trip-alert"><button class="create-alert">Créer rapidement une alerte</button></a><hr>
                                        <form  method="GET">
                                            <?php
                                                $choisir_dep = str_shuffle(str_repeat($depart.$arrivee.$date_dep,10));
                                            ?>
                                            <div class="depart-input" hidden="hidden"> 
                                                <input type="text" name="depart" value="<?= $depart ?>" placeholder="Ville de Départ">
                                                <i class="fas fa-circle-dot trj_d"></i>
                                            </div>
                                            <div hidden="hidden">
                                                <input type="text" name="arrivee" value="<?= $arrivee ?>" placeholder="Ville de  Destination">
                                                <i class="fas fa-circle-dot trj_a"></i>
                                            </div> 
                                            <div class="trajet">
                                                <button type="sumbit" name="choisir_dep" value="<?= $choisir_dep ?>"><i class="fas fa-chevron-down"></i>Choisir un départ Plus tard ou plus tôt </button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                } 
                            }
                            
                        }elseif(!empty($_GET['depart']) AND !empty($_GET['arrivee']) AND !empty($_GET['choisir_dep'])){
                            if(isset($_GET['choisir_dep'])){
                            //afficher les trajets selon le depart et retour avec une date supérieur à la date du jour
                                $req = show_trip_tard($depart, $arrivee);
                                if($req->rowCount() > 0){
                                    require_once "layout/partials/annonces-card.php";
                                   
                                }else{ 
                                    ?>
                                    <div class="annonce_alert">
                                        <div class="title-alert">Aucune publication disponible pour ce trajet. Merci de révenir plus tard ou créer une alerte</div>
                                        <p><?= $depart .'  ' ?><i class="fas fa-arrow-right"></i><?=' '.$arrivee ?></p>

                                        <!-- pour l'alerte on va creer une table qu'on va directement enregistrer user et la date si la date et le trajet correspond à un trajet publier, on envoie un email à user -->
                                        <a href="report/trip-alert"><button class="create-alert">Créer rapidement une alerte</button></a><hr>
                                        
                                    </div>
                                    <?php
                                }
                            }
                        }else{
                            ?>
                            <div class="error-annonces">Votre recherche ne correspond pas aux critères, Réessayer</div>
                            <?php
                            //afficher les premiers voyages publiés
                            $req = show_trip();
                            if($req->rowCount() > 0){
                                require_once "layout/partials/annonces-card.php"; 
                                    
                            }
                        } 
                    }else{
                        //afficher les premiers voyages publiés
                        $req = show_trip();
                        if($req->rowCount() > 0){
                            require_once "layout/partials/annonces-card.php";
                          
                        }
                    } 
                ?>
            </div>
        </div>
    </div>
</section> 