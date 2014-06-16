<?php
/**
 * Este archivo se encarga de generar el reporte de asistencia a una ponencia
 * en PDF o EXCEL según el parametró enviado en la varible $_GET['rep_format'].
 *
 * @author David Andrés Manzano - damanzano
 * @since 23/08/11
 * @package src
 */

/**
 * Libreria de consultas de los eventos
 */
include_once('../class/Evento.php');

session_start();
setlocale(LC_TIME, 'es_CO');

$formato=$_GET['rep_format'];
$id_evento=$_SESSION['rsched_conf_id'];
$id_ponencia=$_SESSION['rpaper_id'];
$titulo_evento=Evento::consultarDetalles('title', $id_evento);
$titulo_ponencia=Evento::consultarDetallesPaper('title', $id_ponencia);
$hoy = date("l, j \d\e F \d\e Y - H:i");
$hoy = strftime('%A, %d de %B de %Y')." - ".date('H:i');

switch ($formato) {
    case 'pdf':
        /**
         * Librearia para generaión de PDF
         */
        include_once ('../lib/generadorpdf/class.ezpdf.php');
        // Creando el objeto PDF
        $pdf = new Cezpdf("letter", "landscape");
        //Límites X: 792, Y: 612
        // Estableciendo las margenes
        $pdf->ezSetMargins(30, 30, 30, 30);

        // Generando el encabezado
        $encabezado = $pdf->openObject();
        $imagen = "../imgs/logo_icesi.jpg";
        if (file_exists($imagen)) {
            $pdf->addJpegFromFile($imagen, 30, 552, 100, 32);
        }
        //Título
        $pdf->ezSetY(582);
        $pdf->selectFont("../lib/generadorpdf/fonts/Helvetica-Bold.afm");
        $pdf->ezText("<b>SISTEMA DE GESTIÓN DE EVENTOS</b>", 16, array('left' => 265));
        $pdf->ezText("Reporte de asistentes por ponencia", 12, array('left' => 310));
        $pdf->selectFont("generadorpdf/fonts/Helvetica.afm");
        $pdf->ezText(" ", 10, array('left' => 0));

        //Barra gris
        $pdf->addJpegFromFile('../imgs/barra.jpg', 30, 520, 730, 17);
        $pdf->selectFont("../lib/generadorpdf/fonts/Courier.afm");
        $pdf->ezSetY(535);
        //$pdf->ezText(" RRAPWSALAS  - " . strtoupper($usuario[0]), 10);
        $pdf->ezSetY(535);
        $pdf->ezText($hoy, 10, array('justification' => 'centre'));
        $pdf->ezStartPageNumbers(680, 35, 10, "right", "Página {PAGENUM} de {TOTALPAGENUM}");
        //$pdf->ezText("Página ".$pdf->ezGetCurrentPageNumber()." de ", 10, array('justification'=>'right'));
        $pdf->selectFont("../lib/generadorpdf/fonts/Helvetica.afm");

        $pdf->ezSetY(515);
        $pdf->ezText("Asistentes a la ponencia : ".$titulo_ponencia." en el evento " . $titulo_evento, 10, array('left' => 0));

        // Cerrando objetos que irán en todas las páginas
        $pdf->closeObject();
        $pdf->addObject($encabezado, 'all');


        // Agregando objetos a todas las páginas
        $pdf->ezSetMargins(102, 50, 30, 30);
        $pdf->ezSetY(505);

        // Seleccionando fuente helvetica normal
        $pdf->selectFont("generadorpdf/fonts/Helvetica.afm");

        // Asignando salto de línea a 10pt
        $pdf->ezSetDy(10);
        // Datos de la tabla
        $datos = $_SESSION['asistentes'];
        // Títulos para la tabla
        $titulos = array('username' => '<b>Nombre de Usuario</b>', 'nombre' => '<b>Nombre</b>', 'apellido' => '<b>Apeliido</b>', 'correo' => '<b>Correo</b>', 'entrada' => '<b>Entrada</b>', 'salida' => '<b>Salida</b>');
        // Configuración para la tabla
        $configuracion = array('showHeadings' => 1, 'shaded' => 0, 'showLines' => 2, 'width' => 730, 'xPos' => 35, 'xOrientation' => 'right');
        // Escribiendo dos saltos de línea
        $pdf->ezText(" ");
        $pdf->ezText(" ");
        // Dibujando la tabla
        $pdf->ezTable($datos, $titulos, "", $configuracion);
        $pdf->ezText(" ");

        // Entregando el pdf
        if (isset($d) && $d) {
            $pdfcode = $pdf->ezOutput(1);
            $pdfcode = str_replace("\n", "\n<br>", htmlspecialchars($pdfcode));
            echo '<html><body>';
            echo trim($pdfcode);
            echo '</body></html>';
        } else {
            $pdf->ezStream();
        }
        break;
    case 'xls':
        /**
         * Libreria para generacion de XLS
         */
        include_once "../lib/generadorxls/Spreadsheet/Writer.php";

        // Creando el libro
        $libro_trabajo = new Spreadsheet_Excel_Writer();

        // Asignando el nombre del archivo que se va a generar
        $libro_trabajo->send("reporte_asistentes_ponencia.xls");

        // El nombre no puede ser muy largo porque no genera el XLS
        $nombre_hoja = "Reporte de asistencia";

        // Creando la Hoja de trabajo
        $hoja_trabajo = &$libro_trabajo->addWorksheet($nombre_hoja);

        // Creando el formato para los títulos de las columnas
        $formato_titulo = &$libro_trabajo->addFormat();
        // Negrilla
        $formato_titulo->setBold();
        // Color letra  blanco
        $formato_titulo->setColor("white");
        // Tipo de relleno 0-18 donde 0 es sin relleno
        $formato_titulo->setPattern(1);
        // Color fondo rojo
        $formato_titulo->setFgColor("red");

        // Agregando los títulos de las columnas a la hoja de trabajo
        $hoja_trabajo->write(0, 0, 'Nombre de Usuario', $formato_titulo);
        $hoja_trabajo->write(0, 1, 'Nombre', $formato_titulo);
        $hoja_trabajo->write(0, 2, 'Apellido', $formato_titulo);
        $hoja_trabajo->write(0, 3, 'Correo', $formato_titulo);
        $hoja_trabajo->write(0, 4, 'Entrada', $formato_titulo);
        $hoja_trabajo->write(0, 5, 'Salida', $formato_titulo);

        // Agregando los datos a la hoja de trabajo
        $datos = $_SESSION['asistentes'];
        $fila = 1;
        foreach ($datos as $asistente) {
            $hoja_trabajo->writeString($fila, 0, $asistente['username']);
            $hoja_trabajo->writeString($fila, 1, $asistente['nombre']);
            $hoja_trabajo->writeString($fila, 2, $asistente['apellido']);
            $hoja_trabajo->writeString($fila, 3, $asistente['correo']);
            $hoja_trabajo->writeString($fila, 4, $asistente['entrada']);
            $hoja_trabajo->writeString($fila, 5, $asistente['salida']);
            $fila++;
        }


        // Cerrando y enviando el libro
        $libro_trabajo->close();
        break;
}

?>
