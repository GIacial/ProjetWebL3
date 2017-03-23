<?php

class UtilisateurController extends AppController {

    public $uses = array('Utilisateur');      //Model a utiliser
    public $viewPath = 'UtilisateurView';    //le nom du sous repertoire des vue du controlleur

    public function index(){

    }

    public function connexion(){
    	if($this->request->is('post')){
    		debug($this->request->data);
    		if($this->Auth->login()){
    			$this->redirect($this->Auth->redirectUrl());
    		}
    		$this->Flash->error('Impossible de vous identifier');
    	}

    }

    public function deconnexion(){
    	$this->redirect($this->Auth->logout());
    }

    public function addUser(){
    	if($this->request->is('post')){
    		$this->Utilisateur->id = null ;
    		if($this->Utilisateur->save($this->request->data)){
    			$this->Flash->success('Vous êtes inscrit');
    			$this->redirect(array('action' => 'index'));
    		}
    		$this->Flash->error('Erreur lors de l\'ajout de l\'utilsateur');
    	}
    }

    public function profil(){
        if($this->request->is('post')){
            $this->Utilisateur->id = $this->Auth->user()['id'];
            if($this->Utilisateur->save($this->request->data)){
                $this->Flash->success('Vous avez modifié votre profil');
            }else{
                $this->Flash->error('Erreur lors de la modification du profil');
            }
        }
    }
    
    public function beforeFilter(){
    	parent::beforeFilter();
		$this->Auth->allow('addUser');// les actions 'index' de TOUS les controllers sont accessibles sans avoir besoin d'être 		authentifié
	}
}



?>