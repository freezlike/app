<?php
App::uses('AppModel', 'Model');
/**
 * Attachement Model
 *
 * @property Tache $Tache
 */
class Attachement extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


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
		)
	);
}
