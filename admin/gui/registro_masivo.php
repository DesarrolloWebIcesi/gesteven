<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Formulario registro de salidas y movimientos masivos entre presentaciones de un evento.
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
    <title>Gesti&oacute;n de eventos - Registro de asistencia - Universidad Icesi - Cali, Colombia</title>
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
  </head>
  <body>
    <?php
    include_once 'dialogos.php';
    ?>
    <div id="wrapper">
      <div><?php include_once('cabezote.php'); ?></div>
      <div id="contenido">
        <?php include_once('navegacion.php'); ?>
        <h3>Registros masivos</h3>
        <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
        <form id="formulario" method="POST" action="">
          <table align="center">
            <tr>
              <td>
                <span class="campo_obligatorio">Ponencia*</span> <br/>
                <?php include_once '../src/listado_papers.php'; ?>
              </td>
            </tr>
            <tr>
              <td align="center">
                <input type="submit" id="submit_salida_masiva" value="Salida masiva" />
              </td>
            </tr>
            <tr>
              <td>
                <span class="campo_obligatorio">Siguiente ponencia:</span> <br/>
                <?php include_once '../src/listado_papers_siguiente.php'; ?>
              </td>
            </tr>
            <tr>
              <td align="center">
                <input type="submit" id="submit_cambio_masivo" value="Cambio masivo" />
              </td>
            </tr>
          </table>
          <input type="hidden" id="id_conferencia" value="<?php echo $_SESSION['sched_conf_id']; ?>" />
          <input type="hidden" id="id_paper_masivo" value=" " />
          <input type="hidden" id="id_paper_masivo_siguiente" value=" " />
        </form>
        <div id="error_formulario">&nbsp;</div>
        <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
          <div id="mensaje">
            &nbsp;
          </div>
        </div>
        <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
          <div id="espera">
            <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" /> Por favor espere...
          </div>
        </div>
        <!-- <img src="../imgs/LOLZ.gif" alt="LOLZ"/> -->
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
  </body>
</html>

