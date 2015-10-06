<?php
/**
 * Este archivo se encarga de cargar en la sessión el listado de los asistentes a
 * la conferencia identidicada con el código recibido en la variable $_SESSION['sched_conf_id']
 * 
 * @author David Andrés Manzano - damanzano
 * @since 15/02/11
 * @package src
 *
 */

/**
 * Libreria de manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 *Control de acceso a la informacion de reportes
 */
include_once('ControlReportes.php');

session_start();
$id_evento=$_SESSION['sched_conf_id'];
if($id_evento==null || $id_evento==''){

    header('Location: ../gui/formulario.php');
}else{
    $asistentes=ControlReportes::inscritos($id_evento);
    $_SESSION['asistentes']=$asistentes;
    $_SESSION['rsched_conf_id']=$id_evento;
    //print_r($_SESSION['asistentes']);
    header('Location: ../gui/reporte_inscritos.php');
}

?>
