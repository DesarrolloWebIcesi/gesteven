<?php
/**
 * Este archivo se hace cargo del manejos de las variables de sesión que tienen que
 * ver con el rol del usuario dentro de cada evento.
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */

session_start();
include_once '../class/Evento.php';
$_SESSION['sched_conf_id'] = $_POST['sched_conf_id'];
$_SESSION['evento_activo'] = true;
$_SESSION['role_id'] = Evento::consultarRol($_SESSION['sched_conf_id'], $_SESSION['user_id']);
$resultado = Array();
if ($_SESSION['role_id'] > 96 || $_SESSION['sched_conf_id'] == "")
{
  $resultado['error'] = 1;
} else
{
  $resultado['error'] = 0;
}
echo json_encode($resultado);
?>
