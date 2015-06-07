<?php

App::uses('AppController', 'Controller');

/**
 * Evenements Controller
 *
 * @property Evenement $Evenement
 * @property PaginatorComponent $Paginator
 */
class EvenementsController extends AppController {

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
        $this->Evenement->recursive = 0;
        $this->set('evenements', $this->Paginator->paginate());
    }

    public function ajout_event() {
        $message = 'error';
        if ($this->request->is('ajax')) {
            if ($this->Evenement->save($this->request->data)) {
                $message = $this->Evenement->getLastInsertID();
            }
        }
        echo json_encode($message);
        die();
    }

    public function dashboard() {
        
    }

    public function add_event() {
        if ($this->request->is('ajax')):
            if ($this->Evenement->save($this->request->data)):
                header('HTTP/1.0 200 OK');
                echo json_encode(array('text' => __("Evenement ajouté avec succès"), 'status' => 200, 'type' => 'success'));
                die();
            endif;
        endif;
        header("HTTP/1.0 404 Not Found");
        echo json_encode(array('text' => __("Evenement Non ajouté"), 'status' => 404, 'type' => 'error'));
        die();
    }

    public function events() {
        if ($this->request->is('ajax')):
            $events = $this->Evenement->find('all', array(
                'order' => array('Evenement.created')
            ));
            header('HTTP/1.0 200 OK');
            echo json_encode($events);
            die();
        endif;
        header("HTTP/1.0 404 Not Found");
        echo json_encode('error');
        die();
    }

    public function dashboard1() {
        
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Evenement->exists($id)) {
            throw new NotFoundException(__('Invalid evenement'));
        }
        $options = array('conditions' => array('Evenement.' . $this->Evenement->primaryKey => $id));
        $this->set('evenement', $this->Evenement->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Evenement->create();
            if ($this->Evenement->save($this->request->data)) {
                $this->Session->setFlash(__('The evenement has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evenement could not be saved. Please, try again.'));
            }
        }
        $pvs = $this->Evenement->Pv->find('list');
        $this->set(compact('pvs'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Evenement->exists($id)) {
            throw new NotFoundException(__('Invalid evenement'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Evenement->save($this->request->data)) {
                $this->Session->setFlash(__('The evenement has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The evenement could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Evenement.' . $this->Evenement->primaryKey => $id));
            $this->request->data = $this->Evenement->find('first', $options);
        }
        $pvs = $this->Evenement->Pv->find('list');
        $this->set(compact('pvs'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Evenement->id = $id;
        if (!$this->Evenement->exists()) {
            throw new NotFoundException(__('Invalid evenement'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Evenement->delete()) {
            $this->Session->setFlash(__('The evenement has been deleted.'));
        } else {
            $this->Session->setFlash(__('The evenement could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
