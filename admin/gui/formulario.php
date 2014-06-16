<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Página en donde se listan los eventos en los que participa el usuario del sistema
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
    <title>Gesti&oacute;n de eventos - Universidad Icesi - Cali, Colombia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/JavaScript" src="../js/ajax.js" charset="iso-8859-1"></script>
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
        <h2>Seleccione un evento</h2>
        <div class="navegacion">
          <script type="text/javascript" src="../js/menu.js" language="javascript"></script>
          <ul id="menu">
            <li class="node">
              <a href="../src/salir.php" class="icon-16-logout">Cerrar sesi&oacute;n</a>
            </li>
            <li class="node">
                <a href="http://www.icesi.edu.co/manuales/manual_ocs_asistencia.pdf">Ayuda</a>
            </li>
          </ul>
        </div>
        <br/>
        <p>Haga clic en un evento para acceder a las distintas tareas como registro de asistencia, inscripci&oacute;n de usuarios, generaci&oacute;n de reportes y env&iacute;o de certificados</p>
        <?php include_once '../src/listado_eventos.php'; ?>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>