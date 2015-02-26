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
$id_conferencia=$_SESSION['sched_conf_id'];
if($id_conferencia==null || $id_conferencia==''){

    header('Location: ../gui/formulario.php');
}else{
    $presentaciones=ControlReportes::asistencia_totalizada($id_conferencia);
    $_SESSION['presentaciones']=$presentaciones;
    $_SESSION['sched_conf_id']=$id_conferencia;
    //print_r($_SESSION['asistentes']);
    header('Location: ../gui/reporte_asistenciatotalizada.php');
}

?>
