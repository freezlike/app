<?php

App::uses('AppController', 'Controller');

/**
 * TachesUsers Controller
 *
 * @property TachesUser $TachesUser
 * @property PaginatorComponent $Paginator
 */
class TachesUsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->TachesUser->recursive = 0;
        $this->set('tachesUsers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->TachesUser->exists($id)) {
            throw new NotFoundException(__('Invalid taches user'));
        }
        $options = array('conditions' => array('TachesUser.' . $this->TachesUser->primaryKey => $id));
        $this->set('tachesUser', $this->TachesUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->TachesUser->create();
            if ($this->TachesUser->save($this->request->data)) {
                $this->Session->setFlash(__('The taches user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The taches user could not be saved. Please, try again.'));
            }
        }
        $taches = $this->TachesUser->Tache->find('list');
        $users = $this->TachesUser->User->find('list');
        $this->set(compact('taches', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->TachesUser->exists($id)) {
            throw new NotFoundException(__('Invalid taches user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->TachesUser->save($this->request->data)) {
                $this->Session->setFlash(__('The taches user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The taches user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('TachesUser.' . $this->TachesUser->primaryKey => $id));
            $this->request->data = $this->TachesUser->find('first', $options);
        }
        $taches = $this->TachesUser->Tache->find('list');
        $users = $this->TachesUser->User->find('list');
        $this->set(compact('taches', 'users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->TachesUser->id = $id;
        if (!$this->TachesUser->exists()) {
            throw new NotFoundException(__('Invalid taches user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->TachesUser->delete()) {
            $this->Session->setFlash(__('The taches user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The taches user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function assign_member() {
        $message = 'error';
        if ($this->request->is(array('ajax', 'post'))) {
            //$this->TachesUser->id = $id;
            $data = $this->request->data;
            if ($this->TachesUser->save($data)) {
                $message = "success";
            }
        }
        echo json_encode($message);
        die();
    }

    public function delete_member_task() {
        $message = 'error';
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $this->TachesUser->recursive = 0;
            $tu = $this->TachesUser->find('first', array('conditions' => array('TachesUser.user_id' => $data['TachesUser']['user_id'], 'TachesUser.tache_id' => $data['TachesUser']['tache_id'])));
            if($this->TachesUser->delete($tu['TachesUser']['id'])){
                $message = 'success';
            }
        }
        echo json_encode($message);
        die();
    }

}
