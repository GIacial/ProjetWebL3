<?php

echo $this->Form->create('Utilisateur');
echo $this->Form->input('identifiant');
echo $this->Form->input('motdepasse');
echo $this->Form->input('nom');
echo $this->Form->input('prenom');
echo $this->Form->input('anniversaire');

echo $this->Form->end('Comfirmer');


?>