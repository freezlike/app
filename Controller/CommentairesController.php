<?php

App::uses('AppController', 'Controller');

/**
 * Commentaires Controller
 *
 * @property Commentaire $Commentaire
 * @property PaginatorComponent $Paginator
 */
class CommentairesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function valid_commentaire() {
        $message = 'error';
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            if ($this->Commentaire->save($data['Commentaire'])) {
                $message = 'success';
            }
        }
        echo json_encode($message);
        die();
    }

    public function list_commentaire() {
        if ($this->request->is('ajax')):
            $data = $this->request->data;

            $liste = $this->Commentaire->find('all', array(
                'conditions' => array('tache_id' => $data['tache_id'])
            ));
            header('HTTP/1.0 200 OK');
            echo json_encode($liste);
            die();
        endif;
        header("HTTP/1.0 404 Not Found");
        echo json_encode('error');
        die();
    }

}
