<div>

	<?php
	  
	 echo $this->Form->create('Panier');
	 for( $i = 0 ; $i< count($tab) ; $i++){
	 	echo '<div>';
	 	echo '<p>'.$tab[$i]['Produit']['libelle'].'</p>';
	 	echo $this->Form->number('nombre',array(
	 											'min' => '0',
	 											'default' => '0',
	 											'max' => $tab[$i]['Produit']['stock'],
	 											));
	 	echo '</div>';
	 }
	 echo $this->Form->end('Ajouter au panier');


	 echo debug($tab);
	?>
</div>
