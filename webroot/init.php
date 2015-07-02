<?php

//
//require_once '../../lib/Cake/Controller/Controller.php';
//require_once '../../lib/Cake/Network/CakeResponse.php';
//$controller = new Controller();

$url = 'install.php';
$host = $_SERVER['HTTP_HOST'];
$redirectUrl = $_SERVER['REQUEST_URI'];

if ($host === 'localhost' || $host === '127.0.0.1') {
    $projectName = explode('/', $redirectUrl);
    $redirectUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $host . "/" . $projectName[1] . "/";
}

if (file_exists($url)) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'install.php';
    header("Location: http://$host$uri/$extra");
    exit;
}