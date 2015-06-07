<?php

App::uses('AppModel', 'Model');

class DesignationFacture extends AppModel {

    //public $recursive = -1;
    public $useTable = 'designations_factures';
    public $belongsTo = array(
        'Facture'
    );

}
