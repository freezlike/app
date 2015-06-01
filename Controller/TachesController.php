<?php

App::uses('AppController', 'Controller');

class TachesController extends AppController {

    public $uses = array('Tache', 'User', 'TachesUser', 'Projet', 'ProjetsUser','Commentaire');

    public function index() {
        $this->Tache->recursive = 0;
        $this->set('taches', $this->Tache->find('all'));
    }

    public function add() {
        $message = 'error';
        if ($this->request->is('ajax')) {
            $this->request->data['Tache']['date_ajout'] = date("Y-m-d");
            if ($this->Tache->save($this->request->data)) {
                $message = $this->Tache->getLastInsertID();
            }
        }
        $this->set(compact('message'));
    }
     public function list_commentaire($id = null){
            $liste = $this->Commentaire->find('first', array(
                'conditions' => array('tache_id'=>$id)
            ));
             $this->set(compact('liste'));
            //debug($liste); die();
        }

    public function update_tache($id = null) {
        $message = 'error';
        if ($this->request->is('ajax')) {
           $this->Tache->id = $id;
            //$this->Tache->saveField('description', $value)
            $data = $this->request->data;
            if ($this->Tache->save($data['Tache'])) {
                $message = 'success';
            }
        }
        echo json_encode($message);
        die();
        //$this->set(compact('message'));
    }

    public function delete_tache($tacheid = null) {

        $message = '';
        if ($this->request->is('ajax')) {
            $pu = $this->Tache->find('first', array(
                'conditions' => array('Tache.id' => $tacheid)
            ));
            //debug($pu); die();
            if ($this->Tache->delete($pu['Tache']['id'])) {
                $message = 'success';
            } else {
                $message = 'error';
            }
            echo json_encode($message);
            die();
        }
    }

    public function updateState() {
        $message = '';
        if ($this->request->is('ajax')) {
            if ($this->Tache->save($this->request->data)) {
                $message = 'success';
            } else {
                $message = 'error';
            }
        }
        $this->set(compact('message'));
    }

    public function appendtask($id = null) {
        $message = '';
        $tache = $this->Tache->find('first', array(
            'conditions' => array('Tache.id' => $id)
        ));
        debug($tache);
        die();
        if ($id !== null) {
            $this->Tache->id = $id;

            if (!$this->Tache->exists()) {
                $message = 'error';
            }
        }
        if ($message === '') {
            $message = $this->Tache->find('first', array(
                'conditions' => array('Tache.id' => $id)
            ));
            //debug($message); die();
        }
        $this->set(compact('message', 'tache'));
    }

    public function pop_over($name = null) {
        $this->User->recursive = -1;
        $message = 'error';
        $users = $this->User->find('list', array(
            'conditions' => array('OR' => array(
                    array('User.last_name LIKE' => "%$name%"),
                    array('User.first_name LIKE' => "%$name%")
                )),
            //array('User.last_name LIKE' => "%$name%",'User.first_name LIKE' => "%$name%"),
            'fields' => array('User.full_name')
        ));
        if (!empty($users)) {
            $message = $users;
        }
        $this->set(compact('message'));
    }

    public function load_taches($projet_id = null) {
        $tachs2 = $this->Tache->find('all', array(
            'conditions' => array('etat' => '2', 'projet_id' => $projet_id)
        ));
        $this->set(compact('tachs2'));
    }

    public function charge_taches($id_tache = null) {
        $description = $this->Tache->find('all', array(
            'condition' => array('Tache.id' => $id_tache)
        ));
        debug($description);
        die();
        $tabDes = array();
        foreach ($description as $t):
            $Desc = $t['Tache'];
            //debug($Desc); die();
            array_push($tabDes, $Desc['description']);
        endforeach;

        debug($tabDes);
        die();
    }
      public function projet_etat($id = null) {
        $tache1 = $this->Tache->find('count', array(
                'conditions' => array('etat'=> '0','projet_id' => $id)
                ));
        $tache2 = $this->Tache->find('count', array(
                'conditions' => array('etat'=> '1','projet_id' => $id)
                ));
        $tache3 = $this->Tache->find('count', array(
                'conditions' => array('etat'=> '2','projet_id' => $id)
                ));
        $tache_projet = $this->Tache->find('count', array(
            'conditions' => array('projet_id' => $id)
        ));
        $projet = $this->Projet->find('first',array(
            'conditions' => array('Projet.id' => $id)
        ));
        $this->set(compact('tache1','tache2','tache3','tache_projet','projet'));
	}

