<?php
/**
 * Consulta la información de un usuario registrado en OCS
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
session_start();
include_once("../class/Evento.php");

$evento = $_POST['sched_conf_id'];
$usuario = $_POST['user_id'];

$return = Evento::consultarUsuario($evento, $usuario);
if (!empty($return))
{
  $return['error'] = 0;
} else
{
  $return['error'] = 1;
  $return['msg'] = "Este usuario no esta registrado";
}
$cadenas = Array();
foreach ($return as $posicion => $cadena)
{
  //$cadenas[$posicion] = utf8_decode($cadena);
  $cadenas[$posicion] = $cadena;
}
$cadenas['rol'] = Evento::consultarRol($_POST['sched_conf_id'], $_POST['user_id']);
$rol = "";
switch($cadenas['rol']){
  case 1:
    $rol = "Administrador del sitio";
    break;
  case 16:
    $rol = "Gestor del evento";
    break;
  case 64:
    $rol = "Director";
    break;
  case 96:
    $rol = "Monitor";
    break;
  case 128:
    $rol = "Director de track";
    break;
  case 4096:
    $rol = "Autor";
    break;
  case 32768:
    $rol = "Lector";
    break;
  default:
    $rol = "No asignado";
    break;
}
//$cadenas['rol_texto'] = utf8_decode($rol);
$cadenas['rol_texto'] = $rol;
echo json_encode($cadenas);
?>