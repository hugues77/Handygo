<!-- section testemonials customer -->

<section class="teams" id="teams">
    <div class="max-width">
        <h2 class="title">Témoignages</h2>
        <?php
            $show = show_testimony();
            if ($show->rowCount() > 0){
                $rows = $show->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="carousel owl-carousel">
            <?php foreach ($rows as $row) : ?>
                <div class="card2">
                    <div class="box">
                        <?= $row['Image'] != 'image.png' ? '<img src="../images/users/' . $row['User_time'] . '/' . $row['Image'] . ' " alt=" ' . $row['Prenom'] . ' ">' : '<img src="../images/users/image.png" alt="' . $row['Prenom'] . '">' ?>
                        <div class="text"><?= substr($row['titre_com'], 0, 25) ?>...</div>
                        <p><?= substr($row['Description_com'], 0, 70) ?>...</p>
                        <hr class="line"><span class="name"><?=$row['Prenom'] .' '.$row['Nom']?> | <?= date('d-m-Y', strtotime($row['Date_com']))?> </span>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="card2">
                <div class="box">
                    <img src="../images/users/bible_bg.jpg" alt="olive_moi">
                    <div class="text">Incroyable franchement</div>
                    <p>Lorem ipsum dolor, adipisci aut a, enim nam minima ipsam ad minus quidem.</p>
                </div>
            </div>
            <div class="card2">
                <div class="box">
                    <img src="../images/users/hand.jpg" alt="olive_moi">
                    <div class="text">Ils ont gouter à l'aventure</div>
                    <p>Lorem ipsum dolor, adipisci aut a, enim nam minima ipsam ad minus quidem.</p>
                </div>
            </div>
            <div class="card2">
                <div class="box">
                    <img src="../images/users/omers3.jpg" alt="olive_moi">
                    <div class="text">Une expérience de Ouf!</div>
                    <p>Lorem ipsum dolor, adipisci aut a, enim nam minima ipsam ad minus quidem.</p>
                </div>
            </div>
            <div class="card2">
                <div class="box">
                    <img src="../images/users/office.jpg" alt="olive_moi">
                    <div class="text">Ils ont gouter à l'aventure</div>
                    <p>Lorem ipsum dolor, adipisci aut a, enim nam minima ipsam ad minus quidem.</p>
                </div>
            </div> -->
        </div>
        <?php }
        else {?>
        <h4 class="text-comment">Aucun commentaire a été posté pour l'instant</h4>
        <?php } ?>
        <div class="btn-temoignage"> Laisser un commentaire</div>
    </div>
    <!-- content modal / form  -->
    <div class="modal-box">
        <div class="error-text error"></div>
        <i class="fa-solid fa-pen-to-square"></i>
        <h2>Laissez-nous un commentaire </h2>
        <h4>Qu'est ce que vous en pensez sur Handygo ? Exprimez-vous!</h4>
        <form method="post" class="teams-modal">
            <div class="field">
                <input type="text" name="titre-tem" placeholder="Titre du commentaire">
            </div>
            <div class="field">
                <textarea name="description-tem" id="" cols="30" rows="10" placeholder="Votre commentaire ici"></textarea>
            </div>
            <div class="buttons">
                <div class="btn-fermer">Fermer</div>
                <div class="btn-envoyer">Envoyer</div>
            </div>
        </form>
    </div>
</section>
