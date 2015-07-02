<?php

// appel de la classe de base de données
$host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    var_dump($uri);
    var_dump($host);
    echo "<pre>";
    var_dump($_SERVER['SCRIPT_FILENAME']);
    echo "</pre>";
   
die();
require_once APP . "Config" . DS . "database.php";
$db = new DATABASE_CONFIG();
echo "<pre>";
print_r($db->default);
echo "</pre>";
die('1');
?>