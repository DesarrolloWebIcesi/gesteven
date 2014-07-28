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
$id_evento = $_SESSION['sched_conf_id'];
$id_asistente = $_GET['per'];

if ($id_evento == null || $id_evento == '') {
    header('Location: ../gui/formulario.php');
} else {
    if ($id_asistente == null || $id_asistente == '') {
        header('Location: ControlAsisConferencia.php?sched_conf_id=' . $id_evento . '');
    } else {
        $presentaciones = ControlReportes::asistencia_persona($id_asistente, $id_evento);
        $datos=  ControlReportes::porcentaje_asistencia($id_asistente, $id_evento);
        $_SESSION['presentaciones'] = $presentaciones;
        $_SESSION['datos_per']=$datos;
        $_SESSION['rsched_conf_id'] = $id_evento;
        //print_r($_SESSION['asistentes']);
        header('Location: ../gui/reporte_asistenciaper.php');
    }
}
?>
