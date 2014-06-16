<?php

    // Incluyendo la clase para generar el archivo XLS
    include_once "Spreadsheet/Writer.php";

    // Creando el libro
    $libro_trabajo = new Spreadsheet_Excel_Writer();

    // Asignando el nombre del archivo que se va a generar
    $libro_trabajo->send("reporte.xls");

    // El nombre no puede ser muy largo porque no genera el XLS
    $nombre_hoja = "Reporte";

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
    $hoja_trabajo->write(0, 0, 'Nombre', $formato_titulo);
    $hoja_trabajo->write(0, 1, 'Apellido', $formato_titulo);
    $hoja_trabajo->write(0, 2, 'Edad', $formato_titulo);

    // Agregando los datos a la hoja de trabajo
    $hoja_trabajo->writeString(1, 0, 'Richard');
    $hoja_trabajo->writeString(1, 1, 'Jaramillo');
    $hoja_trabajo->writeNumber(1, 2, '32');
    $hoja_trabajo->writeString(2, 0, 'Shirley');
    $hoja_trabajo->writeString(2, 1, 'Carvajal');
    $hoja_trabajo->writeNumber(2, 2, '31');

    // Cerrando y enviando el libro
    $libro_trabajo->close();

?>
