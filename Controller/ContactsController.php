<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
         public $uses = array('Contact','Societe');

/**
 * index method
 *
 * @return void
 */
	public function index() {
//		$this->Contact->recursive = 0;
//		$this->set('contacts', $this->Paginator->paginate());
             $this->set('clients', $this->Contact->find('all'));
             $clients = $this->Contact->find('all');
            // debug($clients); die();
	}
        public function load_contact ($id = null) {
              if ($this->request->is('ajax')) {
            $data = $this->request->data;
            if ($data['id'] !== null) {
                $contact = $this->Contact->find('first', array(
                    'conditions' => array('Contact.id' => $data['id'], 'Contact.societe_id' => $data['societe_id'])
                ));
                //debug($contact); die();
                
                if (empty($contact)) {
                    $message = array('response' => 'Contact not found', 'status' => 403);
                    echo json_encode($message);
                    die();
                }
            }
            $this->Contact->id = $data['id'];
            $message = $this->Contact->read();
            echo json_encode($message);
            die();
        } else {
            $message = array('response' => 'Error Server 500', 'status' => 500);
            echo json_encode($message);
            die();
        }
        }
        public function modif_contact ($id = null){
            $message = 'error';
        if ($this->request->is('ajax')) {
            //debug($tache_id); die();
            //$this->request->data['Tache']['date_ajout'] = date("Y-m-d");
            if ($this->Contact->save($this->request->data)) {
                $message = $this->Contact->getLastInsertID();
            }
        }
        $this->set(compact('message'));
        }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
		$this->set('contact', $this->Contact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		}
		$societes = $this->Contact->Societe->find('list');
		$this->set(compact('societes'));
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
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
              }
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$this->request->data = $this->Contact->find('first', $options);
                        
                        }
		$societes = $this->Contact->Societe->find('list');
              
		$this->set(compact('societes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('The contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
