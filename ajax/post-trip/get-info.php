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
                            <h4><?= date("d/m/Y", strtotime($row['Date_depart'])) ?></h4>
                            <p>Heure départ Départ : <?= date("d/m/Y", strtotime($row['Date_depart'])) ?> à <?= date("H:i", strtotime($row['Heure_depart'])) ?></p>
                            <p>Heure d'arrivée : <?= date("d/m/Y", strtotime($row['Date_depart'])) . ' à ' . date("H:i", strtotime($row['Heure_arrivee'])) ?></p>
                        </div>
                    </div>
                <?php endif;

                if ($row['bagage_title'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 3</div>
                        <div class="content">
                            <h2 class="title">Nombres de places Souhaités</h2>
                            <p>Je dipose pour mes clients <?= $row['Bagage_dispo'] ?> places</p>
                            
                        </div>
                    </div>
                <?php endif;

                if ($row['paiement_title'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 4</div>
                        <div class="content">
                            <h2 class="title">Prix proposé</h2>
                            <p>Je vous propose <?= $row['Prix_bag'] ?> CDF / place </p>
                        </div>
                    </div>';
                <?php endif;

                if ($row['confirm_title'] == 1) : ?>
                    <div class="timeline-item">
                        <div class="time">Step 5</div>
                        <div class="content">
                            <h2 class="title">Confirmation</h2>
                            <p>Mon téléphone enregistré est <?= $row['Tel2'] ?> </p>
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
