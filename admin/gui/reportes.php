<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
/**
 * Formulario principal de la aplicación
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
          <h3>Menu de Reportes</h3>
        <?php
            if(isset ($_GET['from']) && $_GET['from']=='genr'){
        ?>
          <div id="mensaje_reportes">Certificados Generados satiosfactoriamente</div>
        <?php
            }
        ?>
        <div id="listado_reportes">
            <ul>
                <li>
                    <a href="../src/ControlAsisConferencia.php?sched_conf_id=<?php echo $_GET['sched_conf_id'];?>">Asistentes por conferencia</a>
                </li>
                <li>
                    <a href="../src/ControlMerecedores.php?sched_conf_id=<?php echo $_GET['sched_conf_id'];?>">Asistentes merecedores de Certificado</a>
                </li>                
                <li>
                    <a href="config_certificados.php?sched_conf_id=<?php echo $_GET['sched_conf_id'];?>">Configuraci&oacute;n del Certificado</a>
                </li>
                <li>
                    <a target="_blank" href="../src/ControlPreviewCertificado.php?sched_conf_id=<?php echo $_GET['sched_conf_id'];?>">Vista Previa del Certificado</a>
                </li>
                <li>
                    <a href="../src/ControlEnviarCertificado.php?sched_conf_id=<?php echo $_GET['sched_conf_id'];?>">Generaci&oacute;n de Certificados</a>
                </li>
            </ul>
        </div>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>