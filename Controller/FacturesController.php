<?php

App::uses('AppController', 'Controller');

/**
 * Factures Controller
 *
 * @property Facture $Facture
 * @property PaginatorComponent $Paginator
 */
class FacturesController extends AppController {

    /**
     *  Uses Model
     */
    public $uses = array('Facture', 'Commerciale', 'DesignationFacture', 'Societe', 'User');

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Auth');

    /**
     * Paginate
     * @var array 
     */
//    public $paginate = array(
//        'limit' => 4,
//        'paramType' => 'querystring',
//        'order' => array(
//            'Facture.created' => 'asc'
//        )
//    );
//    public function beforeFilter() {
    //debug($this->Session->read('Auth.User'));
    //debug($this->Auth->deny());
//        $comSession = $this->Session->read('Commerciale');
//        if (!empty($comSession)) {
//            $this->Auth->allow('com_index', 'com_avoir', 'com_add', 'com_view');
//            return true;
//        }
//        //$user = $this->Auth->user('Role.name');
//        if ($user === 'Administrateur') {
//            return true;
//        }
//        if ($user === 'Client') {
//            return true;
//        } else {
//            $this->redirect(array('controller' => 'users', 'action' => 'login', 'com' => false));
//        }
//        $this->Auth->deny('admin_viewP');
//        parent::beforeFilter();
//    }

    public function admin_advanced_search() {
        if ($this->request->is('post')) {
            $key = $this->request->data['Facture']['key'];
            $this->set(compact('key'));
        }
    }

