<?php

App::uses('AppModel', 'Model');

/**
 * Departement Model
 *
 * @property Poste $Poste
 */
class Departement extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Poste' => array(
            'className' => 'Poste',
            'foreignKey' => 'departement_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Competence' => array(
            'className' => 'Competence',
            'foreignKey' => 'departement_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    /**
     * belongsTo associations
     *
     * @var array
     */
//    public $belongsTo = array(
//        'Emploie' => array(
//            'className' => 'Emploie',
//            'foreignKey' => 'departement_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        )
//    );

}
