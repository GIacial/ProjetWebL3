<?php

/**
 * Created by PhpStorm.
 * User: jregnier
 * Date: 22/02/17
 * Time: 15:17
 */
class Produit extends AppModel{

    public $useTable = 'Produits';   //nom de la table sans le prefixe tp
    public $primaryKey = 'produit_id';  //nom de la clé primaire
    public $recursive = -1 ; //distance de parcours des lien

    public $hasMany = array(
        'Panier' => array(
            'className' => 'Panier',    //le nom du model à lié
            'foreignKey' => 'produit_id',           //le nom de la col referente de clé
        ),

    );


    public function getProduitEnVente (){
       return $this->find('all',array(
           'conditions' => array(
                                    'stock >'=> '0',
           ),
       ));
    }

    public function getStock($produit_id){
      return $this->find('first', array(  'conditions' => array('produit_id =' => $produit_id
                                                                )
                                        )
                        );
    }
}