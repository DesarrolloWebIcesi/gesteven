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

$return = Evento::consultarInscrito($evento, $usuario);
if (!empty($return))
{
  $return['error'] = 0;
  $return['transaccion'] = "I";
} else
{
  if($_POST['version'] == 2){
    $return = Evento::consultarUsuario($evento, $usuario);
    if (!empty($return)){
      $return['error'] = 0;
      $return['transaccion'] = "A";
    }else{
      $return['error'] = 1;
      $return['msg'] = "El usuario no esta inscrito para este evento";
      $return['transaccion'] = "C";
    }
  }else{
      $return['error'] = 1;
      $return['msg'] = "El usuario no esta inscrito para este evento";
      $return['transaccion'] = "C";    
  }
}
$cadenas = Array();
foreach ($return as $posicion => $cadena)
{
  $cadenas[$posicion] = $cadena;
}
echo json_encode($cadenas);
?>