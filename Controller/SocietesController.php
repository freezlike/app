<?php

App::uses('AppController', 'Controller');

/**
 * Societes Controller
 *
 * @property Societe $Societe
 * @property PaginatorComponent $Paginator
 */
class SocietesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $uses = array('Contact', 'Societe');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->Societe->recursive = 0;
        $this->set('societes', $this->Societe->find('all'));

        //$this->set('societes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Societe->exists($id)) {
            throw new NotFoundException(__('Invalid societe'));
        }
        $options = array('conditions' => array('Societe.' . $this->Societe->primaryKey => $id));
        $this->set('societe', $this->Societe->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Societe->create();
            if ($this->Societe->save($this->request->data)) {
                $this->Session->setFlash(__('The societe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The societe could not be saved. Please, try again.'));
            }
        }
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
            if (!$this->Societe->exists($id)) {
                throw new NotFoundException(__('Invalid societe'));
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            $contact = $this->request->data['Contact'];
            $societe = $this->request->data['Societe'];
            if ($this->Societe->save($societe)) {
                $societe_id = $this->Societe->getLastInsertID();
                $contact['societe_id'] = $societe_id;
                if ($this->Societe->Contact->save($contact)) {
                    $this->Session->setFlash(__('The Contact has been saved.'));
                }
                return $this->redirect(array('action' => 'index_sc'));
            } else {
                $this->Session->setFlash(__('The Contact could not be saved. Please, try again.'));
            }
           } else {
            $options = array('conditions' => array('Societe.' . $this->Societe->primaryKey => $id));
            $this->request->data = $this->Societe->find('first', $options);
        }
    }

    public function edit_sc($id = null) {
        if ($id !== null) {
            if (!$this->Societe->exists($id)) {
                throw new NotFoundException(__('Invalid societe'));
            }
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Societe->save($this->request->data)) {
                $this->Session->setFlash(__('The societe has been saved.'));
                return $this->redirect(array('action' => 'index_sc'));
            } else {
                $this->Session->setFlash(__('The societe could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Societe.' . $this->Societe->primaryKey => $id));
            $this->request->data = $this->Societe->find('first', $options);
        }
        //$societes = $this->Contact->Societe->find('list');

        $this->set(compact('societes'));
    }

    public function index_sc() {
        $this->set('societes', $this->Societe->find('all'));
        $soc = $this->Societe->find('all');
        //debug($soc);
        $this->set(compact('soc'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Societe->id = $id;
        if (!$this->Societe->exists()) {
            throw new NotFoundException(__('Invalid societe'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Societe->delete()) {
            $this->Session->setFlash(__('The societe has been deleted.'));
        } else {
            $this->Session->setFlash(__('The societe could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
