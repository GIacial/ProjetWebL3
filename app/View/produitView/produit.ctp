<div>
    
	<?php

	 echo $this->Form->create('Panier');
	 echo '<table>';
echo '<thead><tr>
<th> Nom</th>
<th> Prix Unitaire</th>
<th> Nombre</th></tr> </thead> <tbody>';
for( $i = 0 ; $i< count($tab) ; $i++){
	 	echo '<tr>';
	 	echo '<td>'.$tab[$i]['Produit']['libelle'].'</td><td>'.$tab[$i]['Produit']['prix'].'€</td>';
	 	echo '<td>'.$this->Form->number('nombre.',array(
	 											'min' => '0',
	 											'default' => '0',
	 											'max' => $tab[$i]['Produit']['stock'],
	 											));
	 	echo $this->Form->input('produit_id.',array(
	 										'default' => $tab[$i]['Produit']['produit_id'],
	 										'type' => 'hidden',
	 										)
	 							).'</td>';
	 	
	 	echo '</tr>';
	 }
echo '</tbody></table>';
	 
	 if(AuthComponent::user() != null){
	 echo $this->Form->end('Ajouter au panier');
	}

	echo '<h1> donnée de connexion</h1>';
	 echo debug(AuthComponent::user());
	echo '<h1> donnée de la requete</h1>';
	 echo debug($tab);
	?>
</div>
