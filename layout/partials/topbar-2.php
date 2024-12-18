<?php
if (isset($_SESSION["unique_id"])) {

    //query for select the news for user
    $chat = user_chat($_SESSION["unique_id"]);
    if ($chat->rowCount() > 0) {
        $row = $chat->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<nav class="navbar2">
    <div class="max-width">
        <div class="logo">
            <a href="/"><i class="fas fa-cubes me-2"></i>Handy <span>go.</span></a>
        </div>
        <ul class="menu">
            <!-- <div class="fd-menu"></div> -->
            <li><a href="/">Home</a></li>
            <li><a href="/#about">A propos</a></li>
            <li><a href="/post-trip">Déposer un trajet</a></li>
            <li><a href="/annonces">Trouver Une Offre</a></li>
            <li><a href="/reclammation">Réclammation</a></li>
            <li>
                <?php if(!isset($_SESSION['unique_id']) AND !isset($_SESSION['image'])): ?>
                    <a class="connexion_btn" href="/form">Connexion | Inscription</a>
                <?php elseif(isset($_SESSION['unique_id']) AND ($row['Image'] == 'image.png')): ?>
                    <a class="connexion_btn" href="/espace-membre"><img src="../../images/users/image.png" alt="'.$row['Prenom'].'"> Mon Espace Abonné</a>
                <?php elseif(isset($_SESSION['unique_id']) AND isset($_SESSION['image'])): ?>
                    <a class="connexion_btn" href="/espace-membre"><img src="../../images/users/<?= $row['User_time'].'/' . $row['Image']  ?>" alt="<?=$row['Prenom'] ?>"> Mon Espace Abonné</a>
                <?php endif; ?>
                
            </li>
        </ul>
        <div class="menu-btn">
            <i class="fas fa-bars"></i> 
        </div>
    </div>
</nav>
<?php //require_once './pages/filters/set_flash.php'; ?>