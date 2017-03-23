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
        if($this->data[$this->alias]['identifiant'] == "") return false;

        //tra,sformation
        if($this->data[$this->alias]['nom'] == ""){
            $this->data[$this->alias]['nom'] = null;
        }

        if($this->data[$this->alias]['prenom'] == ""){
            $this->data[$this->alias]['prenom'] = null;
        }

        //cryptage

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

    function beforeSaveAddUser($data){
        if($data[$this->alias]['motdepasse'] == "") return null;
        $passwordHasher = new BlowfishPasswordHasher();
        $data[$this->alias]['motdepasse'] = $passwordHasher->hash($data[$this->alias]['motdepasse']);
        return $data;
    }

    function addUser($data){
        $data = $this->beforeSaveAddUser($data);
        if($data == null) return false;
        $this->save($data);
        return true;
    }
    
    
}

?>
