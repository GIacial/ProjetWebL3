<?php

class Utilisateur extends appModel
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
    
    //public $hasAndBelongsToMany = array(); // non utilisé dans ce cours
    //public $hasOne = array();              // non utilisé dans ce cours
}
