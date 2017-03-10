<?php

class PanierController extends AppController {

    public $uses = array('Panier');      //Model a utiliser
    public $viewPath = 'PanierView';    //le nom du sous repertoire des vue du controlleur

    public function index(){
    	$response = $this->Panier->getPanierUser();
        $this->set('resPanier' , $response);     
    }


    public function beforeFilter(){
        parent::beforeFilter();
		$this->Auth->deny('index');
	}
}



?>