    public function tasks_nestable($id = null, $name = null) {
        if ($this->request->is(array('post', 'put'))) {
            $Taches = $this->request->data['Tache'];
        }
        $projUsers = $this->ProjetsUser->find('all', array(
            'conditions' => array('projet_id' => $id)
        ));
        $project = $this->Projet->find('first', array(
            'conditions' => array('Projet.id' => $id)
        ));
        $tabFullname = array();
        $message = array();
        foreach ($project['User'] as $p):
            $message[$p['id']] = $p['full_name'];
        endforeach;
        $users = array();
        foreach ($project['User'] as $user):
            $users[$user['id']] = $user['first_name'] . " " . $user['last_name'];
        endforeach;
        $proj = $this->Projet->find('first', array(
            'conditions' => array('projet.id' => $id)
        ));
        $tchs = $this->Tache->find('all', array(
            'conditions' => array('etat' => '0', 'projet_id' => $id),
            'order' => array('Tache.id DESC')
        ));
        $tchs1 = $this->Tache->find('all', array(
            'conditions' => array('etat' => '1', 'projet_id' => $id)
        ));
        $tchs2 = $this->Tache->find('all', array(
            'conditions' => array('etat' => '2', 'projet_id' => $id)
        ));
        $pro = $this->Tache->find('all', array(
            'conditions' => array('projet_id' => $id)
        ));
        $tache_ach = $this->Tache->find('all', array(
            'conditions' => array('projet_id' => $id)
        ));
        //debug($tchs2); die();
        $count = count($tache_ach);
        $v = 0;
        foreach ($tache_ach as $tache):
            if ($tache['Tache']['etat'] === '2') {
                $v++;
            }
        endforeach;
        if ($v === $count) {
            $this->Projet->id = $id;
            $this->request->data['Projet']['etat_p'] = '2';
            $this->Projet->saveField('etat_p', $this->request->data['Projet']['etat_p']);
            $v = 0;
        } else {
            $this->Projet->id = $id;
            $this->request->data['Projet']['etat_p'] = '1';
            $this->Projet->saveField('etat_p', $this->request->data['Projet']['etat_p']);
        }    
         $liste = $this->Commentaire->find('first', array(
                'conditions' => array('tache_id'=> $id)
            ));
        $this->set(compact('tchs', 'tchs1', 'tchs2', 'proj', 't', 'users', 'message', 'projUsers', 'Taches','liste'));
    }

    public function delete_t($id = null) {
        $this->Tache->id = $id;
        if (!$this->Tache->exists()) {
            throw new NotFoundException(__('Invalid Tâche'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tcahe->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'tasks_nestable'));
    }

    public function update_tasks() {

        $tchs = $this->Tache->find('all', array(
            'conditions' => array('etat' => '0')
        ));
        $tchs1 = $this->Tache->find('all', array(
            'conditions' => array('etat' => '1')
        ));
        $tchs2 = $this->Tache->find('all', array(
            'conditions' => array('etat' => '2')
        ));
        $this->set(compact('tchs', 'tchs1', 'tchs2'));
    }

    public function load_task() {
        header('Access-Control-Allow-Origin : *');
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            if ($data['id'] !== null) {
                $tache = $this->Tache->find('first', array(
                    'conditions' => array('Tache.id' => $data['id'], 'Tache.projet_id' => $data['projet_id'])
                ));
                //Contraint d'injection par Utilisateur sur Tache
//                $user_id = $this->Auth->user('id');
//                $taches_users = $this->TachesUser->find('first', array(
//                    'conditions' => array('TacheUser.user_id'=>$user_id,'TacheUser.tache_id'=>$id)
//                ));
//                if (empty($tache) || empty($taches_users)) {
                if (empty($tache)) {
                    $message = array('response' => 'task not found', 'status' => 403);
                    echo json_encode($message);
                    die();
                }
            }
            $this->Tache->id = $data['id'];
            $message[0] = $this->Tache->read();
            //$this->TachesUser->recursive = 2;
            $taches_users = $this->Tache->find('first',array('conditions'=>array('Tache.id'=>$data['id'])));
            if(!empty($taches_users)){
                $message[1] = $taches_users;
            }
            echo json_encode($message);
            die();
        } else {
            $message = array('response' => 'Error Server 500', 'status' => 500);
            echo json_encode($message);
            die();
        }
    }

