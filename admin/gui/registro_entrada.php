<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Formulario de registro de entradas a un evento
 * @package gui
 */
/**
 * Manejo de sesi�n
 */
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <title>Gesti&oacute;n de eventos - Registro de asistencia - Universidad Icesi - Cali, Colombia</title>
    <meta name="viewport" content="width=480, height=800, initial-scale=1.0"> 
    <meta http-equiv="Content-Type" content="text/html;" />
    <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/localization/messages_es.js" charset="iso-8859-1"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/JavaScript" src="../js/ajax_registro.js" charset="iso-8859-1"></script>
    <!-- <script type="text/JavaScript" src="../js/scripts_inscripcion.js" charset="iso-8859-1"></script> -->
    <script type="text/JavaScript" src="../js/dialogos.js" charset="iso-8859-1"></script>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" />

<!--[if IE 6]>
    <style type="text/css">
    #contenido h2{ _font-size: 15px;}
    #contenido h3{ _font-size: 8px;}
    #contenido p{ _display: none;}

    .navegacion{ _display: none; }
    
    .campo_obligatorio{ _font-size: 13px; }

    select#paper{ _font-size: 15px !important;}

    #mensaje{ _font-size:8px; _color: red; _text-align: left;}
    
    #footer{ _display: none;}                                 
    </style>
<![endif]-->

<style>
  select#paper {
    font-size: 20px;
  }
</style>

  </head>
  <body>
    <?php
    include_once 'dialogos.php';
    ?>
    <div id="wrapper">
      <div><?php include_once('cabezote.php'); ?></div>
      <div id="contenido">
        <?php include_once('navegacion.php'); ?>
        <h3>Registro de entradas</h3>
        <p>Seleccione la ponencia y luego ingrese el c&oacute;digo de barras usando un lector</p>
        <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
        <table align="center">
          <tr>
            <td>
              <span class="campo_obligatorio">Ponencia*</span> <br/>
              <?php include_once '../src/listado_papers.php'; ?>
            </td>
          </tr>
          <tr>
            <td>
              <form id="formulario" method="POST" action="">
                <span class="campo_obligatorio">C&oacute;digo de barras*</span><br/>
                <input type="text" id="codigo_barras" name="codigo_barras_entrada" maxlength="100" />
                <input type="submit" id="submit" value="Enviar" />
                <input type="hidden" id="id_conferencia" value="<?php echo $_SESSION['sched_conf_id']; ?>" />
                <input type="hidden" id="tipo_operacion" value="entrada" />
              </form>
            </td>
          </tr>
          <!--Mensaje de error-->
          <div id="error_formulario">&nbsp;</div>
          <div style="width: 400px; overflow: hidden; font-size: 12px;">
            <div id="mensaje">
                &nbsp;
            </div>
              &nbsp;
          </div>
        </table>
        <!--<div id="error_formulario">&nbsp;</div>
        <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
          <div id="mensaje">
            &nbsp;
          </div>
          &nbsp;
        </div>-->
      <!-- <img src="../imgs/LOLZ.gif" alt="LOLZ"/> -->
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
  </body>
</html>
