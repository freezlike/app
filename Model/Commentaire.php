<?php

App::uses('AppModel', 'Model');

/**
 * Commentaire Model
 *
 * @property Tache $Tache
 */
class Commentaire extends AppModel {
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
