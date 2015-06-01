<?php

App::uses('AppModel', 'Model');

/**
 * Contact Model
 *
 * @property Societe $Societe
 */
class Contact extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'contacts';
    public $virtualFields = array('full_name' => 'CONCAT(last_name ," ", first_name)');
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $displayField = "full_name";

}
