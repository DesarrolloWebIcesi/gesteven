<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Carga masiva de usuarios en un evento.
 * @package gui
 */
/**
 * Manejo de sesión
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <title>Gesti&oacute;n de eventos - Registro de asistencia - Universidad Icesi - Cali, Colombia</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/localization/messages_es.js" charset="iso-8859-1"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
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
        <h3>Carga masiva de usuarios</h3>
        <p>Seleccione el archivo:</p>
        <!-- FORMULARIO PARA SOLICITAR LA CARGA DEL EXCEL -->
        <form name="importa" method="post" action="../src/inscripcion_masiva.php" enctype="multipart/form-data" >
          <p class="instipo-p">Tipo de inscripci&oacute;n: </p>
            <?php include_once('../src/listado_tipos_inscripcion.php'); ?>
          <input type="file" name="excel" />
          <input type='submit' name='enviar'  value="Enviar"  />
          <input type="hidden" value="upload" name="action" />
        </form>
        <!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->
        <?php
          if(isset($_GET['logs'])){
            if ($_GET['logs'] > 0){
              echo "<br /><br /><div id=\"mensaje\" class=\"advertencia\">Se realizo la carga y se detectaron ".$_GET['logs']." errores</div> <br /><br />";
              foreach ($_SESSION['logs'] as $item) {
              	echo "<div class=\"nombreusuario\">" .$item. "</div>";
              }
            }else{
              echo "<br /><br /><div id=\"mensaje\" class=\"confirmacion\">Se realizo la carga de usuarios sin errores</div> <br /><br />";
            }
            echo "<script type=\"text/javascript\"> $('#mensaje').show(500);</script>";
          }
        ?>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
  </body>
</html>