<?php

App::uses('AppController', 'Controller');

class DesignationsController extends AppController {

    public $uses = array('Designation');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_index() {
        $this->set('produits', $this->Designation->find('all'));
    }

    /**
     * Add / Edit Product under Admin
     */
    public function admin_edit($id = null) {
        $this->Designation->recursive = 0;
        if ($id !== null) {
            $this->Designation->id = $id;
            if (!$this->Designation->exists($id)) {
                throw new Exception("Designation Invalide");
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Designation->save($this->request->data)) {
                $this->Session->setFlash(__('Opération réussi'), 'notif');
                $this->redirect(array('controller' => 'designations', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Opération réussi'), 'notif', array('type' => 'error'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $this->Designation->read();
        }
    }

    public function admin_delete($id = null) {
        if ($id !== null) {
            
        } else {
            
        }
    }

}