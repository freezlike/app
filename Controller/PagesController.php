<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public function home() {
        $this->set('title_for_layout',__("Dashboard"));
    }

}
