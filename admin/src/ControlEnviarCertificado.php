<?php

/**
 * Este archivo se encarga de cargar en la sessión el listado de los asistentes a
 * la conferencia identidicada con el código recibido en la variable $_SESSION['sched_conf_id']
 * 
 * @author David Andrés Manzano - damanzano
 * @since 21/02/11
 * @since 16/05/13 - jdholguin Se incluye la validación de que deba tener el número de cédula (correspondiente al username)
 * para algunos eventos y se incluye en el certificado.
 * @package src
 */
/**
 * Libreria de manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 * Control de acceso a la informacion de reportes
 */
include_once('ControlReportes.php');
/**
 * Control de acceso a la información de eventos
 */
include_once ('../class/Evento.php');
/**
 * Generdor de PDF
 */
include_once("../lib/generadorpdf/class.ezpdf.php");
/**
 * Envio de cooreo
 */
include_once("../lib/phpmailer/class.phpmailer.php");

session_start();
$id_evento = $_SESSION['sched_conf_id'];

//echo json_encode($resultado);
if ($id_evento == null || $id_evento == '') {
    header('Location: ../gui/formulario.php');
} else {
    $mensaje = Evento::consultarDetalles('mensaje_certificado', $id_evento);
    $imagen = '../'.Evento::consultarDetalles('imagen_certificado', $id_evento);
    $titulo_evento = Evento::consultarDetalles('title', $id_evento);
    

    if ($mensaje == null || $mensaje == '' || $imagen == null || $imagen == '') {
        //no se han configurado los parametros de los certificados
        header('Location: ../gui/configuracion.php#conf_certificado');
    } else {
        $asistentes = ControlReportes::merecedores_certificado($id_evento);
        //$asistentes[] = array("nombre" => "Pepito","apellido" => "Pérez", "correo" => "juansesb@hotmail.com");

        $nombre_archivo='asistencia_'.$id_evento.'.pdf';
        if($_POST['gen_confir']==true){
            $resultado = Array();

            foreach ($asistentes as $asistente) {
                $nombre = strtr(strtoupper($asistente['nombre'].' '.$asistente['apellido']),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
                $resultado['nombre'] = $nombre;
                $para = $asistente['correo'];
                $from = Evento::consultarDetalles('contactEmail', $id_evento);
                $margen = Evento::consultarDetalles('margen_certificado', $id_evento);
				//jdholguin - se consulta si debe incluir o no el número de cédula (username)
				$incluir_id = Evento::consultarDetalles('incluir_id_certificado', $id_evento);
                // Nombre del remitente
                $from_name = $titulo_evento;
                $asunto = 'Certificado de asistencia a '.$titulo_evento;

                // Creando el objeto pdf
                $pdf = new Cezpdf("Letter", "landscape");
                // Estableciendo las margenes del pdf
                $pdf->ezSetMargins(10, 10, 10, 10);
                // Insertando imagen JPG
                if (file_exists($imagen)) {
                    $pdf->addJpegFromFile($imagen, 0, 0, 795, 610);
                }
                // Seleccionando fuente helvetica en negrilla
                $pdf->selectFont("../lib/generadorpdf/fonts/Helvetica-Bold.afm");
                // Ubicandose en la posición y=390
                $pdf->ezSetY($margen);
                // Escribiendo el nombre del asistente
                $pdf->ezText($nombre, 30, array('left' => 23, 'right' => 50, 'justification' => 'center'));
				
				// jdholguin - se hace la validación de si debe contener la cédula y se agrega
				if($incluir_id == '1'){
					//consultar el username para los casos en que corresponden a la cédula
					$id_asistente = $asistente['username'];
					$pdf->ezText('CC: '.$id_asistente, 30, array('left' => 0, 'right' => 0, 'justification' => 'center'));
				}
				// fin jdholguin
				
                // Guardando el pdf en un archivo en el servidor
                $pdfcode = $pdf->output();
                // Abriendo el archivo
                $fp = fopen($nombre_archivo, 'wb');
                // Escribiendo en el archivo
                fwrite($fp, $pdfcode);
                // Cerrando el archivo
                fclose($fp);

                // Creando el objeto para enviar correos
                $envio = new phpmailer();
                // Asignando el tipo de envío de correo
                $envio->IsMail();
                // Asignando la dirección de correo
                $envio->AddAddress($para, $nombre);
                // Agregando el archivo adjunto
                $envio->AddAttachment('/home/sicesi/eventos/admin/src/'.$nombre_archivo);
                // Agregando el correo del remitente
                $envio->From = $from;
                // Agregando el nombre del remitente
                $envio->FromName = $from_name;
                // Agregando el asunto
                $envio->Subject = $asunto;
                // Agregando el cuerpo del correo
                $envio->Body = 'Cordial saludo ' . $nombre . ',

' . $mensaje;
                // Enviando el correo
                $envio->send();
            }
            $resultado['error'] = 0;
            // Borrando el archivo pdf
        unlink('/home/sicesi/eventos/admin/src/'.$nombre_archivo);
        //header('Location: ../gui/envio_certificados.php?from=genr');
        echo json_encode($resultado);
        }else{
            $_SESSION['ncertificados']=count($asistentes);
            header('Location: ../gui/envio_certificados.php?');
        }        
    }
}
?>
