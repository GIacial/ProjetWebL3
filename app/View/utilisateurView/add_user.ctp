<?php

/*  Moise Lucille
    Regnier Jérémy
*/

echo $this->Form->create('Utilisateur');
echo $this->Form->input('identifiant');
echo $this->Form->input('motdepasse', array( 'type'=> 'password',			
                                           ));
echo $this->Form->input('nom');
echo $this->Form->input('prenom');
echo $this->Form->input('anniversaire',array(
											'minYear' => date('Y') -100,
											'maxYear' => date('Y') -18,
											));
 if(AuthComponent::user() != null){
    if(AuthComponent::user()['isadmin']){
         echo $this->Form->input('isadmin');
    }
 }
echo $this->Form->end('Confirmer');




?>