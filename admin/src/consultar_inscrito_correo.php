<?php
/**
 * Consulta la información de un usuario inscrito a un evento
 * 
 * 2014-12-13 damanzano
 * Se agregaron algunas líneas de documentación a este controlador, explicando 
 * lo que hace exactamente para facilitar su mantenimiento.
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
session_start();
include_once("../class/Evento.php");

$evento = $_POST['sched_conf_id'];
$usuario = $_POST['user_id'];

// Consultar si el usuario ya esta inscrito para el evento dato.
$return = Evento::consultarInscritoEmail($evento, $usuario);
if (!empty($return))
{ 
  // El usuario esta inscrito
  $return['error'] = 0;
  $return['transaccion'] = "I";
} else
{
  /* 
   * El usuario no estan inscrito en el evento dado, pero puede estar registrado
   * en el sistema.
   */
  $return = Evento::consultarUsuarioEmail($evento, $usuario);
  if (!empty($return)){
    /* 
     * El usuario se encuentra registrado se deben actulizar sus datos e 
     * incribirlo al evento.
     */
    $return['error'] = 0;
    $return['transaccion'] = "A";
  }else{
    // El usuario no se encuentra registado en el sistema y se debe crear.  
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
