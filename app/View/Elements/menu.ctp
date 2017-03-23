<?php
$tab = AuthComponent::user();
echo '<nav>';
    echo '<ul>';
    debug($tab);
    if ($tab == NULL){ // NON AUTHENTIFIE
        
        echo $this->Html->link(' Connexion ',array('controller'=>'utilisateur', 'action'=>'connexion'));
        echo $this->Html->link(' Inscription ',array('controller'=>'utilisateur', 'action'=>'addUser'));

    }else{
        if ($tab['isadmin'] == 0){  //USER 
            
            echo $this->Html->link(' Produit ',array('controller'=>'produit', 'action'=>'index'));
            echo $this->Html->link(' Panier ',array('controller'=>'panier', 'action'=>'index'));
            echo $this->html->link(' Profil ',array('controller'=>'utilisateur', 'action'=>'profil'));
            echo $this->Html->link(' Deconnexion ',array('controller'=>'utilisateur', 'action'=>'deconnexion'));
            

        }else{  //ADMIN          
            echo $this->Html->link(' Profil ',array('controller'=>'utilisateur', 'action'=>'profil'));
            echo $this->html->link('Gestion Client',array(
                'controller'=>'utilisateur', 'action'=>'gestionAdmin'));
            echo $this->Html->link(' Deconnexion ',array('controller'=>'utilisateur', 'action'=>'deconnexion'));

        }
    }
    echo '</ul>';
echo '</nav>';

?>