<?php
 //prix bagage
 $prix_bag_2 = htmlentities(trim($_POST['prixBag_kg_upd']));

 $nb_kg_bag_2 = htmlentities(trim($_POST['qtyBox_bag_upd']));
 
 $prixTotBag2 = ($prix_bag_2 * $nb_kg_bag_2);
echo $prixTotBag2; 
?>
