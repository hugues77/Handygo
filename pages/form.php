<?php
//droit d'accès - accès une fois connectés
if(isset($_SESSION['unique_id'])){
    header("Location:/abonnes");
}
$title = "Connexion utilisateurs | Tinda Colis";
//menu - Navbar
require_once "layout/partials/topbar-2.php"; ?>

<div class="formulaire">
    <div class="formulaire-content">
        <div class="imgBx">
            <!-- <img src="images/login.jpg" alt=""> -->
            <img src="images/voitures_kin.jpg" alt="">
        </div>
        <div class="wrapper">
            <div class="title-text">
                <div class="title1 login">Connexion Membre</div>
                <div class="title1 signup">Créer un compte</div>
                <div class="title1 password">Mot de Passe oublié</div>
                <div class="title1"></div>
            </div>
           
            <div class="formulaire-container">
                <div class="error-text error-signup"></div>
                <div class="success-text"></div>
                <div class="slide-controls">
                    <input type="radio" name="slider" id="login" checked>
                    <input type="radio" name="slider" id="signup">
                    <label for="login" class="slide login">Connexion</label>
                    <label for="signup" class="slide signup">Inscription</label>
                    <div class="slide-tab"></div>
                </div>
                <div class="formulaire-inner">

                    <!-- formulaire pour login / connexion -->
                    <form  class="login">
                        <div class="field">
                            <input type="email" name="email_login" id="" placeholder="Adresse e-mail" required >
                        </div>
                        <div class="field">
                            <input type="password" name="password_login" id="" placeholder="Mot de passe" required>
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="pass-link"><a href="#">Mot de Passe oublié ?</a></div>
                        <div class="field">
                            <input type="submit" name="submit_login" id="" value="Se Connecter">
                        </div>
                        <div class="signup-link">Vous n’avez pas de compte ?<a href="#"> Inscrivez-vous Maintenant</a></div>
                    </form>

                    <!-- formulaire pour inscription -->
                    <form  class="signup"> 
                        <div class="field">
                            <input type="email" name="email_register" id="" placeholder="Adresse e-mail" required>
                        </div>
                        <div class="field">
                            <input type="password" name="password_register" id="" placeholder="Mot de passe" required>
                            <!-- <i class="fas fa-eye"></i> -->
                            <i class="fas fa-key"></i>
                        </div> 
                        <div class="field">
                            <input type="password" name="password_register_confirm" id="" placeholder="Confirmer Mot de passe" required>
                            <!-- <i class="fas fa-eye"></i> -->
                            <i class="fas fa-key"></i>
                        </div>
                        <div class="field">
                            <input type="submit" name="submit_register" id="" value="S'inscrire"> 
                        </div>
                        <div class="login-link">Vous avez un compte ?<a href="#"> Connectez-vous Maintenant</a></div>
                    </form>

                    <!-- formulaire pour forgot password -->
                    <form  class="password">
                        <div class="field">
                            <input type="email" name="" id="" placeholder="Adresse e-mail" required>
                        </div>
                        <div class="pass-link">Email oublié ?<a href="/#contact"> Veuillez nous contacter</a></div>
                        <div class="field">
                            <input type="submit" name="" id="" value="Envoyer">
                        </div>
                        <div class="signup-link">En cliquant sur Envoyer,<a href="#"> Consultez vite votre messagerie</a></div>
                    </form>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>