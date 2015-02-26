<?php
/**
 * Consulta la información de un usuario inscrito a un evento
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
session_start();
include_once("../class/Evento.php");

$evento = $_POST['sched_conf_id'];
$usuario = $_POST['user_id'];

$return = Evento::consultarInscritoEmail($evento, $usuario);
if (!empty($return))
{
  $return['error'] = 0;
  $return['transaccion'] = "I";
} else
{
  $return = Evento::consultarUsuarioEmail($evento, $usuario);
  if (!empty($return)){
    $return['error'] = 0;
    $return['transaccion'] = "A";
  }else{
    $return['error'] = 1;
    $return['transaccion'] = "C";
  }
}
$cadenas = Array();
foreach ($return as $posicion => $cadena)
{
  //$cadenas[$posicion] = utf8_encode($cadena);
  $cadenas[$posicion] = $cadena;
}
echo json_encode($cadenas);
?>