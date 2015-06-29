<?php

App::uses('AppModel', 'Model');

/**
 * Poste Model
 *
 * @property Departement $Departement
 */
class Poste extends AppModel {

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
        'Departement' => array(
            'className' => 'Departement',
            'foreignKey' => 'departement_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
