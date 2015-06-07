<?php

App::uses('AppController', 'Controller');

class DiplomesController extends AppController {

    public $uses = array('Diplome', 'User', 'DiplomesUser');

    public function edit($id = null) {
        $this->set('title_for_layout', __("Diplome"));
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
                //'fields'=>array('User.first_name','User.last_name','User.departement_id')
        ));
        //debug($user);die();
//        debug($user);
//        die();
        $diplomes = $this->Diplome->find('list');
        $this->set(compact('diplomes', 'user'));
    }

    public function edit_e($id = null) {
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id)
        ));
        $this->set(compact('user'));
        if ($this->request->is(array('put', 'post'))) {

            unset($this->request->data['Diplome']['sdiplomes']);
            unset($this->request->data['Diplome']['diplomes']);
            foreach ($this->request->data['Diplome'] as $value) {
                $data = array('id' => null, 'user_id' => $id, 'diplome_id' => $value);
                $this->DiplomesUser->save($data);
            }
            $this->Session->setFlash(__('Diplômes Affectées avec succès'), 'alert');
            $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
        } else {
            $sql = "SELECT DISTINCT `source` FROM `diplomes`";
            $d = $this->Diplome->query($sql);
            $diplomes = array();
            foreach ($d as $k => $value) {
                $v = $value['diplomes']['source'];
                $diplomes[$v] = $v;
                //array_push($diplomes[$v], $v[$v]);
            }
            $this->set(compact('diplomes'));
        }
    }

    public function setTitre($source = null) {
        $sdiplomes = $this->Diplome->find('list', array(
            'conditions' => array('Diplome.source' => $source),
            'fields' => array('Diplome.id', 'Diplome.name')
        ));
        $this->set(compact('sdiplomes'));
    }

    public function ajout_diplome($id = null) {
        $dip = $this->Diplome->find('all');
        //debug($dip); die();
        if ($this->request->is(array('put', 'post'))) {
            if (!empty($this->request->data)) {
                if ($this->Diplome->save($this->request->data)) {
                    $this->Session->setFlash('Diplome sauvegardé', 'alert');
                }
            }
        } else {
            $this->Diplome->id = $id;
            $this->request->data = $this->Diplome->read();
            // debug($dip); die();
        }
        $this->set('diplomes', $this->Diplome->find('all'));
//         $diplomes = $this->Diplome->find('all');
        $this->set(compact('dip'));
        // debug($diplomes); die();
    }

    public function delete($id = null) {
        $this->Diplome->id = $id;
        if (!$this->Diplome->exists()) {
            throw new NotFoundException(__('Invalid Diplome'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Diplome->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'ajout_diplome'));
    }

}
