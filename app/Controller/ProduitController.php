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
    		$this->Produit->Panier->id = null ;
    		debug($this->request->data);
    		/*if($this->Produit->Panier->save($this->request->data)){
    			$this->Flash->success('Ajout au panier effectué');
    			//$this->redirect(array('action' => 'index'));
    		}
    		else{
    			$this->Flash->error('Erreur lors de l\'ajout au panier');
    		}*/
    	}

        $response = $this->Produit->getProduitEnVente();
        $this->set('tab' , $response);
        $this->render('produit');
    }
}