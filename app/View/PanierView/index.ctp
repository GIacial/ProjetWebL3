<?php

/*  Moise Lucille
    Regnier Jérémy
*/
echo '<h1> Panier de '.AuthComponent::user()['nom'].' '.AuthComponent::user()['prenom'].'</h1><hr/>';

$prixTotal = 0;
echo '<table>';
echo '<thead><tr>
<th> Nom</th>
<th>Nombre</th>
<th> Prix Unitaire</th>
<th> Prix du lot</th>
<th> </th>
</tr> </thead> <tbody>';
for ( $i =0 ; $i< count($resPanier) ; $i++){
	echo '<tr>';
	echo '<td>'.$resPanier[$i]['Produit']['libelle'].'</td>';	
	echo '<td> '.$resPanier[$i]['Panier']['nombre'].'</td>';	
	echo '<td> '.$resPanier[$i]['Produit']['prix'].'€</td>';
	$prixLot = $resPanier[$i]['Panier']['nombre']*$resPanier[$i]['Produit']['prix'];
	$prixTotal += $prixLot;
	echo '<td> '.$prixLot.'€</td>';
	echo '<td>'.$this->Html->link('Supprimer',array(
											'controller' => 'Panier',
											'action' => 'supprimerArticle',
											$resPanier[$i]['Panier']['panier_id']
											)
	).'</td>';
	echo '</tr>';
}
echo '</tbody></table>';

echo '<div> Prix total :'.$prixTotal.'€</div>';
	echo $this->Html->link('Vider Panier',array(
											'controller' => 'Panier',
											'action' => 'viderPanier',
											)
	);
		echo $this->Html->link('Acheter',array(
											'controller' => 'Panier',
											'action' => 'achatPanier',
											)
	);

echo '<h1> donnée de connexion</h1>';
echo debug(AuthComponent::user());
echo '<h1> donnée de la requete</h1>';
echo debug($resPanier);
?>