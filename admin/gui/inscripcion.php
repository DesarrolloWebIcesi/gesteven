<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Formulario de verificación y actualización de datos.
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
    <title>Gesti&oacute;n de eventos - Verificaci&oacute;n de datos - Universidad Icesi - Cali, Colombia</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/localization/messages_es.js" charset="iso-8859-1"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/JavaScript" src="../js/ajax_inscripcion.js" charset="iso-8859-1"></script>
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
        <h3>Verificaci&oacute;n de datos para el evento "<?php echo htmlentities(Evento::consultarDetalles('title', $_SESSION['sched_conf_id'])) ?>"</h3>
        <p>Ingrese el nombre de usuario, presione &quot;Enter&quot; o &quot;Tabulaci&oacute;n&quot; y autom&aacute;ticamente se llenar&aacute;n los campos con los detalles del usuario.</p>
        <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
        <form id="formulario" method="POST" action="">
        <table align="center" id="inscripcion">
          <tr>
            <td class="campo_obligatorio" align="right">
              Nombre de usuario*
            </td>
            <td align="left">
              <input type="text" name="usuario" id="usuario" size="20" />
            </td>
          </tr>
        </table>
        <br/>
        <span style="text-align: center; display: block; font-weight: bold;">Informaci&oacute;n del usuario</span>
        <br/>
          <table align="center" style="border: 1px dashed gray; background-color: rgb(230, 230, 230);" id="inscripcion">
            <tr>
              <td class="campo_obligatorio" align="right">
                Nombre*
              </td>
              <td align="left">
                <input type="text" name="nombre" id="nombre" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="texto" align="right">
                Segundo nombre
              </td>
              <td align="left">
                <input type="text" name="segundo_nombre" id="segundo_nombre" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                Apellidos*
              </td>
              <td align="left">
                <input type="text" name="apellidos" id="apellidos" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                Correo electr&oacute;nico*
              </td>
              <td align="left">
                <input type="text" name="email" id="email" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                Tel&eacute;fono*
              </td>
              <td align="left">
                <input type="text" name="telefono" id="telefono" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td align="right">
                C&oacute;digo de barras
              </td>
              <td align="left">
                <input type="text" name="codigo_barras" id="codigo_barras" size="20" maxlength="100" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                Fecha de la inscripci&oacute;n
              </td>
              <td align="left">
                <span id="fecha_inscripcion">&nbsp;</span>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" value="Enviar" class="boton" id="submit"/>
              </td>
            </tr>
          </table>
          <input type="hidden" value="<?php echo $_SESSION['sched_conf_id'] ?>" id="sched_conf_id" />
          <input type="hidden" value="N" id="asignado" />
          <input type="hidden" value=" " id="nombre_usuario" />
          <div id="error">
            &nbsp;
          </div>
        </form>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>