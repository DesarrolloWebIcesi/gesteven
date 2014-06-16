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
$jsonResponse['error'] = true;
$id_evento=$_SESSION['sched_conf_id'];
$id_ponencia=$_POST['paper_id'];
if($id_evento==null || $id_evento=='' || $id_ponencia==null || $id_ponencia==''){

    header('Location: ../gui/formulario.php');
}else{
    $asistentes=ControlReportes::asistentes_x_ponencia($id_evento, $id_ponencia);
    $_SESSION['asistentes']=$asistentes;
    $_SESSION['rsched_conf_id']=$id_evento;
    $_SESSION['rpaper_id']=$id_ponencia;
    $jsonResponse['error'] = false;
    $asistentes_utf8 = array();
    foreach($asistentes as $item){
      $item['nombre'] = utf8_encode($item['nombre']);
      $item['apellido'] = utf8_encode($item['apellido']);
      //echo $item['nombre'];
      $asistentes_utf8[]=$item;
    }
    //print_r($asistentes_utf8);
    $jsonResponse['assistants'] = $asistentes_utf8;
    echo json_encode($jsonResponse);
    
}

?>
