<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');   //pour le hasher

class Utilisateur extends AppModel
{
	public $useTable = 'utilisateurs';
    public $primaryKey = 'id';
    public $recursive = -1;
    
    public $belongsTo = array();
    
    public $hasMany = array(
    	'Panier' => array(
    		'className' => 'Panier',
    		'foreignKey' => 'client_id',
        ),
    
    );

    function beforeSave($options = array()){

        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['motdepasse'] = $passwordHasher->hash($this->data[$this->alias]['motdepasse']);
        $this->data[$this->alias]['isadmin'] = 0;
        return true;
    }
    
    
}

?>
