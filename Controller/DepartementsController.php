<?php
App::uses('AppController', 'Controller');
/**
 * Departements Controller
 *
 * @property Departement $Departement
 * @property PaginatorComponent $Paginator
 */
class DepartementsController extends AppController {

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
		$this->Departement->recursive = 0;
		$this->set('departements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Departement->exists($id)) {
			throw new NotFoundException(__('Invalid departement'));
		}
		$options = array('conditions' => array('Departement.' . $this->Departement->primaryKey => $id));
		$this->set('departement', $this->Departement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Departement->create();
			if ($this->Departement->save($this->request->data)) {
				$this->Session->setFlash(__('The departement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The departement could not be saved. Please, try again.'));
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
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Departement->save($this->request->data)) {
				$this->Session->setFlash(__('The departement has been saved.'));
				return $this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('The departement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Departement.' . $this->Departement->primaryKey => $id));
			$this->request->data = $this->Departement->find('first', $options);
		}
                $this->set('departements', $this->Paginator->paginate());
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Departement->id = $id;
		if (!$this->Departement->exists()) {
			throw new NotFoundException(__('Invalid departement'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->Departement->delete()) {
			$this->Session->setFlash(__('The departement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The departement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'edit'));
	}
}
