<?php
/**
 * Actualiza la información de un usuario inscrito al evento
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
session_start();
include_once("../class/Evento.php");
$respuesta = Array();
$return = Evento::actualizarInscrito($_POST['nombre'], $_POST['segundo_nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['codigo_barras'], $_POST['sched_conf_id'], $_POST['username'], $_POST['asignado']);
if ($return)
{
  $respuesta['error'] = 0;
  $respuesta['msg'] = "Se actualizaron los datos correctamente";
} else
{
  $respuesta['error'] = 1;
  $respuesta['msg'] = "Error al actualizar los datos";
}
echo json_encode($respuesta);
?>