<?php
App::uses('AppController', 'Controller');
/**
 * Reclamations Controller
 *
 * @property Reclamation $Reclamation
 * @property PaginatorComponent $Paginator
 */
class ReclamationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
        public $uses = array('Reclamation','Contact','User'); 
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reclamation->recursive = 0;
		//$this->set('reclamations', $this->Paginator->paginate());
                $reclamations = $this->Reclamation->find('first');
                $this->set(compact('reclamations'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reclamation->exists($id)) {
			throw new NotFoundException(__('Invalid reclamation'));
		}
		$options = array('conditions' => array('Reclamation.' . $this->Reclamation->primaryKey => $id));
		$this->set('reclamation', $this->Reclamation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reclamation->create();
			if ($this->Reclamation->save($this->request->data)) {
				$this->Session->setFlash(__('The reclamation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reclamation could not be saved. Please, try again.'));
			}
		}
                
                //debug($reclamations);die();
		$users = $this->Reclamation->User->find('list');
		$contacts = $this->Reclamation->Contact->find('list');
		$this->set(compact('users', 'contacts','reclamation'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reclamation->exists($id)) {
			throw new NotFoundException(__('Invalid reclamation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reclamation->save($this->request->data)) {
				$this->Session->setFlash(__('The reclamation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reclamation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reclamation.' . $this->Reclamation->primaryKey => $id));
			$this->request->data = $this->Reclamation->find('first', $options);
		}
		$users = $this->Reclamation->User->find('list');
		$contacts = $this->Reclamation->Contact->find('list');
		$this->set(compact('users', 'contacts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reclamation->id = $id;
		if (!$this->Reclamation->exists()) {
			throw new NotFoundException(__('Invalid reclamation'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->Reclamation->delete()) {
			$this->Session->setFlash(__('The reclamation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reclamation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
