<?php

App::uses('AppController', 'Controller');

class CompetencesController extends AppController {

    public $uses = array('Competence', 'User', 'CompetencesUser', 'Departement');

    public function edit($id = null) {
         if ($id !== null) {
            if (!$this->Competence->exists($id)) {
                throw new NotFoundException(__('Poste Invalide'));
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Competence->save($this->request->data)) {
                $this->Session->setFlash(__('Opération Réussie.'), 'alert');
                return $this->redirect(array('action' => 'edit'));
            } else {
                $this->Session->setFlash(__('Opération Non Réussie.'), 'alert', array('type' => 'error'));
            }
        } else {
            $options = array('conditions' => array('Competence.' . $this->Competence->primaryKey => $id));
            $this->request->data = $this->Competence->find('first', $options);
            
        }
        $this->set('competences', $this->Competence->find('all'));
        $departements = $this->Competence->Departement->find('list');
        $this->set(compact('departements'));
        
    }

    public function edit_e($id = null) {
        $this->set('title_for_layout', __("Compétence"));
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
                //'fields'=>array('User.first_name','User.last_name','User.departement_id')
        ));
        //debug($user);die();
//        debug($user);
//        die();
        $competences = $this->Competence->find('list', array('conditions' => array('departement_id' => $user['Departement']['id'])));
        $this->set(compact('competences', 'user'));
        if ($this->request->is(array('put', 'post'))) {
            unset($this->request->data['Competence']['competences']);
            foreach ($this->request->data['Competence'] as $value) {
                $data = array('id' => null, 'user_id' => $id, 'competence_id' => $value);
                $this->CompetencesUser->save($data);
            }
            $this->Session->setFlash(__('Compétences Affectées avec succès'), 'alert');
            $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
        }
    }

    public function ajout_comp($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Competence->save($this->request->data)) {
                $this->Session->setFlash('Compétence sauvegardé', 'alert');
                // $this->flash('Votre post a été sauvegardé.', '/posts');
                // $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            }
        }
    }
    public function delete($id = null) {
        $this->Competence->id = $id;
        if (!$this->Competence->exists()) {
            throw new NotFoundException(__('Competence Invalide'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Competence->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'edit'));
    }

}