    public function edit($id = null) {
        if ($id !== null) {
            if (!$this->Tache->exists($id)) {
                throw new NotFoundException(__('Tache Invalide'));
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tache->save($this->request->data)) {
                $this->Session->setFlash(__('Opération Réussie.'), 'alert');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Opération Non Réussie.'), 'alert', array('type' => 'error'));
            }
        } else {
            $options = array('conditions' => array('Tache.' . $this->Tache->primaryKey => $id));
            $this->request->data = $this->Tache->find('first', $options);
        }

        $projets = $this->Tache->Projet->find('list');
        $this->set(compact('projets'));
    }

    public function edit_e($id = null) {
        $this->set('title_for_layout', __("Tache"));
        if ($id !== null) {
            if (!$this->Tache->exists($id)) {
                throw new Exception(__("Tache Invalide"));
            }
        }
        $tache = $this->Tache->find('first', array(
            'conditions' => array('Tache.id' => $id),
        ));
        if ($this->request->is(array('put', 'post'))) {
            if ($this->Tache->save($this->request->data)) {
                $this->Session->setFlash(__('Tache Affecté avec succès'), 'alert');
                $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
            } else {
                $this->Session->setFlash(__('Tache Non Affecté'), 'alert', array('type' => 'error'));
            }
        } else {
            $this->request->data = $tache;
            $postes = $this->Tache->find('list', array('conditions' => array('departement_id' => $tache['Departement']['id'])));
            $this->set(compact('postes', 'tache'));
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
        $this->Tache->id = $id;
        if (!$this->Tache->exists()) {
            throw new NotFoundException(__('Tache Invalide'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tache->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    public function modif_title_task() {
        $message = 'error';
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            if ($this->Tache->save($data)) {
                $message = 'success';
            }
        }
        echo json_encode($message);
        die();
    }

    public function dashboard($name = null) {
        $this->User->recursive = -1;
        $message = 'error';
        $users = $this->User->find('list', array(
            'conditions' => array('OR' => array(
                    array('User.last_name LIKE' => "%$name%"),
                    array('User.first_name LIKE' => "%$name%")
                )),
            'fields' => array('User.full_name')
        ));
        if (!empty($users)) {
            $message = $users;
        }

        $pro = $this->Tache->Projet->find('all');
        $etat = $this->Tache->Projet->find('all', array(
            'conditions' => array('etat_p' => '0')
        ));
        $etat1 = $this->Tache->Projet->find('all', array(
            'conditions' => array('etat_p' => '1')
        ));
        $etat2 = $this->Tache->Projet->find('all', array(
            'conditions' => array('etat_p' => '2')
        ));
        $this->set(compact('pro', 'etat', 'etat1', 'etat2', 'message'));
    }

    public function dopro() {
        $etat = $this->Tache->Projet->find('all', array(
            'conditions' => array('etat_p' => '0')));
        $this->set(compact('etat'));
    }

    public function doingpro() {
        $etat = $this->Tache->Projet->find('all', array(
            'conditions' => array('etat_p' => '1')));
        $this->set(compact('etat'));
    }

    public function donepro() {
        $etat = $this->Tache->Projet->find('all', array(
            'conditions' => array('etat_p' => '2')));
        $this->set(compact('etat'));
    }

    public function allpro() {
        $etat = $this->Tache->Projet->find('all');
        $this->set(compact('etat'));
    }

}
