<div class="topbar-3">
    <div class="sidebar"> 
        <ul>
            <li>
                <a href="#" class="chat">
                    <span class="icon"><img width="60px" height="60px" src="../images/users/<?=$row['image'] ?>" alt=""></span>
                    <span class="title"><h3><?=$row['prenom']."  ".$row['nom'] ?></h3></span> 
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">Réservations</span>
                </a>
            </li>
            <li>
                <a href="/messages/list">
                    <span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
                    <span class="title">Messages</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                    <span class="title">Parametres</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <!-- <span class="icon"><i class="fa-solid fa-question"></i></span> -->
                    <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                    <span class="title">Help</span>
                </a>
            </li>
            <li>
                <a href="/logout/<?=$_SESSION["unique_id"]?>">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">Déconnexion</span>
                </a>
            </li>
        </ul>
        <div class="toggle"></div>
    </div>
    <div class="home_content"> 
        <div class="row">
            <h2 class="section-heading">Mon Compte Handygo, Ambassadeur</h2>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3>service Heading</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, consequuntur laudantium magni quam cupiditate dignissimos expedita eos quibusdam reprehenderit nihil provident. At sapiente quibusdam illo excepturi, voluptate ex nihil! Asperiores!</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3>service Heading</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, consequuntur laudantium magni quam cupiditate dignissimos expedita eos quibusdam reprehenderit nihil provident. At sapiente quibusdam illo excepturi, voluptate ex nihil! Asperiores!</p>
                </div>
            </div>
            
        </div>
    </div>
</div>


