<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Formulario de verificación y actualización de datos.
 * @package gui
 */
/**
 * Manejo de sesión
 */
if ($_SERVER['SERVER_NAME'] != "http://" . $_SERVER['SERVER_NAME'])
{
  $port = $_SERVER["SERVER_PORT"];
  $ssl_port = "443"; //Change 443 to whatever port you use for https (443 is the default and will work in most cases)
  if ($port != $ssl_port)
  {
    $host = $_SERVER["HTTP_HOST"];
    $uri = $_SERVER["REQUEST_URI"];
    header("Location: https://$host$uri");
  }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <title>Gesti&oacute;n de eventos - Inscripci&oacute;n - Universidad Icesi - Cali, Colombia</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <script type="text/javascript" src="admin/js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="admin/js/jquery.autoheight.js"></script>
    <script type="text/javascript">
      var RecaptchaOptions = {
        theme : 'white',
        lang: 'es'
      };
    </script>
    <link rel="stylesheet" href="admin/css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="admin/css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" />
  </head>
  <body>
      <?php if(!isset($_GET['embed'])){?>
      <iframe src="admin/gui/inscripcion_embeded_wrapper.php?sched_conf_id=<?php echo $_GET['sched_conf_id']; ?>" width="100%" frameborder="0" class="autoHeight">
      <?php } else { ?>
      <iframe src="admin/gui/inscripcion_popup_wrapper.php?sched_conf_id=<?php echo $_GET['sched_conf_id']; ?>" width="100%" frameborder="0" class="autoHeight">
      <?php } ?>
        <p>Su navegador no soporta iframes.</p>
      </iframe>
  </body>
</html>