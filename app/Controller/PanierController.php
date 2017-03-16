<?php

class PanierController extends AppController {

    public $uses = array('Panier');      //Model a utiliser
    public $viewPath = 'PanierView';    //le nom du sous repertoire des vue du controlleur

    public function index(){
    	$response = $this->Panier->getPanierUser();
        $this->set('resPanier' , $response);     
    }

    public function supprimerArticle($numLine){
        $numLine += 0;
        if($this->Panier->supprimerPanier($numLine)){
            $this->Flash->success("Suppression effectué");
        }
        else{
            $this->Flash->error("La Suppression à échoué");
        }
        
        $this->redirect('index');
    }

    public function viderPanier(){
        $res = $this->Panier->getPanierUser();
        for ($i =0 ; $i < count ($res) ; $i++){
            $this->Panier->supprimerPanier($res[$i]['Panier']['panier_id']);
        }
        $this->Flash->success("Suppression effectué");
        
        $this->redirect('index');
    }

    public function achatPanier(){
        $res = $this->Panier->getPanierUser();
        for ($i =0 ; $i < count ($res) ; $i++){
            $this->Panier->supprimerPanier($res[$i]['Panier']['panier_id'] , true);
        }
        $this->Flash->success("Achat effectué");
        $this->redirect('index');
    }


    public function beforeFilter(){
        parent::beforeFilter();
		$this->Auth->deny('index');
	}
}



?>