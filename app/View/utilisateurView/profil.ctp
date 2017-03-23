<?php
$user = AuthComponent::user();
echo $this->Form->create('Utilisateur');
echo $this->Form->input('identifiant', array('default'=> $user['identifiant']));
echo $this->Form->input('motdepasse', array('type'=> 'password'));
echo $this->Form->input('nom', array('default'=> $user['nom']));
echo $this->Form->input('prenom', array('default'=> $user['prenom']));
echo $this->Form->input('anniversaire', array('default'=> $user['anniversaire']));
 if($user != null){
    if($user['isadmin']){
         echo "<p>Vous êtes Admin</p>";
    }else{
        echo "<p>Vous n'êtes pas admin</p>";
    }
 }
echo $this->Form->end('Confirmer');




?>