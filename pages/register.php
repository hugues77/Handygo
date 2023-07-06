<?php
$title = "se connecter | inscrivez-vous.";
//menu - Navbar
require_once "layout/partials/topbar-2.php"; 
?>

<div class="container1">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="" class="sign-in-form">
                <h2 class="title">Connexion</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="mail@exemple.com">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Connexion" class="btn-login solid">
                <p class="social-text">Essayer de vous connectez avec les réseaux sociaux</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>

            <!-- form pour inscription -->
            <form action="" class="sign-up-form">
                <h2 class="title">Inscription</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Bisewu Pauline">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="mail@exemple.com">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Je m'inscris" class="btn-login solid">
                <p class="social-text">Essayer de vous inscrire avec les réseaux sociaux</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3 class="mt-4">Nouveau pour ce Site ?</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, placeat? Sit dolorum dicta deserunt, doloremque, molestias ad, in veritatis quaerat error beatae et magni quos deleniti magnam praesentium? Odio, consequuntur?</p>
                <button class="btn-login transparent" id="sign-up-btn">Inscrivez-vous</button>
            </div>
            <img src="images/undraw/program.png" class="image" alt="connexion tindacolis">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3 class="mt-4">Vous êtes déjà Membre ?</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, placeat? Sit dolorum dicta deserunt, doloremque, molestias ad, in veritatis quaerat error beatae et magni quos deleniti magnam praesentium? Odio, consequuntur?</p>
                <button class="btn-login transparent" id="sign-in-btn">Connectez-vous</button>
            </div>
            <img src="images/undraw/office.png" class="image" alt="connexion tindacolis">
        </div>
    </div>
</div> 