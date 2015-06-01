<?php

App::uses('AppController', 'Controller');

/**
 * Attachements Controller
 *
 * @property Attachement $Attachement
 * @property PaginatorComponent $Paginator
 */
class AttachementsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function valid_attachement() {
        $message = 'error';
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $type = $data['Attachement']['FileInput']['type'];
            echo json_encode($type);
            die();
            switch (strtolower($type)) {
                //allowed file types
                case 'image/png':
                case 'image/gif':
                case 'image/jpeg':
                case 'image/pjpeg':
                case 'text/plain':
                case 'text/html': //html file
                case 'application/x-zip-compressed':
                case 'application/pdf':
                case 'application/msword':
                case 'application/vnd.ms-excel':
                case 'video/mp4':
                    break;
                default:
                    echo json_encode($message);
                    die();
            }
            $File_Name = strtolower($data['Attachement']['FileInput']['name']);
            $File_Ext = substr($File_Name, strrpos($File_Name, '.')); //get file extention
            echo json_encode('START');
            echo json_encode($data);
            die();
            if ($this->Attachement->save($data['Attachement'])) {
                $message = 'success';
            }
        }
        echo json_encode($message);
        die();

//        if ($this->request->is('ajax')) {
//            //debug($this->request->data);
//            $data = $this->request->data;
//            $attach = $this->Attachement->read();
//            $ext = $this->request->data['Attachement']['name'];
//            $ext = explode('.', $ext);
////            debug($ext);
//            $filename = $attach['Attachement']['name'] . '.' . $ext[1];
//            //debug(is_dir(FILES . $user['User']['first_name'] . '.' . $user['User']['last_name'] . '.' . $id));
//            if (!is_dir(FILES . $attach['Attachement']['name'])) {
//                mkdir(FILES . $attach['Attachement']['name']);
//            }
//            $dir = FILES . DS . $attach['Attachement']['name'];
//            $this->Attachement->saveField('attach_url', $attach['Attachement']['name']. DS . $filename);
//            
//        }
    }

}