    public function admin_search($keyword = null) {
        if (!empty($keyword)) {
            $this->Facture->recursive = 0;
            $resultats = $this->Facture->find('all', array(
                'conditions' => array('User.display_name LIKE' => '%' . $keyword . '%')));
            if (!empty($resultats)) {
                $this->set('resultats', $resultats);
            } else {
                $resultats = $this->Facture->find('all', array(
                    'conditions' => array('Facture.created LIKE' => '%' . $keyword . '%')));
                if (!empty($resultats)) {
                    $this->set('resultats', $resultats);
                }
            }
        } else {
            $data = $this->paginate('Facture');
            $this->set('resultats', $data);
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $factures = $this->Facture->find('all', array(
            'order' => array('Facture.created DESC'),
            'contain' => array('Commercial', 'User')
        ));
        $this->set(compact('factures'));
    }

    /**
     * clientfacture method
     * 
     * @return array facture
     */
    public function viewp($id = null) {
        $roleuser = $this->Auth->user('Role.name');
        if ($roleuser === $roleuser) {
            if (!$this->Facture->exists($id)) {
                throw new NotFoundException(__('Invalid facture'));
            }
            $options = array('conditions' => array('Facture.' . $this->Facture->primaryKey => $id));
            $this->set('facture', $this->Facture->find('first', $options));
            return true;
        } else {
            $this->Session->setFlash(__('Vous n\'êtes pas authoriser à y accéder '), 'notif', array('type' => 'error'));
            $this->redirect('/');
        }
    }

    public function clientfacture() {
        $id = $this->Auth->user('id');
        $data = $this->Facture->find('all', array(
            'conditions' => array('Facture.user_id' => $id)
        ));
        $this->set('factures', $data);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Facture->exists($id)) {
            throw new NotFoundException(__('Invalid facture'));
        }

        $this->Facture->recursive = 2;
        //$options = array('conditions' => array('Facture.id' => $id));
        $facture = $this->Facture->findById($id);
        //debug($facture); die();
//        $id = $facture['User']['societe_id'];
//        $societe = $this->Societe->find('first', array(
//            'conditions' => array('societe_id' => $id)
//        ));
        //debug($societe);die();
//        $idCom = $facture['User']['commerciale_id'];
        //debug($idCom); die();
        //$this->Commerciale->recursive = -1;
//        $nom_com = $this->Commerciale->find('first', array(
//            'conditions' => array('Commerciale.id' => $idCom)
//        ));
//        debug($nom_com); die();
        $this->set(compact('facture'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function viewc($id = null) {
        if (!$this->Facture->exists($id)) {
            throw new NotFoundException(__('Invalid facture'));
        }
        $options = array('conditions' => array('Facture.' . $this->Facture->primaryKey => $id));
        $this->set('facture', $this->Facture->find('first', $options));
    }

    public function admin_viewP($id = null) {
        //pour éviter les outputs du debug de cake
        //Configure::write('debug', 0);
        //la solution depuis cakephp 2
        //$this->response->type('application/pdf');
        //$this->layout = 'pdf';
        $roleuser = $this->Auth->user('Role.name');
        if ($roleuser === $roleuser) {
            if (!$this->Facture->exists($id)) {
                throw new NotFoundException(__('Invalid facture'));
            }
            $options = array('conditions' => array('Facture.' . $this->Facture->primaryKey => $id));
            $this->set('facture', $this->Facture->find('first', $options));
            return true;
        } else {
            $this->Session->setFlash(__('Vous n\'êtes pas authoriser à y accéder '), 'notif', array('type' => 'error'));
            $this->redirect('/');
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $products = $this->request->data['Designation'];
            unset($this->request->data['Designation']);
            $count = $this->Facture->find('count');
            $this->request->data['Facture']['code_facture'] = "CF-" . ($count + 1);
            $this->Facture->create();
            if ($this->Facture->save($this->request->data)) {
                $last_id = $this->Facture->getLastInsertID();
                foreach ($products as $k => $p) {
                    $data = array('facture_id' => $last_id, 'designation_id' => $k, 'qte' => $p);
                    $this->DesignationFacture->create();
                    $this->DesignationFacture->save($data);
                }
                $this->Session->setFlash(__('La Facture a été bien sauvegardée.'), 'notif');
                require_once APP . 'Config/database.php';
                $database = new DATABASE_CONFIG();
                try {
                    $dblink = new PDO('mysql:host=' . $database->default['host'] . ';dbname=' . $database->default['database'], $database->default['login'], $database->default['password'], array(PDO::ATTR_PERSISTENT => false));
                    $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $dblink->exec('SET CHARACTER SET ' . $database->default['encoding']);
                    $sql = "update designations_factures df left join designations d on df.designation_id = d.id set df.last_unit_price = d.price where df.facture_id = $last_id";
                    //debug($sql);
                    $exec = $dblink->exec($sql);
                    return $this->redirect(array('action' => 'index'));
                    //debug($exec);
                } catch (Exception $e) {
                    die('DB Error' . $e->getMessage());
                }
            } else {
                $this->Session->setFlash(__('La facture n\'a pas pu être sauvé. S\'il vous plaît, essayez à nouveau.'), 'notif', array('type' => 'error'));
            }
        }
        $users = $this->Facture->User->find('list', array(
            'conditions' => array('User.group_id' => 3)
        ));
        $payments = $this->Facture->Payment->find('list');
        $devises = $this->Facture->Devise->find('list');
        $designations = $this->Facture->Designation->find('list');
        $this->set(compact('users', 'payments', 'devises', 'designations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Facture->exists($id)) {
            throw new NotFoundException(__('Invalid facture'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Facture->save($this->request->data)) {
                $this->Session->setFlash(__('La Facture a été bien sauvegardée.'), 'notif');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La facture n\'a pas pu être sauvé. S\'il vous plaît, essayez à nouveau.'), 'notif', array('type' => 'error'));
            }
        } else {
            $options = array('conditions' => array('Facture.' . $this->Facture->primaryKey => $id));
            $this->request->data = $this->Facture->find('first', $options);
        }
        $users = $this->Facture->User->find('list');
        $payments = $this->Facture->Payment->find('list');
        $devises = $this->Facture->Devise->find('list');
        $this->set(compact('users', 'payments', 'devises'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Facture->id = $id;
        if (!$this->Facture->exists()) {
            throw new NotFoundException(__('Invalid facture'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Facture->delete()) {
            $this->Session->setFlash(__('The facture has been deleted.'));
        } else {
            $this->Session->setFlash(__('The facture could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Facture List for Commercial 
     * 
     */
    public function com_index() {
        $id = $this->Session->read('Commerciale.id');
        $f_user = $this->User->find('all', array(
            'conditions' => array('User.commerciale_id' => $id)
        ));
        $user_ids = array();
        foreach ($f_user as $value) {
            array_push($user_ids, $value['User']['id']);
        }
        $factures = $this->Facture->find('all', array(
            'conditions' => array('Facture.user_id' => $user_ids)
        ));
        $this->set(compact('factures'));
    }

    /**
     * Ajout Facture pour commerciale
     */
    public function com_add() {
        if ($this->request->is('post')) {
            $products = $this->request->data['Designation'];
            unset($this->request->data['Designation']);
            $count = $this->Facture->find('count');
            $this->request->data['Facture']['code_facture'] = "CF-" . ($count + 1);
            $this->request->data['Facture']['commerciale_id'] = $this->Session->read('Commerciale.id');
            $this->Facture->create();

            if ($this->Facture->save($this->request->data)) {
                $last_id = $this->Facture->getLastInsertID();
                foreach ($products as $k => $p) {
                    $data = array('facture_id' => $last_id, 'designation_id' => $k, 'qte' => $p);
                    $this->DesignationFacture->create();
                    $this->DesignationFacture->save($data);
                }
                $this->Session->setFlash(__('La Facture a été bien sauvegardée.'), 'notif');
                require_once APP . 'Config/database.php';
                $database = new DATABASE_CONFIG();
                try {
                    $dblink = new PDO('mysql:host=' . $database->default['host'] . ';dbname=' . $database->default['database'], $database->default['login'], $database->default['password'], array(PDO::ATTR_PERSISTENT => false));
                    $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $dblink->exec('SET CHARACTER SET ' . $database->default['encoding']);
                    $sql = "update designations_factures df left join designations d on df.designation_id = d.id set df.last_unit_price = d.price where df.facture_id = $last_id";
                    //debug($sql);
                    $exec = $dblink->exec($sql);
                    return $this->redirect(array('action' => 'index'));
                    //debug($exec);
                } catch (Exception $e) {
                    die('DB Error' . $e->getMessage());
                }
            } else {
                $this->Session->setFlash(__('La facture n\'a pas pu être sauvé. S\'il vous plaît, essayez à nouveau.'), 'notif', array('type' => 'error'));
            }
        }
        $users = $this->Facture->User->find('list', array(
            'conditions' => array('User.role_id' => 2, 'User.commerciale_id' => $this->Session->read('Commerciale.id'))
        ));
        $payments = $this->Facture->Payment->find('list');
        $devises = $this->Facture->Devise->find('list');
        $designations = $this->Facture->Designation->find('list');
        $this->set(compact('users', 'payments', 'devises', 'designations'));
    }

    /**
     * requête d'avoir sur une facture
     * @param type $id
     */
    public function com_avoir($id = null) {
        if (!empty($id)) {
            if ($this->Facture->exists($id)) {
                $factures = $this->Facture->find('first', array(
                    'conditions' => array('Facture.id' => $id, 'Facture.avoir' => false),
                    'fields' => array('Facture.code_facture', 'Facture.id', 'Facture.avoir')
                ));
                if (empty($factures)) {
                    $this->Session->setFlash(__('Cette Facture est déjà en Avoir'), 'notif', array('type' => 'error'));
                    $this->redirect(array('controller' => 'factures', 'action' => 'index', 'com' => true));
                }
                $this->set(compact('factures'));
            } else {
                $this->Session->setFlash(__('Facture Erronée'), 'notif', array('type' => 'error'));
                $this->redirect(array('controller' => 'factures', 'action' => 'index', 'com' => true));
            }
            if ($this->request->is('put')) {
                if (!empty($this->request->data)) {
                    if ($this->request->data['Facture']['Rvalue'] === strtolower('oui') && $factures['Facture']['avoir'] == 0) {
                        $this->Facture->id = $id;
                        if ($this->Facture->saveField('avoir', 1)) {
                            $this->Session->setFlash(__('Facture : ' . $factures['Facture']['code_facture'] . ' a été mise en Avoir.'), 'notif');
                            $this->redirect(array('controller' => 'factures', 'action' => 'index', 'com' => true));
                        } else {
                            $this->Session->setFlash(__('Erreur de la Facture ou déjà en Avoir.'), 'notif', array('type' => 'error'));
                            $this->redirect(array('controller' => 'factures', 'action' => 'index', 'com' => true));
                        }
                    }
                }
            }
        }
    }

    public function admin_avoir($id = null) {
        if (!empty($id)) {
            if ($this->Facture->exists($id)) {
                $factures = $this->Facture->find('first', array(
                    'conditions' => array('Facture.id' => $id, 'Facture.avoir' => false),
                    'fields' => array('Facture.code_facture', 'Facture.id', 'Facture.avoir')
                ));
                if (empty($factures)) {
                    $this->Session->setFlash(__('Cette Facture est déjà en Avoir'), 'notif', array('type' => 'error'));
                    $this->redirect(array('controller' => 'factures', 'action' => 'index', 'admin' => true));
                }
                $this->set(compact('factures'));
            } else {
                $this->Session->setFlash(__('Facture Erronée'), 'notif', array('type' => 'error'));
                $this->redirect(array('controller' => 'factures', 'action' => 'index', 'admin' => true));
            }
        }
        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                if ($this->request->data['Facture']['Rvalue'] === strtolower('oui') && $factures['Facture']['avoir'] == 0) {
                    $this->Facture->id = $id;
                    if ($this->Facture->saveField('avoir', 1)) {
                        $this->Session->setFlash(__('Facture : ' . $factures['Facture']['code_facture'] . ' a été mise en Avoir.'), 'notif');
                        $this->redirect(array('controller' => 'factures', 'action' => 'index', 'admin' => true));
                    } else {
                        $this->Session->setFlash(__('Erreur de la Facture ou déjà en Avoir.'), 'notif', array('type' => 'error'));
                        $this->redirect(array('controller' => 'factures', 'action' => 'index', 'admin' => true));
                    }
                }
            }
        }
    }

    /**
     * View Facture For Commercial
     */
    public function com_view($id = null) {
        if (!$this->Facture->exists($id)) {
            throw new NotFoundException(__('Invalid facture'));
        }
        $this->Facture->recursive = 2;
        $options = array('conditions' => array('Facture.' . $this->Facture->primaryKey => $id));
        $this->set('facture', $this->Facture->find('first', $options));
    }

}
