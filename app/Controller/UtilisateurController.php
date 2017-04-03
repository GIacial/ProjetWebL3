<?php

/*  
    Moise Lucille
    Regnier Jérémy
*/

class UtilisateurController extends AppController {

    public $uses = array('Utilisateur');     //Model a utiliser
    public $components = array('Cookie');
    public $viewPath = 'utilisateurView';    //le nom du sous repertoire des vue du controlleur

    
//*************************************************************************************************
    
    public function index(){

    }

//*************************************************************************************************
    
    public function connexion(){
        $LastLogin ='';
        $LastLogin = $this->Cookie->read("LastLogin");
        $this->set("LastLogin", $LastLogin);

    	if($this->request->is('post')){
    		if($this->Auth->login()){
                $this->Cookie->write("LastLogin",$this->request->data['Utilisateur']['identifiant']);
    			$this->redirect($this->Auth->redirectUrl());
    		}
            if($this->request->data['Utilisateur']['identifiant'] == ''){
    		  $this->Flash->error('Veuillez entrer votre identifiant');
            }
            else{
                if($this->request->data['Utilisateur']['motdepasse'] == ''){

                    $this->Flash->error('Veuillez indiquer un mot de passe');
                }
                else{
                    $this->Flash->error('Impossible de vous identifier');
                }
            }
    	}

    }

//*************************************************************************************************
    
    public function deconnexion(){
    	$this->redirect($this->Auth->logout());
    }

//*************************************************************************************************
    
    public function addUser(){
    	if($this->request->is('post')){
    		$this->Utilisateur->id = null ;
    		if($this->Utilisateur->addUser($this->request->data)){
    			$this->Flash->success('Vous êtes inscrit');
    			$this->redirect(array('action' => 'index'));
    		}
            debug($this->request->data);
            if($this->request->data['Utilisateur']['identifiant'] == ''){
              $this->Flash->error('Veuillez entrer votre identifiant');
            }
            else{
                if($this->request->data['Utilisateur']['motdepasse'] == ''){

                        $this->Flash->error('Veuillez indiquer un mot de passe');
                }
                else{
                       $this->Flash->error('Erreur lors de l\'ajout de l\'utilsateur');
                }
            }
    		
    	}
    }
    
//*************************************************************************************************
 
    public function profil(){
        if($this->request->is('post')){
            $this->Utilisateur->id = $this->Auth->user()['id'];
            if ($this->request->data['Utilisateur']['motdepasse']==''){
                unset ($this->request->data['Utilisateur']['motdepasse']);
            }
            if($this->Utilisateur->save($this->request->data)){
                $this->Flash->success('Vous avez modifié votre profil');
            }else{
                $this->Flash->error('Erreur lors de la modification du profil');
            }
        }
    }
    
//*************************************************************************************************
 
    public function gestionAdmin(){
        $this->set('user' , $this->Utilisateur->find('all'));  
    }
    
//*************************************************************************************************
 
    public function suppUser($id){
        if($id != $this->Auth->user()['id']){

            $this->Utilisateur->Panier->viderPanier($id);
            $this->Utilisateur->delete($id,false);
            $this->Flash->success('Vous avez supprimé le profil');
        }
        else{
             $this->Flash->error('Erreur lors de la suppression du profil');
        }
        $this->redirect(array('action' => 'gestionAdmin'));
    }
    
//*************************************************************************************************
    
    public function beforeFilter(){
    	parent::beforeFilter();
        $this->Auth->allow('index');
		$this->Auth->allow('addUser');
        // les actions 'index' de TOUS les controllers sont accessibles sans avoir besoin d'être 		authentifié
	}

    //*************************************************************************************************
 
     public function isAuthorized($user){
        
        if ($this->action === 'deconnexion')return true;
        if ($this->action === 'addUser')return true;
        if ($this->action === 'connexion')return true;
        if ($this->action === 'index')return true;
        if ($this->action === 'gestionAdmin'){
            if($user['isadmin']) return true;
        }
        if ($this->action === 'suppUser'){
            if($user['isadmin']) return true;
        }
        if ($this->action === 'profil')return true; //si pas co deja rediriger vers connexion


        return parent::isAuthorized($user);

    }
}



?>