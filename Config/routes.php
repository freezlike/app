<?php

Router::parseExtensions('json');
Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
Router::connect('/Dashboard', array('controller' => 'pages', 'action' => 'home'));
/**
 * Router Users
 */
Router::connect('/gestion-users', array('controller' => 'users', 'action' => 'index'));
Router::connect('/gestion-users/ajout', array('controller' => 'users', 'action' => 'edit'));
Router::connect('/gestion-users/modif-:id', array('controller' => 'users', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-users/Virement-:id', array('controller' => 'payments', 'action' => 'virement'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-users/supp-:id', array('controller' => 'users', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-users/more-:id', array('controller' => 'users', 'action' => 'more'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-users/cv-:id', array('controller' => 'users', 'action' => 'cv'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Projets
 */
Router::connect('/gestion-projets', array('controller' => 'projets', 'action' => 'index'));
Router::connect('/gestion-projets/ajout', array('controller' => 'projets', 'action' => 'edit'));
Router::connect('/gestion-projets/modif-:id', array('controller' => 'projets', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-projets/supp-:id', array('controller' => 'projets', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Postes
 */
Router::connect('/gestion-postes', array('controller' => 'postes', 'action' => 'index'));
Router::connect('/gestion-postes/ajout', array('controller' => 'postes', 'action' => 'edit'));
Router::connect('/gestion-postes/modif-:id', array('controller' => 'postes', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-postes/supp-:id', array('controller' => 'postes', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Task
 */
Router::connect('/gestion-taches/modif-:id', array('controller' => 'taches', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Client
 */
Router::connect('/gestion-client/modif-:id', array('controller' => 'contacts', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Contact
 */
Router::connect('/gestion-contact/modif-:id', array('controller' => 'societes', 'action' => 'edit_sc'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Societe
 */
Router::connect('/gestion-societe/modif-:id', array('controller' => 'societes', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Diplome
 */
Router::connect('/gestion-diplome/ajout', array('controller' => 'diplomes', 'action' => 'ajout_diplome'));
Router::connect('/gestion-diplome/modif-:id', array('controller' => 'diplomes', 'action' => 'ajout_diplome'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-diplome/supp-:id', array('controller' => 'diplomes', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Departments
 */
Router::connect('/gestion-departements/modif-:id', array('controller' => 'departements', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-departement/supp-:id', array('controller' => 'departements', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Competence
 */
Router::connect('/gestion-competence/modif-:id', array('controller' => 'competences', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-competence/supp-:id', array('controller' => 'competences', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));
/**
 * Router Reclamations
 */
Router::connect('/gestion-competence/modif-:id', array('controller' => 'reclamations', 'action' => 'edit'), array('pass' => array('id'), 'id' => '[0-9]+'));
Router::connect('/gestion-competence/supp-:id', array('controller' => 'reclamations', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));


Router::connect('/gestion-commerciale/comm-:id', array('controller' => 'users', 'action' => 'liste_client'), array('pass' => array('id'), 'id' => '[0-9]+'));
//Router::connect('/gestion-competence/supp-:id', array('controller' => 'reclamations', 'action' => 'delete'), array('pass' => array('id'), 'id' => '[0-9]+'));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
