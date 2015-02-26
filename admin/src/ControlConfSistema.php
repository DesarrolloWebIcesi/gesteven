<?php
/**
 * Este archivo se encarga de leer la configuración del correspondiente al sistema,
 * ingresada por el usuario y de guardarla en la base de datos
 * 
 * @author David Andrés Manzano - damanzano
 * @since 25/02/11
 * @package src
 *
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * Libreria de manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 * Control de acceso a la información de eventos
 */
include_once ('../class/Evento.php');

session_start();
$id_evento = $_SESSION['sched_conf_id'];
$levento=(($_POST['lapsoevento']!=null) && ($_POST['lapsoevento']!=''))? $_POST['lapsoevento']:$levento=$_POST['hlapsoevento'];
$lpaper=(($_POST['lapsopaper']!=null)&& ($_POST['lapsopaper']!=''))? $_POST['lapsopaper']:$_POST['hlapsopaper'];
$fcmc=(($_POST['fcmc']!=null) && ($_POST['fcmc']!=''))? $_POST['fcmc']:$_POST['hfcmc'];
$pasistencia=(($_POST['porc_asistencia']!=null) && ($_POST['porc_asistencia']!=''))? $_POST['porc_asistencia']:$_POST['hporc_asistencia'];
$npapers=(($_POST['n_presentaciones']!=null) && ($_POST['n_presentaciones']!=''))? $_POST['n_presentaciones']:$_POST['hn_presentaciones'];
$campos = $_POST['campo_personalizado_1']."|".$_POST['campo_personalizado_2']."|".$_POST['campo_personalizado_3']."|".$_POST['campo_personalizado_4']."|".$_POST['campo_personalizado_5'];
$valores_campos = $_POST['valor_campo_personalizado_1'].";".$_POST['valor_campo_personalizado_2'].";".$_POST['valor_campo_personalizado_3'].";".$_POST['valor_campo_personalizado_4'].";".$_POST['valor_campo_personalizado_5'];
$lugares =  $_POST['listado_lugares'];
$organizaciones =  $_POST['listado_organizaciones'];
if($pasistencia==null || $pasistencia==''){
    $pasistencia=0;
}
if($npapers==null || $npapers==''){
    $npapers=0;
}

//valores anteriores
//$levento=$_POST['hlapsoevento'];
//$levento=$_POST['hlapsopaper'];
//$levento=$_POST['hfcmc'];
//$levento=$_POST['hporc_asistencia'];
//$levento=$_POST['hn_presentaciones'];

$exito = Evento::configurar_sistema($id_evento, $levento, $lpaper,$fcmc,$pasistencia,$npapers,$lugares,$campos,$valores_campos,$organizaciones);
header('Location: ControlCargarConfiguracion.php?tab=conf_sistema&exito='.$exito);

?>
