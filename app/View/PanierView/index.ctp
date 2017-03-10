<?php


echo '<h1> Panier de '.AuthComponent::user()['nom'].' '.AuthComponent::user()['prenom'].'</h1><hr/>';

$prixTotal = 0;
for ( $i =0 ; $i< count($resPanier) ; $i++){
	echo '<div>';
	echo '<p>'.$resPanier[$i]['Produit']['libelle'].'</p>';	
	echo '<p> Prix Unitaire :'.$resPanier[$i]['Produit']['prix'].'€</p>';	
	echo '<p> Nombre :'.$resPanier[$i]['Panier']['nombre'].'</p>';
	$prixLot = $resPanier[$i]['Panier']['nombre']*$resPanier[$i]['Produit']['prix'];
	$prixTotal += $prixLot;
	echo '<p> Prix du lot :'.$prixLot.'€</p>';
	echo '</div> <hr/>';
}

echo '<div> Prix total :'.$prixTotal.'€</div>';

echo '<h1> donnée de connexion</h1>';
echo debug(AuthComponent::user());
echo '<h1> donnée de la requete</h1>';
echo debug($resPanier);


?>