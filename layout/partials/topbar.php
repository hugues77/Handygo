<?php
if (isset($_SESSION["unique_id"])) {

    //query for select the news for user
    $chat = user_chat($_SESSION["unique_id"]);
    if ($chat->rowCount() > 0) {
        $row = $chat->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<nav class="navbar1">
    <div class="max-width">
        <div class="logo">
            <a href="/"><i class="fas fa-cubes me-2"></i>Handy <span>go.</span></a>
        </div>
        <ul class="menu">
            <li><a href="/">Home</a></li>
            <li><a href="/#about">A propos</a></li>
            <li><a href="/post-trip">Déposer Un trajet</a></li>
            <li><a href="/annonces">Trouver Une Offre</a></li>
            <li><a href="/reclammation">Réclammation</a></li>
            <li><?= !isset($_SESSION['unique_id']) ? '<a class="connexion_btn" href="/form">Connexion | Inscription</a>' : '<a class="connexion_btn" href="/abonnes"><img src="../images/users/' . $row['Image'] . '" alt=""> Mon Espace Abonné</a>' ?></li>
        </ul>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>