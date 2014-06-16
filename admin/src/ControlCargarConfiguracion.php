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
$tab = $_GET['tab'];

$levento= Evento::consultarDetalles('lapso_evento', $id_evento);
$lpaper= Evento::consultarDetalles('lapso_paper', $id_evento);
$fcmc= Evento::consultarDetalles('calculo_certificado', $id_evento);
$pasistencia= Evento::consultarDetalles('porc_asistencia', $id_evento);
$npapers= Evento::consultarDetalles('num_presentaciones', $id_evento);
$mensaje= Evento::consultarDetalles('mensaje_certificado', $id_evento);
$margen = Evento::consultarDetalles('margen_certificado', $id_evento);
//jdholguin - se tiene en cuenta el valor de si debe incluir o no la cédula en el certificado
$incluir_id = Evento::consultarDetalles('incluir_id_certificado', $id_evento);
$campos = Evento::consultarDetallesGlobales('campos', $id_evento);
$campo = explode('|',$campos);
$valores_campos = Evento::consultarDetallesGlobales('valores_campos', $id_evento);
$valores_campo = explode(';',$valores_campos);

$conf_evento= array();
$conf_evento['levento']=$levento;
$conf_evento['lpaper']=$lpaper;
$conf_evento['fcmc']=$fcmc;
$conf_evento['pasistencia']=$pasistencia;
$conf_evento['npapers']=$npapers;
$conf_evento['mensaje']=$mensaje;
$conf_evento['margen']=$margen;
//jdholguin - se agrega la configuración del id en el arreglo del evento
$conf_evento['incluir_id']=$incluir_id;
$conf_evento['listado_lugares'] = Evento::consultarDetallesGlobales('lugares', $id_evento);
$conf_evento['listado_organizaciones'] = Evento::consultarDetallesGlobales('listado_organizaciones', $id_evento);
$conf_evento['campo_personalizado_1'] = $campo[0];
$conf_evento['campo_personalizado_2'] = $campo[1];
$conf_evento['campo_personalizado_3'] = $campo[2];
$conf_evento['campo_personalizado_4'] = $campo[3];
$conf_evento['campo_personalizado_5'] = $campo[4];
$conf_evento['valor_campo_personalizado_1'] = $valores_campo[0];
$conf_evento['valor_campo_personalizado_2'] = $valores_campo[1];
$conf_evento['valor_campo_personalizado_3'] = $valores_campo[2];
$conf_evento['valor_campo_personalizado_4'] = $valores_campo[3];
$conf_evento['valor_campo_personalizado_5'] = $valores_campo[4];

$_SESSION['configuracion']=$conf_evento;

header('Location: ../gui/configuracion.php?exito='.$_GET['exito'].'#'.$tab);

?>
