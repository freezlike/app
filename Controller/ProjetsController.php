<?php

App::uses('AppController', 'Controller');

class ProjetsController extends AppController {

    public $uses = array('Projet', 'User', 'ProjetsUser', 'Departement', 'Tache');

    public function index() {
//        debug($this->Auth->user());
//        die();
        $this->Projet->recursive = 0;
        $this->set('projets', $this->Projet->find('all'));
    }

    public function delete_pu($id_m = null, $id = null) {
        $message = '';
//        $p = $this->request->data(array('projet_id' => 'ProjectID', 'user_id' => 'MemberID'));
        $this->ProjetsUser->recursive = -1;
        if ($this->request->is('ajax')) {
            $pu = $this->ProjetsUser->find('first', array(
                'conditions' => array('ProjetsUser.projet_id' => $id, 'ProjetsUser.user_id' => $id_m)
            ));
            if ($this->ProjetsUser->delete($pu['ProjetsUser']['id'])) {
                $message = 'success';
            } else {
                $message = 'error';
            }
            echo json_encode($message);
            die();
        }
    }

    public function state_projet() {
        
    }

    public function edit($id = null) {
        if ($id !== null) {
            if (!$this->Projet->exists($id)) {
                throw new NotFoundException(__('Projet Invalide'));
            }
        }

        if ($this->request->is(array('post', 'put'))) {
            $usersProject = $this->request->data['ProjetsUser'];
            if ($this->Projet->save($this->request->data)) {
                $last_idP = null;
                //debug($last_idP);
                if (!empty($this->request->data['Projet']['id'])):
                    $last_idP = $this->request->data['Projet']['id'];
                else:
                    $last_idP = $this->Projet->getLastInsertID();
                endif;
                foreach ($usersProject as $up):
                    $data = array('id' => null, 'projet_id' => $last_idP, 'user_id' => $up['user_id'], 'rendement' => '0', 'extra' => '0', 'tache' => 'empty');
                    $this->ProjetsUser->save($data);
                endforeach;
                $this->Session->setFlash(__('Opération Réussie.'), 'alert');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
            }
        } else {
            $options = array('conditions' => array('Projet.' . $this->Projet->primaryKey => $id));
            $this->request->data = $this->Projet->find('first', $options);
        }
        $departements = $this->Projet->Departement->find('list');
        //debug($departements);
        //$users = $this->User->find('list');
        //if ($this->request->is(array('post', 'put'))):
        if (!empty($this->request->data)) {
            $usersAll = $this->User->find('all', array(
                'conditions' => array('User.departement_id' => $this->request->data['Departement']['id'])
            ));
            $users = array();
            foreach ($usersAll as $k => $user):
                if (!empty($user['Projet'])) {
                    foreach ($user['Projet'] as $p):
                        if ($p['id'] === $id) {
                            unset($usersAll[$k]);
                        }
                    endforeach;
                }
            endforeach;
            foreach ($usersAll as $k => $user):
                $users[$user['User']['id']] = $user['User']['full_name'];
            endforeach;
        }
        // debug($users);
//         else 
//            
//                $users = $this->User->find('list');
//         
        $this->set(compact('departements', 'users'));
    }

    public function reset_users($departement_id = null, $projet_id = null) {
        $usersAll = $this->User->find('all', array(
            'conditions' => array('User.departement_id' => $departement_id)
        ));
        $users = array();
        foreach ($usersAll as $k => $user):
            if (!empty($user['Projet'])) {
                foreach ($user['Projet'] as $p):
                    if ($p['id'] === $projet_id) {
                        unset($usersAll[$k]);
                    }
                endforeach;
            }
        endforeach;
        foreach ($usersAll as $k => $user):
            $users[$user['User']['id']] = $user['User']['full_name'];
        endforeach;

        $this->set(compact('users'));
    }

    public function dep_users($departement_id = null, $projet_id = null) {
        $usersAll = $this->User->find('all', array(
            'conditions' => array('User.departement_id' => $departement_id)
        ));
        $users = array();
        foreach ($usersAll as $k => $user):
            if (!empty($user['Projet'])) {
                foreach ($user['Projet'] as $p):
                    if ($p['id'] === $projet_id) {
                        unset($usersAll[$k]);
                    }
                endforeach;
            }
        endforeach;
        foreach ($usersAll as $k => $user):
            $users[$user['User']['id']] = $user['User']['full_name'];
        endforeach;

        $this->set(compact('users'));
    }

    public function edit_e($id = null) {
        $this->set('title_for_layout', __("Projet"));
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
                //'fields'=>array('User.first_name','User.last_name','User.departement_id')
        ));
        //debug($user);die();
//        debug($user);
//        die();
        $projets = $this->Projet->find('list', array('conditions' => array('departement_id' => $user['Departement']['id'])));
        //debug($projets[1]); die();
        //$taches = $this->Tache->find('list', array('conditions' => array('projet_id' => $a )));
        $this->set(compact('projets', 'user', 'taches'));
        if ($this->request->is(array('put', 'post'))) {
            unset($this->request->data['Projet']['projets']);
            //unset($this->request->data['ProjetUser']['tache']);
            unset($this->request->data['ProjetUser']['extras']);
            unset($this->request->data['ProjetUser']['rendement']);
            // debug($this->request->data);
            $datas = array();
            foreach ($this->request->data['Projet'] as $k => $value) {
                $data = array(
                    'id' => null,
                    'user_id' => $id,
                    'projet_id' => $value,
                    'tache' => '',
                    'extras' => '',
                    'rendement' => '',
                );
                array_push($datas, $data);
            }
            $i = count($datas);
            $j = 0;
            //debug($i);
            foreach ($this->request->data['ProjetUser'] as $value) {
                //debug($value);
                if ($j <= $i) {
                    // $datas[$j]['tache'] = $value['Tache'];
                    $datas[$j]['extras'] = $value['Extras'];
                    $datas[$j]['rendement'] = $value['Rendement'];
                    $j++;
                }
            }
            $tests = array();
            foreach ($datas as $data) {
                if ($this->ProjetsUser->save($data)) {
                    array_push($tests, true);
                } else {
                    array_push($tests, false);
                }
            }
            if (in_array(false, $tests)) {
                $this->Session->setFlash(__('Projets Non Affectées'), 'alert', array('type' => 'error'));
            } else {
                $this->Session->setFlash(__('Projets Affectées avec succès'), 'alert');
                $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
            }
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
        $this->Projet->id = $id;
        if (!$this->Projet->exists()) {
            throw new NotFoundException(__('Projet Invalide'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->Projet->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getlistProjet($id = null) {
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id),
                //'fields'=>array('User.first_name','User.last_name','User.departement_id')
        ));
        echo json_encode($user['Projet']);
    }

    public function setTache($source = null) {
        //debug($source); die();
        $pro = $this->Projet->find('first', array(
            'conditions' => array('Projet.name' => $source)
        ));

        $ident = $pro['Projet']['id'];
        $staches = $this->Tache->find('list', array(
            'conditions' => array('Tache.projet_id' => $ident),
            'fields' => array('Tache.name')
        ));



        $this->set(compact('staches', 'pro'));
    }

    public function add_member() {
        if ($this->request->is('ajax')) {
            if ($this->ProjetsUser->save($this->request->data)) {
                $message = 'success';
            } else {
                $message = 'error';
            }
        }
        echo json_encode($message);
        die();
    }

}
