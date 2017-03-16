<? php
$tab = AuthComponent::user();

echo '<nav class="navbar navbar-default">'
    echo '<ul class = "nav navbar-nav">'
    if ($tab == NULL){ <!-- NON AUTHENTIFIE -->
    
        echo '<li>Connexion</li>'
        echo '<li>Inscription</li>'
    
    }else{
        if ($tab['isadmin'] == 0){   <!-- USER -->  
            
            echo '<li>Produits</li>'
            echo '<li>Panier</li>'
            echo '<li>Profil</li>'
            echo '<li>Deconnexion</li>'  
            
        }else{  <!-- ADMIN -->
            
            echo '<li>Gestion Profil</li>'
            echo '<li>Gestion Client</li>'
            echo '<li>Deconnexion</li>'

        }
    }
    echo '</ul>'
echo '</nav>'
        
        
        
/*echo $tab = AuthComponent::user();
echo '<nav>';
    echo '<ul>';
    if ($tab == NULL){ // NON AUTHENTIFIE

        echo '<li>Connexion</li>';
        echo '<li>Inscription</li>';

    }else{
        if ($tab['isadmin'] == 0){  //USER 

            echo '<li>Produits</li>';
            echo '<li>Panier</li>';
            echo '<li>Profil</li>';
            echo '<li>Deconnexion</li>';  

        }else{  //ADMIN

            echo '<li>Gestion Profil</li>';
            echo '<li>Gestion Client</li>';
            echo '<li>Deconnexion</li>';

        }
    }
    echo '</ul>';
echo '</nav>';*/