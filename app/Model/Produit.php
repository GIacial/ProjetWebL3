<?php

/*  Moise Lucille
    Regnier Jérémy
*/
class Produit extends AppModel{

    public $useTable = 'Produits';      //nom de la table sans le prefixe l31617_
    public $primaryKey = 'produit_id';  //nom de la clé primaire
    public $recursive = -1 ;            //distance de parcours des lien

    public $hasMany = array(
        'Panier' => array(
            'className' => 'Panier',        //le nom du model à lié
            'foreignKey' => 'produit_id',   //le nom de la col referente de clé
        ),

    );


//*************************************************************************************************
    
    public function getProduitEnVente (){
       return $this->find('all',array(
           'conditions' => array(
                                    'stock >'=> '0',
           ),
       ));
    }

    
//*************************************************************************************************
    
    public function getStock($produit_id){
      return $this->find('first', array(
          'conditions' => array(
              'produit_id =' => $produit_id   
          )      
      ));
    }
    
}