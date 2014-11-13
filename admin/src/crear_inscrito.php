<?php

/**
 * Actualiza la informaci�n de un usuario inscrito al evento
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

     /* Autor: cdcriollo 
	    Fecha: 2014-09-10
		Descripci�n: Se modifico el script para que dependiendo del tipo de inscripci�n que el usuario realice, se envie un correo notificando al usuario de si fue preinscrito o inscrito al evento */
		
    // Si no hubo errores en la preinscripci�n o inscripci�n del usuario 		
	if($return['error']== 0)
	{
		//echo $_POST['transaccion'];
		
		if($_POST['transaccion'] != "I" )
		{
			//Cuerpo del mensaje del correo
			$mensaje_correo= "Cordial saludo, \n";
			$mensaje_correo.= "Por su asistencia al evento, los siguientes datos han sido ingresados al sistema de eventos: \n\n";
			
			$mensaje_correo.= "Correo: "  .$_POST['email']."\n";
			$mensaje_correo.="Nombre de usuario/Documento de identidad: "  .$_POST['username']."\n";
			$mensaje_correo.="Nombre(s): "  .$_POST['nombre']."\n";
			$mensaje_correo.="Apellido(s): "  .$_POST['apellidos']."\n";
			$mensaje_correo.="Tel�fono/Celular: "  .$_POST['telefono']."\n";
			 // Email del usuario
			$email= $_POST['email'];
			
			if($_POST['genero']== "M"){
			  $genero= "Masculino"; 	
			}
			else if($_POST['genero']== "F"){
			  $genero= "Femenino";	
			}
			$mensaje_correo.="G�nero: "  .$genero."\n";
			$mensaje_correo.="Direcci�n: "  .$_POST['lugar']."\n\n";
			
			$mensaje_correo.="Estos datos han sido registrados en la base de datos de gesti�n de eventos de la Universidad Icesi para prop�sitos de estad�sticas de asistencia a eventos acad�micos. Si desea que su informaci�n personal sea eliminada escriba un correo a midatopersonal@listas.icesi.edu.co ";
			
			//Se obtiene el nombre del evento
			$nombre_evento= Evento::consultarDetalles('title', $_POST['sched_conf_id']);
			//Dependiendo de si el remitente esta o no vacio se asigna el remitente del correo
			if($return['from'] != null && $return['from'] != "")
			{
			  $from= $return['from'];	
			}
			else
			{
			  $from= "multimedios@listas.icesi.edu.co";	
			}
			
			//dependiendo de si el codigo de barras tiene o no un valor se cambia el asunto del correo
			if( $_POST['codigo_barras'] != null && $_POST['codigo_barras'] != "")
			{
			   $asunto = "Notificaci�n de inscripci�n al evento"." ".$nombre_evento;	
			}
			else
			{
			  $asunto = "Notificaci�n de preinscripci�n al evento"." ".$nombre_evento;	
			}
			
    		$cabeceras =  'From: '.$from."\r\n" .
    				'Reply-To: '.$from."\r\n" .
    				"\r\n";
    		mail($email, $asunto, $mensaje_correo, $cabeceras);
			
		}
	}

    
    		/*$mensaje_correo = "Cordial saludo $pNombre, a continuaci�n detallamos la informaci�n de su cuenta para asistir a los eventos de la Universidad Icesi:\n
    		\n
    		-Usuario: $pUsuario\n
    		-Contrase�a: $pClave\n
    		\n
    		Recuerde que puede cambiar su contrase�a en la siguiente URL: https://www.icesi.edu.co/eventos/index.php/$conference_path/$sched_conf_path/user/changePassword\n";
    		$asunto = "Su cuenta en Gesti�n de Eventos de la Universidad Icesi";
    		$cabeceras =  'From: '.$from."\r\n" .
    				'Reply-To: '.$from."\r\n" .
    				"\r\n";
    		mail($pEmail, $asunto, $mensaje_correo, $cabeceras);*/
    			
    	
  }else{
    $return['error'] = 1;
    $return['msg'] = htmlentities("Debe seleccionar un tipo de inscripci�n"); 
  }
} else
{
  $return['error'] = 1;
  $return['msg'] = "Error en el captcha, por favor intente de nuevo";
}
echo json_encode($return);
?>