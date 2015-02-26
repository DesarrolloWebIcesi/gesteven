<?php

/**
 * Controlador que maneja la consulta de los elementos para las listas desplegables
 * @author damanzano - David Andrés Manzano Herrera 
 * @since 24-08-2011
 * @package src
 */

/**
 * Libreria de manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 * Libreria de consultas de los eventos
 */
include_once('../class/Evento.php');
$args=$_POST;
$jsonResponse['error'] = true;
switch ($args['list']){
    case 'ponencias':
        $ponencias=Evento::consultarPapersListados($args['sched_conf_id']);
        $jsonResponse['list'] = $ponencias;
        $jsonResponse['error'] = false;
        break;
    default: echo 'do something';
}
echo json_encode($jsonResponse);
?>
