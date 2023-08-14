<?php
//droit d'accès - accès une fois connectés
if (isset($_SESSION['unique_id'])) {

    $title = "Bienvenue au PECEP, Amusez-vous bien !";
    //menu - Navbar
    require_once "layout/partials/topbar-2.php";   

    
    //query for select the news for user -  infos user
    $chat = user_chat($_SESSION["unique_id"]);
    if ($chat->rowCount() > 0) {
        $rows = $chat->fetchAll(PDO::FETCH_ASSOC);
    } 
     

?>
    <section class="list">
        <div class="max-width">
            <h2 class="list-title">Mise à jour mes informations personnelles; C'est parti !</h2>
            <div class="list-content">
                <div class="col-list1"></div>    
                <div class="col-list2">
                    <hr>
                    <div class="formulaire-info"> 
                        <?php foreach($rows as $row): ?>
                            <form class="info-user">
                                <div class="error-text error-name"></div> 
                                <div class="field-user">
                                    <div class="field m-field">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" id="prenom" name="prenom-user" value="<?=$row['Prenom'] ?>">
                                    </div>
                                    <div class="field">
                                        <label for="name">Nom</label>
                                        <input type="text" id="name" name="nom-user"  value="<?=$row['Nom'] ?>">
                                    </div>
                                </div>
                                <div class="field-user">

                                    <div class="field m-field">
                                        <label for="sexe">Vous etes</label>
                                        <input type="text" id="sexe" value="<?= ($row['Sexe'] =='f') ? 'Femme' : 'Homme' ?>" disabled = "disabled">
                                    </div>

                                    <div class="field">
                                        <label for="naissance">Date de naissance</label>
                                        <input type="text" id="naissance" name="date-user" value="<?=date("d/m/Y", strtotime($row['Date_naissance'])) ?>" >
                                    </div>
                                </div> 
                                <div class="field-user"> 

                                    <div class="field">
                                        <label for="tel">Numéro de téléphone</label>
                                        <input type="text" id="tel" name="tel-user" placeholder="+243 899 899 651" value="<?=$row['Tel1'] ?>">
                                    </div>
                                </div>
                                <hr class="line-info">

                                <div class="field">
                                    <label for="bio">Mini bio</label>
                                    <textarea id="bio" name="bio-user" class="textarea-complete" placeholder="Mini bio"><?=$row['Bio']?></textarea>
                                </div>
                                <div class="field-user">

                                    <div class="field button-complete m-field">
                                        <input type="submit" class="btn-complete-annuler" value="annuler les modifications">
                                    </div>
                                    <div class="field button-complete">
                                        <input type="submit" class="btn-complete-user" value="valider mes Informations">
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-list3"></div>
            </div>
        </div>
    </section>

<?php
} else {
    header("Location:/form");
}

?>