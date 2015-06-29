<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Emploie $Emploie
 * @property Situation $Situation
 * @property Note $Note
 * @property Competence $Competence
 * @property Diplome $Diplome
 * @property Extra $Extra
 * @property Projet $Projet
 */
class User extends AppModel {

    public $virtualFields = array('full_name' => 'CONCAT(User.last_name ," ", User.first_name)');
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $displayField = "full_name";
    public $useTable = 'users';
    //public $useTable = 'users'; // Ce model utilise une table 'users' de la base de données
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        return array('Group' => array('id' => $groupId));
    }

    protected $_schema = array(
        'id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'username' => array(
            'type' => 'string',
            'length' => 254
        ),
        'password' => array(
            'type' => 'string',
            'length' => 254
        ),
        'matricule' => array(
            'type' => 'string',
            'length' => 254
        ),
        'cnss' => array(
            'type' => 'string',
            'length' => 60
        ),
        'cin' => array(
            'type' => 'string',
            'length' => 8
        ),
        'situation_id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'group_id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'departement_id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'poste_id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'commerciale_id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'first_name' => array(
            'type' => 'string',
            'length' => 254
        ),
        'last_name' => array(
            'type' => 'string',
            'length' => 254
        ),
        'born_day' => array(
            'type' => 'date',
        // 'length' => 11
        ),
        'telephone' => array(
            'type' => 'string',
            'length' => 254
        ),
        'situation_id' => array(
            'type' => 'integer',
            'length' => 11
        ),
        'email' => array(
            'type' => 'string',
            'length' => 254
        ),
        'permis' => array(
            'type' => 'boolean',
            //'length' => 11
            'default' => 0
        ),
        'cv_url' => array(
            'type' => 'string',
            'length' => 254
        ),
        'hire_date' => array(
            'type' => 'date',
        //'length' => 11
        ),
        'rib' => array(
            'type' => 'string',
            'length' => 254
        ),
        'banque' => array(
            'type' => 'string',
            'length' => 254
        ),
    );

    /**
     * hasOne associations
     *
     * @var array
     */
    public $hasOne = array(
        'Commercial' => array(
            'className' => 'Commercial',
            'foreignKey' => 'commerciale_id',
//            'conditions' => array(
//                'User.commerciale_id' => 'Commerciale.id'
//            ),
        //  'type'=>'inner'
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
        ),
        'Situation' => array(
            'className' => 'Situation',
            'foreignKey' => 'situation_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Poste' => array(
            'className' => 'Poste',
            'foreignKey' => 'poste_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Societe' => array(
            'className' => 'Societe',
            'foreignKey' => 'societe_id',
            'conditions' => '',
            //'fields' => array('raison_social','forme_juridique'),
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Note' => array(
            'className' => 'Note',
            'foreignKey' => 'user_id',
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
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Competence' => array(
            'className' => 'Competence',
            'joinTable' => 'competences_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'competence_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Diplome' => array(
            'className' => 'Diplome',
            'joinTable' => 'diplomes_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'diplome_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Projet' => array(
            'className' => 'Projet',
            'joinTable' => 'projets_users',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'projet_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    public function beforeSave($options = null) {
        parent::beforeSave($options = null);
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

//        public function afterSave($created, $options = array()) {
//            parent::afterSave($created, $options);
//            $data = $this->data;
//            $user_id = $data['User']['id'];
//            
//        }
}
