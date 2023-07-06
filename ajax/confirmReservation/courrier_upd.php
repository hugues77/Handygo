<?php
//prix document
  $prix_doc = htmlentities(trim($_POST['prixDoc_upd']));

 $nb_courr = htmlentities(trim($_POST['qtyBox_cr_upd']));
 $prixTotDoc = ($prix_doc * $nb_courr);

echo  $prixTotDoc;

?>
