<?php

App::uses('AppController', 'Controller');

class PaymentsController extends AppController {

    public $uses = array('Competence', 'User', 'CompetencesUser', 'Departement');

    public function edit($id = null) {
        
    }
    public function virement ($id = null){
        //debug($id);die();
        $users = $this->User->find('first', array(
            'conditions' => array('User.id' => $id)
            ));
        $this->set(compact('users'));
        
    }

    public function payment_dep($id = null) {
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

    /**
     * user fiche (+salair)
     * @param type $id
     * @throws Exception
     * return user
     */
    public function salair_emp($id = null) {

        if ($id !== null) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new Exception(__("User invalide"), 404);
            }
        }
        $user = $this->User->read();
        $sal = $user['Poste']['salaire'];
        $extra = 0;
        foreach ($user['Projet'] as $k => $p) {
            $extra +=$p['ProjetsUser']['extras'];
        }
        $som = $sal + $extra;
        $user['User']['salaire'] = $som;
        //$user = $user['User'];
        $this->set(compact('user'));
    }

    public function ordreVirement($dep_id = null) {
        $this->User->recursive = 0;
        header('Access-Control-Allow-Origin: *');
        $users = $this->User->find('all', array(
            'conditions' => array('User.departement_id' => $dep_id),
            'fields' => array('User.id')
        ));

        $this->set(compact('users'));
    }

    public function indexdep() {
        $deps = $this->Departement->find('all');
        $this->set(compact('deps'));
    }
     public function tablevirement() {
     
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

}
