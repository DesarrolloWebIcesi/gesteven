<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Formulario de acceso a la aplicación.
 * @package gui
 */
session_start();
if ($_SESSION['user_id'] != "")
{
  echo "<script language='javaScript'> " .
  "location.href='gui/formulario.php' </script>";
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <title>Gesti&oacute;n de eventos - Universidad Icesi - Cali, Colombia</title>
    <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/JavaScript" src="js/scripts_login.js" charset="iso-8859-1"></script>
    <script type="text/javascript" src="js/dialogos.js"></script>
    <link rel="stylesheet" href="css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" />
  </head>
  <body>
    <?php
    include_once 'gui/dialogos.php';
    ?>
    <div id="wrapper">
      <div><?php include_once('cabezote.php'); ?></div>
      <div id="contenido">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="normal" colspan="4" align="left">
              <p class="normal">Bienvenido al Sistema Web de la Universidad Icesi. Por favor, ingrese su documento de identidad y contrase&ntilde;a para ingresar al sistema.
              </p>
              <br/>
            </td>
          </tr>
        </table>
        <div id="ingreso">
          <table width="51%" border="0" cellpadding="0" cellspacing="0"  align="center" style="border: 1px dashed gray; background-color: rgb(230, 230, 230);" id="login">
            <tr>
              <td  colspan="4" align="center"  ><br/>
                <br/>
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right" >
                Nombre de usuario
              </td>
              <td align="left">
                <input type="text" name="usuario" id="usuario" size="20" /><br />
              </td>
            </tr>
            <tr>
              <td class="campo_obligatorio" align="right" >
                Contrase&ntilde;a
              </td>
              <td align="left">
                <input type="password" name="password" id="password" size="20" /><br />
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center" >
                <input type="submit" value="Iniciar sesi&oacute;n" class="boton" id="submit"/><br/>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center" >
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
  </body>
</html>