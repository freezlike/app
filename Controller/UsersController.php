<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public $uses = array('User', 'Poste', 'Departement', 'CompetencesUser', 'ProjetsUser', 'DiplomesUser', 'Projet');

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('edit');
    }

    /**
     * Update Login Activity
     */
    public function UpdateLoginActivity() {
        $user = $this->Auth->user('full_name');
        $group = $this->Auth->user('Group.name');
        $ip = $_SERVER['REMOTE_ADDR'];
        CakeLog::write('Login_activity', "L'utilisateur $user : $group, s'est connecté via l'ip $ip\n\r", 'info');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->User->recursive = 0;
        //  $user = $this->User->find('all');
        $this->set('users', $this->User->find('all'));
    }

    /**
     * 
     * @param type $id
     */
    public function liste_client($id = null) {
        $this->User->recursive = -1;
        $com = $this->User->findById($id);
        $clients = $this->User->find('all', array(
            'conditions' => array('User.commerciale_id' => $id)
        ));
        $this->set(compact('clients', 'com'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * other method
     */
    public function other($id = null) {
        if ($id !== null) {
            if (!$this->User->exists($id)) {
                throw new NotFoundException(__('Invalid user'));
            }
        }
    }

    /**
     * InitDB method For ACL component
     */
    public function initDB() {
        $group = $this->User->Group;
        // Autorise l'accès à tout pour les admins
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        // Autorise l'accès aux posts et widgets pour les managers
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/home');
        $this->Acl->allow($group, 'controllers/Users');
        $this->Acl->allow($group, 'controllers/Payments');
        $this->Acl->allow($group, 'controllers/Evenements');
        $this->Acl->allow($group, 'controllers/Group');
        // Autorise l'accès aux actions add et edit des posts widgets pour les utilisateurs de ce groupe
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/home');
        $this->Acl->allow($group, 'controllers/Projets');
        $this->Acl->allow($group, 'controllers/Evenements');
        $this->Acl->allow($group, 'controllers/Taches');
        // Permet aux utilisateurs classiques de se déconnecter
        $this->Acl->allow($group, 'controllers/users/logout');

        // Nous ajoutons un exit pour éviter d'avoir un message d'erreur affreux "missing views" (manque une vue)
        echo "ACL Users mis à jour";
        exit;
    }

    /**
     * more method
     * @param type $id
     */
    public function more($id = null) {
        if ($id !== null) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('User invalide'));
            }
        } else {
            $this->Session->setFlash(__("Opération non autorisée"), 'alert', array('type' => 'error'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        $this->request->data = $this->User->read();
        $user = $this->request->data;
        $en_attente = $this->request->data['Projet'];
        $count = count($en_attente);
//        debug($count);
//        die();
        // $a = $this->request->data['ProjetsUser']['rendement'];
//        debug($a);
//        die();

        $this->set(compact('user', 'count'));
    }

    public function fichepaie($id = null) {

        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id)));
//        debug($user);
//        die();
        $this->set(compact('user'));
    }

    /**
     * change_pwd method
     */
    public function change_pwd() {
        
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if ($id !== null) {
            if (!$this->User->exists($id)) {
                throw new NotFoundException(__('Invalid user'));
            }
        }
        if ($this->request->is(array('post', 'put'))) {
//            $data = array('id' => null, 'departement_id' => $this->request->data['User']['departements']);
//            debug($this->User->Emploie->save($data));
//            $last_idDep = $this->User->Emploie->getLastInsertID();
//            unset($this->request->data['User']['departements']);
//            $this->request->data['User']['emploie_id'] = $last_idDep;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Modification Effectuée avec succée .'), 'alert');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Modification Non Effectuée'), 'alert', array('type' => 'error'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
        }
        $departements = $this->Departement->find('list');
        $situations = $this->User->Situation->find('list');
        $competences = $this->User->Competence->find('list');
        $diplomes = $this->User->Diplome->find('list');
        $projets = $this->User->Projet->find('list');
        $groups = $this->User->Group->find('list');
        $postes = $this->User->Poste->find('list');
        $this->set(compact('postes', 'departements', 'situations', 'competences', 'diplomes', 'projets', 'groups'));
    }

    public function choix_poste($id = null) {
        $postes = $this->Poste->find('list', array(
            'conditions' => array('Poste.departement_id' => $id)
        ));
        $this->set(compact('postes'));
    }

    public function cv($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            //debug($this->request->data);
            $this->User->id = $id;
            $user = $this->User->read();
            $ext = $this->request->data['User']['cv']['name'];
            $ext = explode('.', $ext);
//            debug($ext);
            $filename = 'cv-' . $user['User']['hire_date'] . '.' . $ext[1];
            //debug(is_dir(FILES . $user['User']['first_name'] . '.' . $user['User']['last_name'] . '.' . $id));
            if (!is_dir(FILES . $user['User']['first_name'] . '.' . $user['User']['last_name'] . '.' . $id)) {
                mkdir(FILES . $user['User']['first_name'] . '.' . $user['User']['last_name'] . '.' . $id);
            }
            $dir = FILES . DS . $user['User']['first_name'] . '.' . $user['User']['last_name'] . '.' . $id;
            $this->User->saveField('cv_url', $user['User']['first_name'] . '.' . $user['User']['last_name'] . '.' . $id . DS . $filename);
            if (move_uploaded_file($this->request->data['User']['cv']['tmp_name'], $dir . DS . $filename)) {
                $this->Session->setFlash(__("CV Ajouté avec succès"), 'alert');
                $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
            } else {
                $this->Session->setFlash(__("CV Non Ajouté"), 'alert', array('type' => 'error'));
                $this->redirect(array('controller' => 'users', 'action' => 'more', 'id' => $id));
            }
        }
    }

    public function search_membre($name = null) {
        $this->User->recursive = -1;
        $message = 'error';
        $users = $this->User->find('all', array(
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

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Opération Réussie.'), 'alert');
        } else {
            $this->Session->setFlash(__('Opération Non Réussie'), 'alert', array('type' => 'error'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * login method
     */
    public function login() {
        $this->set('title_for_layout', __("Login"));
        $this->ifLogin();
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__("Identifcation réussie"), 'alert');
                $this->UpdateLoginActivity();
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__("Login ou Mot de passe erroné"), 'alert', array('type' => 'error'));
                unset($this->request->data['User']['password']);
            }
        }
    }

    public function logout() {
        $this->Auth->logout();
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

}
