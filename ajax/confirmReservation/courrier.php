<?php
//prix document
  $prix_doc = htmlentities(trim($_POST['prixDoc']));

 $nb_courr = htmlentities(trim($_POST['qtyBox_cr_confirm']));
 $prixTotDoc = ($prix_doc * $nb_courr);

echo  $prixTotDoc;

?>
