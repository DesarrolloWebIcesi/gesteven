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
require_once '../lib/recaptchalib.php';
$privatekey = "6LfBMcoSAAAAAFAVMP8iC2gonivoTaYQbvyiVkMf";
$valido = true;
if ($_POST['publico'] == 1)
{
  $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
  $valido = $resp->is_valid;
}

if ($valido)
{
  $campos = $_POST['campo_personalizado_1'] . ";" . $_POST['campo_personalizado_2'] . ";" . $_POST['campo_personalizado_3'] . ";" . $_POST['campo_personalizado_4'] . ";" . $_POST['campo_personalizado_5'];
  if($_POST['tipo_inscripcion'] != null && $_POST['tipo_inscripcion'] != ""){
    $return = Evento::crearInscrito($_POST['tipo_inscripcion'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['codigo_barras'], $_POST['sched_conf_id'], $_POST['username'], $_POST['transaccion'], $_POST['asignado'], $campos, $_POST['lugar'], $_POST['organizacion'], $_POST['genero']);
  }else{
    $return['error'] = 1;
    $return['msg'] = htmlentities("Debe seleccionar un tipo de inscripción"); 
  }
} else
{
  $return['error'] = 1;
  $return['msg'] = "Error en el captcha, por favor intente de nuevo";
}
echo json_encode($return);
?>