<?php
/**
 * Autentica un usuario contra la BD de OCS
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
session_start();
include_once("../class/Autenticacion.php");

$log = $_POST['login'];
$pass = $_POST['password'];

$aut = Autenticacion::autenticarUsuario($log, $pass);

$return['error'] = 1;
switch ($aut)
{
  case 0:
    $_SESSION['user_id'] = $log;
    $return['error'] = 0;
    $return['usuario'] = $log;
    //echo "OK";
//			echo "<script languaje='Javascript'>
//			location.href=\"../gui/formulario.php\";
//			</script>";
    break;
  case 1:
    $return['msg'] = htmlentities("Su nombre de usuario no existe en la base de datos");
//			echo "<script languaje='Javascript'>
//			alert('Su identificaci�n no existe en la base de datos de la Universidad, por favor comun?quese con la oficina de admisiones (si es estudiante) o personal (si es colaborador o profesor)');
//			location.href=\"../index.php\";
//			</script>";
    break;
  case 2:
    $return['msg'] = htmlentities("Nombre de usuario o contrase�a incorrectos");
//			echo "<script languaje='Javascript'>
//			alert('Identificaci�n o contrase�a err�nea');
//			location.href=\"../index.php\";
//			</script>";
    break;
  case 3:
    $return['msg'] = htmlentities("En este momento el sistema no est� disponible. Por favor intente m�s tarde");
//			echo "<script languaje='Javascript'>
//			alert('En este momento el sistema no est� disponible<br/>Por favor intente m�s tarde');
//			location.href=\"../index.php\";
//			</script>";
    break;
  default:
    $return['msg'] = htmlentities("Error desconocido");
//			echo "<script languaje='Javascript'>
//			alert('Error desconocido');
//			location.href=\"../index.php\";
//			</script>";
    break;
}
echo json_encode($return);
?>