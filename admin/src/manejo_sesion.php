<?php

/**
 * Control encargado del manejo de sessi�n de la aplicaci�n
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
include_once '../Configuracion.php';
session_start();
/**
 * Verifica tiempo de inactividad y si el usuario es v�lido, si no se cumple
 * alguna de estas condiciones se cierra la sesi�n
 * @package src
 */
if (isset($_SESSION['ultimoAcceso']) && isset($_SESSION['user_id']))
{
  $tiempoUltimoAcceso = time() - $_SESSION['ultimoAcceso'];
  if ($tiempoUltimoAcceso >= Configuracion::$maximoInactivo)
  {
    session_destroy();
    header("Location: ../src/salir.php");
  }
}
$_SESSION['ultimoAcceso'] = time();
if (isset($_SESSION['user_id']))
{
  $usuario = $_SESSION['user_id'];
} else
{
  header("Location: ../index.php");
}
?>
