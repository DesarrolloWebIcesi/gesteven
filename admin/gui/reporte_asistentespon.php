<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Resporte de asistentes a un evento
 * @package gui
 */
/**
 * Manejo de sesión
 */
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
    <head>
        <title>Gesti&oacute;n de eventos - Reportes - Universidad Icesi - Cali, Colombia</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <?php include_once 'js.php'?>
        <?php include_once 'css.php'?>
        <script type="text/JavaScript" src="../js/reports.js" charset="utf-8"></script>
    </head>
    <body>
        <?php
        include_once 'dialogos.php';
        ?>
        <div id="ponencias-dialog" title="Seleccione una ponencia"></div>
        <input type="hidden" id="sched_conf_id" name="sched_conf_id" value="<?php echo $_SESSION['sched_conf_id'];?>"/>
        <div id="wrapper">
            <div><?php include_once('cabezote.php'); ?></div>
            <div id="contenido">
                <?php include_once('navegacion.php'); ?> 
                <div id="listado_reportes">
                    <h3>Reporte de Asistentes a la ponencia "<span id="selected-ponencia"></span>"</h3>
                    <div id="select-ponencia">Seleccionar otra ponencia</div>  
                    <?php
                        $asistentes = $_SESSION['asistentes'];
                        if ($asistenes != null || !empty($asistentes)) {
                    ?>
                        <table width="100%" id="tools-button">
                            <tr>
                                <td>                                  
                                </td>
                                <td align="right">
                                    <a href="../src/ExportAsisxPonencia.php?rep_format=pdf" target="_blank"><img height="50" width="50" src="../imgs/pdf.png" alt="Exportar a PDF"/></a>
                                    <a href="../src/ExportAsisxPonencia.php?rep_format=xls" target="_blank"><img height="50" width="50" src="../imgs/excel.jpg" alt="Exportar a XLS"/></a>
                                </td>
                            </tr>
                        </table>
                        <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
                          <div id="espera">
                            <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" /> Por favor espere...
                          </div>
                        </div>
                    <div id="report-results">
                    
                        <!--
                        <table width="100%">
                            <tr align="left">
                                <th>Nombre de usuario</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo electr&oacute;nico</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($asistentes); $i++) {
                                $asistente = $asistentes[$i];
                                ?>
                                <tr class="tablerow<?php echo $i % 2; ?>">
                                    <td><a href="../src/ControlAsisPersona.php?sched_conf_id=<?php echo $_SESSION['rsched_conf_id']; ?>&amp;per=<?php echo $asistente['username']; ?>"><?php echo htmlentities($asistente['username']) ?></a></td>
                                    <td><?php echo htmlentities(strtr(strtoupper(utf8_decode($asistente['nombre'])), "àèìòùáéíóúçñäëïöü", "ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ")) ?></td>
                                    <td><?php echo htmlentities(strtr(strtoupper(utf8_decode($asistente['apellido'])), "àèìòùáéíóúçñäëïöü", "ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ")) ?></td>
                                    <td><?php echo htmlentities(utf8_decode($asistente['correo'])) ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        -->
                    <?php } else { ?>
                        <div class="nodata">NO HAY REGISTROS DE ASISTENCIA PARA ESTE EVENTO</div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div><?php include_once('footer.php'); ?></div>
        </div>
        <pre><?php print_r($_SESSION['otro']); ?></pre>
    </body>
</html>