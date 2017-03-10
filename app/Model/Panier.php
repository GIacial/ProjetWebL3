<?php

/**
 * Created by PhpStorm.
 * User: jregnier
 * Date: 22/02/17
 * Time: 15:23
 */
class Panier extends AppModel{

    public $useTable = 'Panier';   //nom de la table sans le prefixe tp
    public $primaryKey = 'panier_id';  //nom de la clé primaire
    public $recursive = -1 ; //distance de parcours des lien

    public $belongsTo = array(
        'Produit' => array(
            'className' => 'Produit',    //le nom du model à lié
            'foreignKey' => 'produit_id',           //le nom de la col referente de clé
        ),
        'Utilisateur' => array(
            'className' => 'Utilisateur',    //le nom du model à lié
            'foreignKey' => 'client_id',           //le nom de la col referente de clé
        ),
    );
    
    public function getPanierUser (){
        return $this->find('all', array(
            'conditions'=> array( //where
                'nombre >' => 0,
                'client_id =' => AuthComponent::user(),
            
            ),
            'recursive'=> '1', //Join 1 table de distance
            
            
        )                  
        );
        
    }

    function beforeSave($options = array()){
        if($this->data[$this->alias]['nombre']<=0) return false;
        if($this->data[$this->alias]['nombre']> $this->data[$this->alias]['stock']) return false;
        $this->data[$this->alias]['client_id'] = AuthComponent::user()['id'];
        return true;
    }
}