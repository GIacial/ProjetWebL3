<?php

class UtilisateurController extends AppController {

    public $uses = array('Utilisateur');      //Model a utiliser
    public $viewPath = 'UtilisateurView';    //le nom du sous repertoire des vue du controlleur

    public function index(){
    	$this->redirect(array('action' => 'connexion'));
    }

    public function connexion(){
    	if($this->request->is('post')){
    		if($this->Auth->login()){
    			$this->redirect($this->Auth->redirectUrl());
    		}
    		$this->Flash->error('Impossible de vous identifier');
    	}
    }

    public function deconnexion(){
    	$this->redirect($this->Auth->logout());
    }
}



?>