<?php

App::uses('AppController', 'Controller');

class EmploiesController extends AppController {

    public $uses = array('Emploie','Poste','User');

    public function edit($id = null) {
        
    }

      public function edit_e($id = null) {
        $this->set('title_for_layout', __("Poste"));
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
                //'fields'=>array('User.first_name','User.last_name','User.departement_id')
        ));
        //debug($user);die();
//        debug($user);
//        die();
        $postes = $this->Poste->find('list', array('conditions' => array('departement_id' => $user['Departement']['id'])));
        $this->set(compact('postes', 'user'));
        if ($this->request->is(array('put', 'post'))) {
            unset($this->request->data['Poste']['postes']);
            foreach ($this->request->data['Poste'] as $value) {
                $data = array('id' => null, 'user_id' => $id, 'poste_id' => $value);
//                    debug($data);
//                    die();
                $this->User->save($data);
            }
            $this->Session->setFlash(__('Poste Affectées avec succès'), 'alert');
            $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
        }
    }

}
