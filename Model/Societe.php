<?php
App::uses('AppModel', 'Model');
/**
 * Societe Model
 *
 * @property Contact $Contact
 */
class Societe extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'societe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
