<?php

/******** INICIO PAR�METROS DE ENTRADA ********/
// Correo del remitente
$from = 'lhsalguero@icesi.edu.co';//sistema
// Nombre del remitente
$from_name = 'Sinergia';//sistema
// Campo Asunto
$asunto = 'Certificado de asistencia a Sinergia 5';//sistema
// Cuerpo del correo
$mensaje = '
Adjunto se encuentra el certificado de asistencia a Sinergia 5.

Muchas gracias por su participaci�n, lamentamos la demora con el mismo y le invitamos a estar en contacto con nosotros para obtener m�s informaci�n sobre nuestros pr�ximos eventos.

http://www.icesi.edu.co/sinergia
http://www.twitter.com/sinergiaicesi
http://www.youtube.com/user/SinergiaIcesi

Lobsang Salguero B.
Director Sinergia
Departamento de mercadeo y negocios internacionales
Universidad Icesi
';
// Imagen del certificado
$imagen = "final_asistentes_sinergia.jpg";
// Archivo de entrada separado por ;
$archivo_entrada = "asistentes_sinergia4.csv";
//$archivo_entrada = "correcciones.csv";
//$archivo_entrada = "prueba.csv";
/******** FINAL PAR�METROS DE ENTRADA ********/

// Incluyendo la clase generadora de PDF's
include_once("generadorpdf/class.ezpdf.php");

// Incluyendo la clase para enviar correos
include_once("phpmailer/class.phpmailer.php");

// Abriendo el archivo de entrada
$file_in  = fopen("$archivo_entrada", "r");
// Se lee el archivo de entrada l�nea por l�nea
while($linea = fgets($file_in, 1024))
{
    // Reemplazando los saltos de l�nea por vac�o
    $linea = str_replace(array("\r", "\n"), "", $linea);
    // Si la l�nea no est� vac�a
    if(!is_null($linea))
    {
        // Partiendo la l�nea por el caracter separador ;
        $datos = explode(";", $linea);
        // Nombre del asistente y destinatario
        $nombre = $datos[0];
        // Correo del asitente y destinatario
        $para = $datos[1];

        // Creando el objeto pdf
        $pdf = new Cezpdf("Letter","landscape");
        // Estableciendo las margenes del pdf
        $pdf->ezSetMargins(10,10,10,10);
        // Insertando imagen JPG
        if(file_exists($imagen))
        {
          $pdf->addJpegFromFile($imagen,0,0, 795, 610);
        }
        // Seleccionando fuente helvetica en negrilla
        $pdf->selectFont("generadorpdf/fonts/Helvetica-Bold.afm");
        // Ubicandose en la posici�n y=390
        $pdf->ezSetY(370);
        // Escribiendo el nombre del asistente
        $pdf->ezText($nombre, 30, array('left'=>23,'right'=>50,'justification'=>'center'));
        // Guardando el pdf en un archivo en el servidor
        $pdfcode = $pdf->output();
        // Abriendo el archivo
        $fp = fopen('asistencia_Sinergia.pdf','wb');
        // Escribiendo en el archivo
        fwrite($fp, $pdfcode);
        // Cerrando el archivo
        fclose($fp);

        // Creando el objeto para enviar correos
        $envio = new phpmailer();
        // Asignando el tipo de env�o de correo
        $envio->IsMail();
        // Asignando la direcci�n de correo
        $envio->AddAddress($para, $nombre);
        // Agregando el archivo adjunto
        $envio->AddAttachment('/home/sicesi/enviopdf/asistencia_Sinergia.pdf');
        // Agregando el correo del remitente
        $envio->From = $from;
        // Agregando el nombre del remitente
        $envio->FromName = $from_name;
        // Agregando el asunto
        $envio->Subject = $asunto;
        // Agregando el cuerpo del correo
        $envio->Body = 'Cordial saludo '.$nombre.'
        '.$mensaje;
        // Enviando el correo
        $envio->send();
    }// Fin if(!is_null($linea))
}// Fin while($linea = fgets($file_in, 1024))

// Borrando el archivo pdf
unlink('/home/sicesi/enviopdf/asistencia_Sinergia.pdf');

?>
