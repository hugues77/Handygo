<?php
//droit d'accès - accès une fois connectés
if(isset($_SESSION['unique_id'])){

$title = "Bienvenue au PECEP, Amusez-vous bien !";
//menu - Navbar
require_once "layout/partials/topbar-2.php";

//ma date d'anniversaire (date de naissance) 

?>
<section class="list"> 
    <div class="max-width">
        <h2 class="list-title">Votre Date d'anniversaire, nous est tellement précieuse; C'est parti !</h2> 
        <div class="list-content">
            <div class="col-list1"></div>
            <div class="col-list2"> 
                <hr> 
                <div class="formulaire-info">
                    <form  class="naissance" enctype="multipart/form-data">
                        <div class="error-text error-name"></div>
                        
                        <div class="field">
                            <input type="date" name="naissance" id="" placeholder="Votre date de naissance" required>
                        </div> 
                        <div class="field image">
                            <!-- <input type="text" name="image" id="" placeholder="Choisir votre photo de profil " required> -->
                            <input type="file" name="image-file" id="file-user" hidden="hidden">
                            <!-- <button class="custom-image"><i class="fas fa-camera-retro camera-retro"></i>Choisir votre photo de profil (facultatif)</button> -->
                            <span class="custom-text">Aucun fichier choisi pour l'instant</span>
                        </div>
                        <div class="field">
                            <input type="submit" class="btn-naissance" name="confirm-naissance" id="" value="valider votre inscription">
                        </div>
                        <div class="name-link">Prêts à Abandonner l'inscription ?<a href="/delete/<?=$_SESSION["unique_id"]?>"> Abandonner</a></div>
                    </form>
                </div>
            </div>
            <div class="col-list3"></div> 
        </div>
    </div>
</section>

<?php
}else{
    header("Location:/form");
}

?>