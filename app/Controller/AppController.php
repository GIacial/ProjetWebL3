<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Flash',
								'Auth' => array(
												'loginRedirect' => array(//ou on va en cas de connexion
																		'controller' => 'produit',
																		'action' => 'index',
																		),
												'logoutRedirect' => array(//ou on va en cas de deconnexion
																		'controller' => 'utilisateur',
																		'action' => 'connexion',
																		),
												'authenticate' => array(//comment on s'identifie
																	'Form' => array(
																				'userModel' => 'Utilisateur',	//tab a voir
																				'fields' => array('username' => 'identifiant',
																								 'password' => 'motdepasse'
																								 ),	//colonne a comp
																				//'passwordHasher' => 'Blowfish',	//le type de hasher
																				),
																		),
												'loginAction' => array(//ou il faut aller si il faut s'auth
																		'controller' => 'utilisateur',
																		'action' => 'connexion',
																		),
												//'authorize' => array('Controller'), // active la verification isAuthorize
												'authError' => 'Vous devez être connecté-e pour voir cette page.',//msg si pas auth
												'loginError' => 'Login ou mot de passe incorrect, réessayez svp.',//prob de auth
											),

	);
	
	public function beforeFilter(){
	$this->Auth->allow('index');// les actions 'index' de TOUS les controllers sont accessibles sans avoir besoin d'être 		authentifié
	}
}
