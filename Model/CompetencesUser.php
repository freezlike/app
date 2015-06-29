<?php

App::uses('AppModel', 'Model');

/**
 * CompetencesUser Model
 *
 * @property Competence $Competence
 * @property User $User
 */
class CompetencesUser extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Competence' => array(
            'className' => 'Competence',
            'foreignKey' => 'competence_id',
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

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        debug($this->data);
        die();
    }

}
