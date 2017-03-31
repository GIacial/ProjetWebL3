<?php
/*  Moise Lucille
    Regnier Jérémy
*/

echo '<table>';
echo '<thead><tr>
<th> Identifiant</th>
<th> Mot de passe</th>
<th> Nom</th>
<th> Prenom </th>
<th> Anniversaire </th>
<th> Statut </th>
<th> Action </th>

</tr> </thead> <tbody>';
for( $i = 0 ; $i< count($user) ; $i++){
	if(AuthComponent::user()['id'] != $user[$i]['Utilisateur']['id']){
	 	echo '<tr>';
	 	echo '<td>'.$user[$i]['Utilisateur']['identifiant'].'</td>
	 	<td>'.$user[$i]['Utilisateur']['motdepasse'].'</td>
	 	<td>'.$user[$i]['Utilisateur']['nom'].'</td>
	 	<td>'.$user[$i]['Utilisateur']['prenom'].'</td>
	 	<td>'.$user[$i]['Utilisateur']['anniversaire'].'</td> <td>'
	 	;
	 	if($user[$i]['Utilisateur']['isadmin']){
	 		echo 'Admin';
	 	}
	 	else{
	 		echo 'Client';
	 	}
	 	echo '</td>';
	 	echo '<td>'.$this->Html->link('Supprimer',array(
											'controller' => 'Utilisateur',
											'action' => 'suppUser',
											$user[$i]['Utilisateur']['id']
											)
	).'</td>';
	 	echo '</tr>';
	 }
}
echo '</tbody></table>';

?>