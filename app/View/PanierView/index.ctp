<?php

for ( $i =0 ; $i< count($resPanier) ; $i++){
	echo '<div>';
	//echo '<p>'.$resPanier['Panier'][].'</p>';
	echo '</div>';
}

echo '<h1> donnée de connexion</h1>';
echo debug(AuthComponent::user());
echo '<h1> donnée de la requete</h1>';
echo debug($resPanier);


?>