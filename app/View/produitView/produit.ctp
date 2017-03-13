<div>

	<?php
	  
	 echo $this->Form->create('Panier');
	 for( $i = 0 ; $i< count($tab) ; $i++){
	 	echo '<div>';
	 	echo '<p>'.$tab[$i]['Produit']['libelle'].'  '.$tab[$i]['Produit']['prix'].'€</p>';
	 	echo $this->Form->number('nombre.',array(
	 											'min' => '0',
	 											'default' => '0',
	 											'max' => $tab[$i]['Produit']['stock'],
	 											));
	 	echo $this->Form->input('produit_id.',array(
	 										'default' => $tab[$i]['Produit']['produit_id'],
	 										'type' => 'hidden',
	 										)
	 							);
	 	
	 	echo '</div>';
	 }
	 if(AuthComponent::user() != null){
	 echo $this->Form->end('Ajouter au panier');
	}

	echo '<h1> donnée de connexion</h1>';
	 echo debug(AuthComponent::user());
	echo '<h1> donnée de la requete</h1>';
	 echo debug($tab);
	?>
</div>
