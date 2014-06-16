<?php
/**
 * Controlador que maneja los registros de asistencia
 * @author aorozco - Alejandro Orozco
 * @since 2011-02-21
 * @package src
 */
session_start();
include_once("../class/Evento.php");

$return = Array();
switch ($_POST['operacion'])
{
  case 'entrada':
    $return = Evento::registrarIngreso($_POST['codigo_barras'], $_POST['paper_id'], $_POST['sched_conf_id']);
    break;
  case 'salida':
    $return = Evento::registrarSalida($_POST['codigo_barras'], $_POST['paper_id'], $_POST['sched_conf_id']);
    break;
  case 'salida_masiva':
    $return = Evento::verificarMasivo($_POST['paper_id'], $_POST['operacion'], null);
    break;
  case 'confirmacion_salida_masiva':
    $return = Evento::registrarSalidaMasiva($_POST['paper_id']);
    break;
  case 'cambio_masivo':
    $return = Evento::verificarMasivo($_POST['paper_id'], $_POST['operacion'], $_POST['paper_id_siguiente']);
    $_SESSION['usuarios_cambio'] = Evento::$usuarios;
    break;
  case 'confirmacion_cambio_masivo':
    Evento::$usuarios = $_SESSION['usuarios_cambio'];
    $return = Evento::registrarCambioMasivo($_POST['paper_id'], $_POST['paper_id_siguiente']);
    unset($_SESSION['usuarios_cambio']);
    break;
  default:
    $return['error'] = -1;
    $return['msg'] = "Operación desconocida " + $_POST['operacion'];
    break;
}
$return['msg'] = htmlentities($return['msg']);

echo json_encode($return);
?>