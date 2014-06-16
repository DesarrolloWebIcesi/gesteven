<?php
/**
 * Actualiza el rol de un usuario a Monitor
 *
 * @author Alejandro Orozco - aorozco
 * @since 25/02/11
 * @package src
 */
session_start();
include_once("../class/Evento.php");
$respuesta = Array();
$return = Evento::actualizarRolUsuario($_POST['sched_conf_id'], $_POST['username']);
$return['msg'] = htmlentities($return['msg']);
//print_r($return);
echo json_encode($return);
?>