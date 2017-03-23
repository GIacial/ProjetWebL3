<?php

/**
 * Created by PhpStorm.
 * User: jregnier
 * Date: 22/02/17
 * Time: 15:34
 */
class ProduitController extends AppController {

    public $uses = array('Produit');      //Model a utiliser
    public $viewPath = 'produitView';    //le nom du sous repertoire des vue du controlleur

    public function index(){
    	if($this->request->is('post')){
    		debug($this->request->data);
    		if(isset($this->request->data['Panier']['produit_id'])){
    			$ok = true ;
    			for ($i=0 ; $i< count($this->request->data['Panier']['produit_id']) && $ok ; $i++){

    				$this->Produit->Panier->id = null ;
    				if($this->request->data['Panier']['nombre'][$i] != 0){

    						$response['Panier']['nombre'] = $this->request->data['Panier']['nombre'][$i];
    						$response['Panier']['produit_id'] = $this->request->data['Panier']['produit_id'][$i];
    					
    					
    					$ok = $this->Produit->Panier->addPanier($response) ;

    				}

    			}
	    		
    		}
    		if($ok){
    			$this->Flash->success('Ajout au panier effectué');
    			$this->redirect(array('action' => 'index'));
    		}
    		else{
    			$this->Flash->error('Erreur lors de l\'ajout au panier');
    		}
    	}

        $response = $this->Produit->getProduitEnVente();
        $this->set('tab' , $response);
        $this->render('produit');
    }

     public function isAuthorized($user){
      
        if(!$user['isadmin']) return true;
        
        return parent::isAuthorized($user);

    }
}