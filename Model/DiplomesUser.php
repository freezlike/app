<?php
App::uses('AppModel', 'Model');
/**
 * DiplomesUser Model
 *
 * @property Diplome $Diplome
 * @property User $User
 */
class DiplomesUser extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Diplome' => array(
			'className' => 'Diplome',
			'foreignKey' => 'diplome_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
}
