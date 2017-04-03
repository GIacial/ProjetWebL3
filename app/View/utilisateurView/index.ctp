<?php

/*  
    Moise Lucille
    Regnier Jérémy
*/

	$user = AuthComponent::user();

	if($user == null){
		echo '<div> Vous n\'êtes pas connecté </div>';
	}
	else{
		echo '<div> Vous êtes connecté sous le login '.$user['identifiant'].' </div>';
		echo '<div> Votre nom est '.$user['nom'].' </div>';
		echo '<div> Votre prénom est '.$user['prenom'].' </div>';
		echo '<div> Vous êtes né le '.$user['anniversaire'].' </div>';
		if($user['isadmin']){
			echo '<div> Vous êtes un admin</div>';
		}

	}


?>