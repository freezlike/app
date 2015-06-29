<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');
App::uses('User', 'Model');

/**
 * CakePHP Commercial
 * @author Nesrine
 */
class Commercial extends User {

    public $virtualFields = array('full_name' => 'CONCAT(Commercial.last_name ," ", Commercial.first_name)');
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'commerciale_id',
            'dependent' => false,
//            'conditions' => array(
//                'id' => 'User.commerciale_id',
//            ),
            'fields' => array('full_name','id','email'),
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    //public $useTable = 'users'; // Ce model utilise une table 'users' de la base de données
    protected $_schema = array(
        'user_count' => array(
            'type' => 'integer',
            'length' => 11
        )
    );

}
