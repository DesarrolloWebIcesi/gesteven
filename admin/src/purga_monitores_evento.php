<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
* Carga masiva de usuarios en un evento.
* @package gui
*/
/**
* Manejo de sesión
*/
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
include_once '../Configuracion.php';

extract($_POST);
$tipo="";
$Asignado = "";


//Purga de monitores
try{
	$mysql = new Mysql();
	$mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
	$purga = "delete from roles WHERE sched_conf_id=".$_POST['sched_conf_id']." AND role_id = 96";
	$resultado = mysql_query ($purga);
	if($resultado){
		$_SESSION['resultado_purga_monitor'] = "OK".$_POST['sched_conf_id'];
		unset ($_SESSION['asistentes']); 
	}else{
		$_SESSION['resultado_purga_monitor'] =  "Error en la consulta";
	}
}catch(Exception $e){
	$_SESSION['resultado_purga_monitor'] =  "Error: ".$e;
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = str_replace("src","gui",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
$uri_log = str_replace("src","logs",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
$extra = 'purga_monitores.php';
header("Location: http://$host$uri/$extra");

?>