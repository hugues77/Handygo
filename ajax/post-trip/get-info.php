<?php
require_once '../function.php';

//Traitement pour connexion utilisateur
if (isset($_SESSION['unique_id'])) {
    if (isset($_SESSION['ref'])) {

        $unique_id = $_SESSION['unique_id'];
        $ref_voy = $_SESSION['ref'];

        $output = "";

        $tab = [
            "unique_id" => $unique_id,
            "ref_voy" => $ref_voy
        ];

        $sql = "SELECT DISTINCT * FROM users LEFT JOIN trip ON users.unique_id = trip.user_id WHERE unique_id =:unique_id AND ref_voy =:ref_voy  ORDER BY id_voy DESC LIMIT 1";
        $req = $connexion->prepare($sql);
        $req->execute($tab);

        if ($req->rowCount() > 0) {
            //if messages exist for two users
            $row = $req->fetch(PDO::FETCH_ASSOC);
            if ($row['Ref_voy'] == $ref_voy) { //if this equals then show the details trip
                if ($row['itineraire'] == 1) : ?>

                    <div class="timeline-item">
                        <div class="time">Step 1</div>
                        <div class="content">
                            <h2 class="title">Itinéraire</h2>
                            <p class="text">Départ : <?= ($row['Depart']) ?></p>
                            <p class="text">Arrivée : <?= ($row['Destination']) ?></p>
                            <p>Vous voyagez en <?= $row['Mode_voy'] ?></p>
                        </div>
                    </div>
                <?php endif;

                if ($row['date_voy'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 2</div>
                        <div class="content">
                            <h2 class="title">Mes Dates</h2>
                            <p>Date Départ : <?= date("d/m/Y", strtotime($row['Date_depart'])) ?> à <?= date("H:i", strtotime($row['Heure_depart'])) ?></p>
                            <p>Date Arrivée : <?= date("d/m/Y", strtotime($row['Date_arrivee'])) . ' à ' . date("H:i", strtotime($row['Heure_arrivee'])) ?></p>
                        </div>
                    </div>
                <?php endif;

                if ($row['bagage_title'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 3</div>
                        <div class="content">
                            <h2 class="title">Bagages Souhaités</h2>
                            <p>Je dipose pour mes clients <?= $row['Bagage_dispo'] ?> Kg</p>
                            <p><?= (!empty($row['Courrier_dispo']) ? 'Je prendrais aussi des documents soit, ' . $row['Courrier_dispo'] . ' documents' : '') ?></p>
                            <p class="Taille_bag">Tailles des bagages acceptés :
                                <?= ($row['Taille_bag_s'] == 1) ? '<span>Taille S </span>' : '' ?>
                                <?= ($row['Taille_bag_m'] == 1) ? '<span> Taille M </span>' : '' ?>
                                <?= ($row['Taille_bag_l'] == 1) ? '<span>Taille L </span>' : '' ?>
                                <?= ($row['Taille_bag_xl'] == 1) ? '<span> Taille XL </span>' : '' ?>
                                <?= ($row['Taille_bag_xxl'] == 1) ? '<span> Taille XXL </span>' : '' ?></p>

                            <p><?= (!empty($row['Descrip_bagage']) ? '<hr><i class="fas fa-quote-left"></i>' . $row['Descrip_bagage'] . '<i class="fas fa-quote-right"></i></p>' : "") ?>
                        </div>
                    </div>
                <?php endif;

                if ($row['paiement_title'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 4</div>
                        <div class="content">
                            <h2 class="title">Prix proposé</h2>
                            <p>Je vous propose <?= $row['Prix_bag'] ?> € / Kg </p>
                            <p>Pour les documents : <?= $row['Prix_courrier'] ?> € / Document </p>
                        </div>
                    </div>';
                <?php endif;

                if ($row['confirm_title'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 5</div>
                        <div class="content">
                            <h2 class="title">Confirmation</h2>
                            <p>Mon téléphone enregistré est <?= $row['Tel2'] ?> </p>
                            <span><?= $row['Adresse_trip'] ? "J'aimerais vous rencontré à l'adresse suivant: " . $row['Adresse_trip'] : "" ?></span>
                            <hr>
                            <p><?= (!empty($row['Description_trip'])) ? $row['Description_trip'] : ""  ?> </p>
                        </div>
                    </div>
                <?php endif;
            } else {
                echo "Pas d'entrée pour l'instant ...";
            }

        } else {
            echo "Pas d'entrée pour l'instant ...";
        }
    } else {
        echo "Pas d'entrée pour l'instant ...";
    }
} else {
    echo 'Merci de vous connectez pour poursuivre...';
    ?>
    <img src="images/voy.png" height="400px" width="600px" alt="">
<?php
}
?>
