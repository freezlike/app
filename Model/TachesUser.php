<?php
App::uses('AppModel', 'Model');
/**
 * TachesUser Model
 *
 * @property Tache $Tache
 * @property User $User
 */
class TachesUser extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tache' => array(
			'className' => 'Tache',
			'foreignKey' => 'tache_id',
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
