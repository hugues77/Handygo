<?php
 //prix bagage
 $prix_bag = htmlentities(trim($_POST['prixBag_kg']));

 $nb_kg_bag = htmlentities(trim($_POST['qtyBox_bag_confirm']));
 
 
 $prixTotBag = ($prix_bag * $nb_kg_bag);
echo $prixTotBag; 
?>
