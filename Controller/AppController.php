<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    //public $components = array('Session','Auth','RequestHandler');
    public $components = array(
        'Acl',
        'RequestHandler',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'login');
        $this->Auth->allow('initDB');
        //$this->initDB();
    }

    public function ifLogin() {
        $auth = $this->Auth->user();
        if (!empty($auth)) {
            $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        }
        return null;
    }

//    public function isAuthorized($user) {
//        // Admin peut accéder à toute action
//        if (isset($user['role']) && $user['role'] === 'admin') {
//            return true;
//        }
//
//        // Refus par défaut
//        return false;
//    }

    public function returnColor($value = null) {
        if ($value < 21) {
            return 'danger';
        }
        if ($value >= 21 && $value < 31) {
            return 'warning';
        }
        if ($value >= 31 && $value < 51) {
            return 'info';
        }
        if ($value >= 51 && $value < 61) {
            return 'primary';
        }
        if ($value >= 61) {
            return 'success';
        }
    }

    public function returnBgColor($value = null) {
        if ($value < 21) {
            return 'danger';
        }
        if ($value >= 21 && $value < 31) {
            return 'warning';
        }
        if ($value >= 31 && $value < 51) {
            return 'info';
        }
        if ($value >= 51 && $value < 61) {
            return 'primary';
        }
        if ($value >= 61) {
            return 'success';
        }
    }

}
