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
            //$this->html->link('Profil',array('controller'=>profil, 'action'=>fonction));
            echo $this->Html->link(' Deconnexion ',array('controller'=>'utilisateur', 'action'=>'deconnexion'));
            

        }else{  //ADMIN          
            //$this->html->link('Profil',array('controller'=>nomcontroller, 'action'=>fonction));
            //$this->html->link('Gestion Client',array('controller'=>nomcontroller, 'action'=>fonction));
            $this->Html->link(' Deconnexion ',array('controller'=>utilisateur, 'action'=>deconnexion));

        }
    }
    echo '</ul>';
echo '</nav>';

?>