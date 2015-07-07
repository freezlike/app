<?php

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'install.php';
/**
 * Si le Fichier d'installation
 * exist on démarre l'installation
 */
if (file_exists($extra)) {
    header("Location: http://$host$uri/$extra");
    /**
     * Sinon on se connecte
     */
    exit;
}