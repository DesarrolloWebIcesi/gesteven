<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Página de confirmación de envió de los certificados.
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
                <h3>Generaci&oacute;n y env&iacute;o de certificados</h3>
                <?php
                if (isset($_GET['from']) && $_GET['from'] == 'genr') {
                ?>
                    <div id="mensaje_reportes">Certificados generados satisfactoriamente</div>
                <?php
                }
                ?>

                <div class="ui-widget-content" style="text-align: center">
                    <?php
                    $ncert = $_SESSION['ncertificados'];
                    $asistentes = $_SESSION['asistentes'];
                    if ($ncert == null || $ncert == '' || $ncert <= 0) {
                    ?>
                        <div class="nodata">NO HAY MERECEDORES DE CERTIFICADO PARA ESTE EVENTO</div>
                    <?php } else { ?>
                        <p style="text-align: center">
                            Esta a punto de enviar <?php echo $ncert ?> certificados,
                            si esta seguro de esto haga click en el bot&oacute;n enviar
                        </p>
                        <button id="genviar">Enviar</button>
                        <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
                          <div id="espera">
                            <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" /> Por favor espere...
                          </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div><?php include_once('footer.php'); ?></div>
        </div>
        <pre><?php print_r($_SESSION['otro']); ?></pre>
    </body>
</html>