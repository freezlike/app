<?php

App::uses('AppController', 'Controller');

class PostesController extends AppController {

    public $uses = array('Poste', 'User', 'ProjetsUser', 'Departement');

    public function index() {
        $this->Poste->recursive = 0;
        $this->set('postes', $this->Poste->find('all'));
    }

    public function edit($id = null) {

        if ($id !== null) {
            if (!$this->Poste->exists($id)) {
                throw new NotFoundException(__('Poste Invalide'));
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Poste->save($this->request->data)) {
                $this->Session->setFlash(__('Opération Réussie.'), 'alert');
                return $this->redirect(array('action' => 'edit'));
            } else {
                $this->Session->setFlash(__('Opération Non Réussie.'), 'alert', array('type' => 'error'));
            }
        } else {
            $options = array('conditions' => array('Poste.' . $this->Poste->primaryKey => $id));
            $this->request->data = $this->Poste->find('first', $options);
            
        }
        $this->set('postes', $this->Poste->find('all'));
        $departements = $this->Poste->Departement->find('list');
        $this->set(compact('departements'));
    }

    public function edit_e($id = null) {
        $this->set('title_for_layout', __("Poste"));
        if($id !== null){
            if(!$this->User->exists($id)){
                throw new Exception(__("Utilisateur Invalide"));
            }
        }
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
        ));
        if ($this->request->is(array('put', 'post'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Poste Affecté avec succès'), 'alert');
                $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
            } else {
                $this->Session->setFlash(__('Poste Non Affecté'), 'alert', array('type' => 'error'));
            }
        } else {
            $this->request->data = $user;
            $postes = $this->Poste->find('list', array('conditions' => array('departement_id' => $user['Departement']['id'])));
            $this->set(compact('postes', 'user'));
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Poste->id = $id;
        if (!$this->Poste->exists()) {
            throw new NotFoundException(__('Poste Invalide'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Poste->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'edit'));
    }

}
