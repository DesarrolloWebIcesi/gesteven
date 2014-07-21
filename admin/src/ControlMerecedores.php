<?php
/**
 * Este archivo se encarga de cargar en la sessión el listado de los asistentes a
 * la conferencia identidicada con el código recibido en la variable $_GET['sched_conf_id']
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
/**
 * Control de acceso a la información de eventos
 */
include_once ('../class/Evento.php');

session_start();
$id_evento=$_SESSION['sched_conf_id'];
if($id_evento==null || $id_evento==''){

    header('Location: ../gui/formulario.php');
}else{
    $npapers= Evento::consultarDetalles('num_presentaciones', $id_evento);
    if($npapers==null || $npapers==''){
        header('Location: ControlCargarConfiguracion.php?tab=conf_sistema');
    }else{
        $merecedores=ControlReportes::merecedores_certificado($id_evento);
        $_SESSION['merecedores']=$merecedores;
        $_SESSION['rsched_conf_id']=$id_evento;
        //print_r($_SESSION['merecedores']);
        header('Location: ../gui/reporte_merecedores.php');
    }    
}

?>
