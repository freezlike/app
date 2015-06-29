<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP CommercialsController
 * @author Nesrine
 */
class CommercialsController extends AppController {

    public $uses = array('Commercial', 'Group');

    public function GroupComID() {
        $group = $this->Group->find('first', array(
            'conditions' => array('Group.name' => 'com')
        ));
        return $group['Group']['id'];
    }

    public function index() {
        $this->Commercial->recursive = -1;
        $commercials = $this->Commercial->find('all', array(
            'conditions' => array('Commercial.group_id' => $this->GroupComID()),
            'contain'=>array('User')
        ));
//        $sql = "SELECT * FROM users as Commercial LEFT
//JOIN users as User
//ON User.commerciale_id = Commercial.id
//where Commercial.group_id = 2;";
//        $commercials = $this->Commercial->query($sql);
        $this->set(compact('commercials'));
    }

}
