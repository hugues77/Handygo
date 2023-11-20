<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Help Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes abonnes-2">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-4">
                <?php  require_once "layout/partials/topbar-4.php";?> 
                
                    <!-- content -- cards  -->
                    <div class="content-main">
                        <!-- <h2 class="title-heading">Help Handy Go</h2> -->
                        <div class="list">
                            <div class="">
                                <h2 class="list-title">Retrouvez des questions les plus fréquents posées et ameliorez votre navigation; C'est parti !</h2>
                                <div class="list-content-3">
                                    <div class="col-list1"></div>
                                    <div class="col-list2 complete-user">
                                        <hr>
                                        <div class="formulaire-info">
                                            <div class="error-text error-name"></div>

                                            <div class="accordion-menu">
                                                <div class="link">
                                                    <div class="dropdown">
                                                        <!-- <i class="fa-solid fa-envelope-open-text"></i> -->
                                                        <span>Pourquoi ouvrir un compte avant de publier ou de reserver ?</span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>

                                                    <div class="submenuItems">

                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil saepe voluptate quas laborum aperiam provident error ut at quasi iure. Nam saepe recusandae deleniti assumenda ducimus qui dignissimos nemo dolorem.

                                                    </div>
                                                </div>
                                                <div class="link">
                                                    <div class="dropdown">
                                                        <!-- <i class="fa-solid fa-envelope-open-text"></i> -->
                                                        <span>J’ai besoin d’aide pour connaitre le service en ligne. Que propose Handygo ?</span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>

                                                    <div class="submenuItems">

                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis doloremque sed distinctio eligendi hic quidem dignissimos nesciunt officiis facilis? Exercitationem vero molestiae aperiam sed voluptatum a vitae quaerat eligendi omnis!

                                                    </div>
                                                </div>
                                                <div class="link">
                                                    <div class="dropdown">
                                                        <!-- <i class="fa-solid fa-envelope-open-text"></i> -->
                                                        <span>Quels conditions dois-je remplir pour commencer à utiliser  Handygo?</span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>

                                                    <div class="submenuItems">

                                                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, adipisci? Fugit, perferendis. Ab voluptatibus perferendis nemo deleniti aperiam ea, sint architecto quas ad reprehenderit placeat enim alias provident animi? Pariatur!

                                                    </div>
                                                </div>
                                                <div class="link">
                                                    <div class="dropdown">
                                                        <!-- <i class="fa-solid fa-envelope-open-text"></i> -->
                                                        <span>Si mes informations ne sont pas verifiés, est ce que je peux toujours esperer à utiliser Handygo ?</span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>

                                                    <div class="submenuItems">

                                                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat exercitationem cumque nobis nesciunt, quibusdam suscipit aspernatur laboriosam aliquid harum, dignissimos animi, voluptatum nihil. Perspiciatis libero earum molestias quaerat facere! Quasi!

                                                    </div>
                                                </div>
                                                <div class="link">
                                                    <div class="dropdown">
                                                        <!-- <i class="fa-solid fa-envelope-open-text"></i> -->
                                                        <span>Comment recuperer mes identifiants perdus ?</span>
                                                        <i class="fa-solid fa-chevron-down"></i>
                                                    </div>

                                                    <div class="submenuItems">

                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit illo eveniet suscipit, perferendis tempora at incidunt! Quas cupiditate quos odit ullam quis. Dicta, reiciendis quia eos architecto delectus doloremque?

                                                    </div>
                                                </div>


                                            </div>
                                            <!-- 
                                            <div class="piece permis">
                                                <span>Permis de conduire</span>
                                                <span><i class="fa-solid fa-chevron-right"></i></span>
                                            </div>
                                            <div class="piece immat">
                                                <span>Plaque d'immatriculation </span>
                                                <span><i class="fa-solid fa-chevron-right"></i></span>
                                            </div>
                                            <div class="piece telephone">
                                                <span>Numéro de téléphone</span>
                                                <span><i class="fa-solid fa-chevron-right"></i></span>
                                            </div>
                                            <div class="piece adresse-phy">
                                                <span>Adresse physique</span>
                                                <span><i class="fa-solid fa-chevron-right"></i></span>
                                            </div>
                                            <div class="piece email">
                                                <span>Email</span>
                                                <span><i class="fa-solid fa-chevron-right"></i></span>
                                            </div> -->
                                            <!-- <small class="justificatif">* le justificatif d'adresse peut simplement être une facture du SNEL, Régideso ou encore tout autre document officiel..</small> -->
                                        </div>
                                    </div>
                                    <div class="col-list3"></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>