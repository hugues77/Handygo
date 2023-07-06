<?php
//droit d'accès - accès une fois connectés
if(isset($_SESSION['unique_id'])){

$title = "Bienvenue au PECEP, Amusez-vous bien !";
//menu - Navbar
require_once "layout/partials/topbar-2.php";

//titre: Mon identité ou C’est l’heure des présentations
//mon nom
//mon prenom
//votre sexe (vous etes) 

?>
<section class="list"> 
    <div class="max-width">
        <h2 class="list-title">C'est l'heure de vous présentez; C'est parti !</h2> 
        <div class="list-content">
            <div class="col-list1"></div>
            <div class="col-list2">
                <hr>
                <div class="formulaire-info">
                    <form  class="name">
                        <div class="error-text error-name"></div>
                        <div class="field-head">
                            <div class="field">
                                <input type="text" name="firstname-user" id="" placeholder="Votre Prénom" required>
                            </div>
                            <select type="text" name="gender-user" id="" placeholder="Vous êtes" required class="field">
                                <option value="" selected>Vous êtes</option>
                                <option value="h">Homme</option>
                                <option value="f">Femme</option>
                            </select>
                        </div>
                        <div class="field">
                            <input type="text" name="lastname-user" id="" placeholder="Votre Nom" required>
                        </div>
                        <div class="field">
                            <input type="submit" name="confirm-name" id="" value="Suivant">
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