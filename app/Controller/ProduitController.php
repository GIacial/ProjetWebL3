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

        $response = $this->Produit->getProduitEnVente();
        $this->set('tab' , $response);
        $this->render('produit');
    }
}