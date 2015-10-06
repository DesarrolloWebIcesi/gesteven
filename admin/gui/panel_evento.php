<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
/**
 * Panel principal de administración de un evento
 * @package gui
 */
/**
 * Manejo de sesión
 */
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Gesti&oacute;n de eventos - Universidad Icesi - Cali, Colombia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/JavaScript" src="../js/ajax.js" charset="iso-8859-1"></script>
    <script type="text/JavaScript" src="../js/scripts.js" charset="iso-8859-1"></script>
    <script type="text/JavaScript" src="../js/dialogos.js" charset="iso-8859-1"></script>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" />
  </head>
  <body>
    <?php
    include_once 'dialogos.php';
    ?>
    <div id="wrapper">
      <div><?php include_once('cabezote.php'); ?></div>
      <div id="contenido">
        <?php include_once('navegacion.php'); ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" align="center"><a href="registro_entrada.php" target="_self"><img src="imagenes/entrada.png" width="100" height="90" alt="Registrar entradas" border="0"/><br />
            Registrar entradas</a></td>
            <td width="25%" align="center"><a href="registro_masivo.php" target="_self"><img src="imagenes/masivos.png" width="100" height="100" alt="Registros masivos" /><br />
            Registros masivos</a></td>
            <td width="25%" align="center"><a href="../src/ControlAsisConferencia.php" target="_self"><img src="imagenes/reportes.png" width="100" height="90" alt="Reporte de asistentes al evento" /><br />
            Reporte de asistentes</a></td>
            <td width="25%" align="center">
            <a href="../src/ControlInscritos.php" target="_self"><img src="imagenes/reportes.png" width="100" height="90" alt="Reporte de inscritos al evento" /><br />
            Reporte de inscritos</a>
            </td>
          </tr>
          <tr>
            <td align="center"><a href="registro_salida.php" target="_self"><img src="imagenes/salida.png" width="100" height="90" alt="Registrar salidas" /><br />
            Registrar salidas</a></td>
            <td align="center"><a href="inscripcion_nuevo.php" target="_self"><img src="imagenes/inscripcion.png" width="100" height="90" alt="Inscripción" /><br />
            Inscripción</a></td>
            <td align="center"><a href="reporte_asistentespon.php" target="_self"><img src="imagenes/reportes.png" width="100" height="90" alt="Reporte de asistentes por ponencia" /><br />
              Reporte de asistentes por ponencia</a></td>
            <td align="center"><a href="../src/ControlMerecedores.php" target="_self"><img src="imagenes/reportes.png" width="100" height="90" alt="Reporte de merecedores" /><br />
              Reporte de merecedores</a></td>
          </tr>
          <tr>
            <td align="center"><a href="carga_masiva_usuarios.php" target="_self"><img src="imagenes/cargamasiva.png" width="100" height="90" alt="Carga masiva usuarios" /><br />
            Inscripción masiva</a></td>
          </tr>
        </table>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>