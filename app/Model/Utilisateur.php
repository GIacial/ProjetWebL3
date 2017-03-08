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
        //verification
        if($this->data[$this->alias]['motdepasse'] == "") return false;
        if($this->data[$this->alias]['identifiant'] == "") return false;

        //tra,sformation
        if($this->data[$this->alias]['nom'] == ""){
            $this->data[$this->alias]['nom'] = null;
        }

        if($this->data[$this->alias]['prenom'] == ""){
            $this->data[$this->alias]['prenom'] = null;
        }

        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['motdepasse'] = $passwordHasher->hash($this->data[$this->alias]['motdepasse']);//cryptage

         if(AuthComponent::user() != null){
            if(!AuthComponent::user()['isadmin']){
                 $this->data[$this->alias]['isadmin'] = false;  //si tu n'est pas un admin tu ne peux pas créé d'admin
            }
         }
         else{
             $this->data[$this->alias]['isadmin'] = false;  //si tu n'est pas un admin tu ne peux pas créé d'admin
         }

        return true;
    }
    
    
}

?>
