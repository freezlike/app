<?php

App::uses('AppModel', 'Model');

/**
 * Facture Model
 *
 * @property User $User
 * @property Payment $Payment
 * @property Devise $Devise
 * @property Detail $Detail
 */
class Facture extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'code_facture';



    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'recursive' => -2,
            'fields' => array('id', 'societe_id', 'full_name','commerciale_id','user_count'),
            'order' => ''
        ),
        'Commercial' => array(
            'className' => 'Commercial',
            'foreignKey' => 'commerciale_id',
            'conditions' => '',
            'fields' => array('id', 'full_name'),
            'order' => ''
        ),
        'Payment' => array(
            'className' => 'Payment',
            'foreignKey' => 'payment_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Devise' => array(
            'className' => 'Devise',
            'foreignKey' => 'devise_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * $hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array('Designation');

}
