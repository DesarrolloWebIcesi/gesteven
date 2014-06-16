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
    <script type="text/JavaScript" src="../js/ajax_inscripcion_nuevo.js" charset="iso-8859-1"></script>
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
        <h3>Inscripci&oacute;n</h3>
        <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
        <form id="formulario" method="POST" action="">
        <br/>
        <span style="text-align: center; display: block; font-weight: bold;">Informaci&oacute;n del usuario</span>
        <br/>
          <table align="center" style="border: 1px dashed gray; background-color: rgb(230, 230, 230);" id="inscripcion">
            <tr>
              <td class="campo_obligatorio" align="right">
                Tipo de inscripci&oacute;n*
              </td>
              <td align="left">
                <?php include_once '../src/listado_tipos_inscripcion.php'; ?>
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
                Nombre de usuario*
              </td>
              <td align="left">
                <input type="text" name="usuario" id="usuario" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Nombre(s)*
              </td>
              <td align="left">
                <input type="text" name="nombre" id="nombre" size="20" class="formulario"/> 
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Apellidos*
              </td>
              <td align="left">
                <input type="text" name="apellidos" id="apellidos" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Tel&eacute;fono/Celular*
              </td>
              <td align="left">
                <input type="text" name="telefono" id="telefono" size="20" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> G&eacute;nero
              </td>
              <td align="left">
                <select id="genero" name="genero" class="formulario">
                  <option value="N/A">Seleccionar</option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Direcci&oacute;n
              </td>
              <td align="left">
                <?php include_once('../src/listado_lugares.php');?>
              </td>
            </tr>
            <tr>
              <td align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Organizaci&oacute;n/Universidad/Colegio
              </td>
              <td align="left">
                <?php include_once('../src/listado_organizaciones.php');?>
              </td>
            </tr>
            <!-- Listado de campos personalizados-->
            <?php include_once('../src/cargar_campos_personalizados.php');?>
            <tr>
              <td align="right">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> C&oacute;digo de barras
              </td>
              <td align="left">
                <input type="text" name="codigo_barras" id="codigo_barras" size="20" maxlength="100" class="formulario"/>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" value="Enviar" class="boton" id="submit"/>
                <input type="reset" value="Limpiar" class="boton" id="limpiar"/>
              </td>
            </tr>
          </table>
          <input type="hidden" value="<?php echo $_SESSION['sched_conf_id'] ?>" id="sched_conf_id" />
          <input type="hidden" value="C" id="transaccion" />
          <input type="hidden" value="N" id="asignado" />
          <input type="hidden" value=" " id="nombre_usuario" />
          <input type="hidden" value="0" id="publico" />
          <div id="error">
            &nbsp;
          </div>
          <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
            <div id="espera">
              <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" /> Por favor espere...
            </div>
          </div>
        </form>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>