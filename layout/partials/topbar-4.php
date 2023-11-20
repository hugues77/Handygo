<div class="navigation">  
    <ul>
        <!-- <li>
            <a href="/abonnes" class="chat">
                <span class="icon"><?= $row['Image'] != 'image.png' ? '<img src="../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?></span>
                <span class="title">
                    <h3><?= $row['Prenom'] . "  " . $row['Nom'] ?></h3>
                </span>
                <small class="expert">Débutant</small>
            </a>

        </li> -->
        <li>
            <!-- <ion-icon name="logo-apple"></ion-icon> -->
            <span class="espace">Mon Esapce Abonné.e <ion-icon name="close-circle-outline" class="icon-espace"></ion-icon></span>
        </li>
        <li>
            <a href="/espace-membre">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/abonnes/profil">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="title">Profil</span>
            </a>
        </li>
        <li>
            <a href="/abonnes/trajets">
                <span class="icon"><ion-icon name="eye-outline"></ion-icon></span>
                <span class="title">Trajets</span>
            </a>
        </li>
        <li>
            <a href="/messages/list">
                <span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
                <span class="title">Messages</span>
            </a>
        </li>
        <li>
            <a href="/abonnes/setting">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                <span class="title">Parametres</span>
            </a>
        </li>
        <li>
            <a href="/abonnes/help">
                <!-- <span class="icon"><i class="fa-solid fa-question"></i></span> -->
                <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                <span class="title">Help</span>
            </a>
        </li>
        <li>
            <a href="/logout/<?= $_SESSION["unique_id"] ?>">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">Déconnexion</span>
            </a>
        </li>
    </ul>
    <div class="toggle"></div>
</div>
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
            <!-- <img src="../images/users/hand.jpg" alt=""> -->
            <span class="icon"><?= $row['Image'] != 'image.png' ? '<img src="../../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?></span>
        </div>
    </div>