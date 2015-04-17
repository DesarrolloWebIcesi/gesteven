<?php

/**
 * Este archivo se encarga de cargar en la sessión el listado de los asistentes a
 * la conferencia identidicada con el código recibido en la variable $_SESSION['sched_conf_id']
 * 
 * @author David Andrés Manzano - damanzano
 * @since 15/02/11
 * @package src
 *
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
 * Generador de PDF
 */
include_once ('../lib/generadorpdf/class.ezpdf.php');

session_start();
$id_evento = $_SESSION['sched_conf_id'];
$imagen = Evento::consultarDetalles('imagen_certificado', $id_evento);
$margen = Evento::consultarDetalles('margen_certificado', $id_evento);
//jdholguin - se consulta si debe incluir o no el número de cédula (username)
$incluir_id = Evento::consultarDetalles('incluir_id_certificado', $id_evento);
if ($imagen == null || $imagen == '' || $margen == null || $margen == '') {
    //no se ha configurado el certificado por tanto no se puede tener una vista previa
    header('Location: ../gui/configuracion.php#conf_certificado');
} else {
    //se genera el pdf con la vista previa
    // Creando el objeto pdf
    $pdf = new Cezpdf("Letter", "landscape");
    // Estableciendo las margenes del pdf
    $pdf->ezSetMargins(10, 10, 10, 10);
    // Insertando imagen JPG
    //echo "dir imagen:".$imagen;
    if (file_exists('../'.$imagen)) {
        //echo 'existe';
        $pdf->addJpegFromFile('../'.$imagen, 0, 0, 795, 610);
    }
    // Seleccionando fuente helvetica en negrilla
    $pdf->selectFont("../lib/generadorpdf/fonts/Helvetica-Bold.afm");
    // Ubicandose en la posición y=390
    $pdf->ezSetY($margen);
    // Escribiendo el nombre del asistente en este caso fulanito de tal
    $nombre = strtr(strtoupper('Nombre del asistente'),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
    $pdf->ezText($nombre, 30, array('left' => 0, 'right' => 0, 'justification' => 'center'));
	
	// jdholguin - se hace la validación de si debe contener la cédula y se agrega
	if($incluir_id == '1'){
		$pdf->ezText('CC: 0123456789', 30, array('left' => 0, 'right' => 0, 'justification' => 'center'));
	}
	// fin jdholguin

    // Entregando el pdf
    if (isset($d) && $d) {
        $pdfcode = $pdf->ezOutput(1);
        $pdfcode = str_replace("\n", "\n<br>", htmlspecialchars($pdfcode));
        echo '<html><body>';
        echo trim($pdfcode);
        echo '</body></html>';
    } else {
    	ob_end_clean();
        $pdf->ezStream();
    }
    // Guardando el pdf en un archivo en el servidor
    //$pdfcode = $pdf->output();
    // Abriendo el archivo
    //$fp = fopen('asistencia_Sinergia.pdf', 'wb');
    // Escribiendo en el archivo
    //fwrite($fp, $pdfcode);
    // Cerrando el archivo
    //fclose($fp);
}
?>
