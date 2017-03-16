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

    public function getProduitDansPanier($produit_id){
        return $this->find('first',array(
                                        'conditions'=> array( //where
                                                            'produit_id =' => $produit_id,
                                                            'client_id =' => AuthComponent::user(),
                                        
                                                            )
                                        )
                            );
    }

    function beforeSave($options = array()){
        if($this->data[$this->alias]['nombre']<=0) return false;
         $this->data[$this->alias]['client_id'] = AuthComponent::user()['id'];
        
        return true;
    }


     private function beforeSaveAddPanier($data){
        if($data[$this->alias]['nombre']> $this->Produit->getStock($data[$this->alias]['produit_id'])[$this->Produit->alias]['stock']) return null;

        $response = $this->getProduitDansPanier($data[$this->alias]['produit_id']);
        if(isset($response[$this->alias])){ //deja dans le panier

            $data[$this->alias]['nombre'] = $data[$this->alias]['nombre'] + $response[$this->alias]['nombre'];
            $this->id = $response[$this->alias]['panier_id'];
            
        }
        return $data;
    }

    private function afterSaveAddPanier($data){
        //diminution des stocks
        $res = $this->Produit->getStock($data[$this->alias]['produit_id']);
        $res[$this->Produit->alias]['stock'] -= $data[$this->alias]['nombre'];
        $this->Produit->save($res);
    }

    public function addPanier ($data){
        $data = $this->beforeSaveAddPanier($data);
        if($data == null) return false;
        if(!$this->save($data)) return false;
        $this->afterSaveAddPanier($data);
        return true;
    }

    public function supprimerPanier($panier_id){
        $res = $this->find('first' ,array(
                                        'conditions'=> array( //where
                                                            'panier_id =' => $panier_id,
                                                            'client_id =' => AuthComponent::user(),
                                        
                                                            )
                                        ));
        debug($res);
        if(isset ($res[$this->alias])){
            $this->delete($panier_id,false);
            $prod = $this->Produit->getStock($res[$this->alias]['produit_id']);
            $this->Produit->id = $res[$this->alias]['produit_id'];
            $prod[$this->Produit->alias]['stock'] = $prod[$this->Produit->alias]['stock']+$res[$this->alias]['nombre'];
            $this->Produit->save($prod);

            return true;
        }
        else{
            return false;
        }
    }
}