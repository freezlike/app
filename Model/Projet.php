<?php

App::uses('AppModel', 'Model');

/**
 * Projet Model
 *
 */
class Projet extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $hasAndBelongsToMany = array(
        'User' => array(
            'className' => 'User',
            'joinTable' => 'projets_users',
            'foreignKey' => 'projet_id',
            'associationForeignKey' => 'user_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Departement' => array(
            'className' => 'Departement',
            'foreignKey' => 'departement_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
