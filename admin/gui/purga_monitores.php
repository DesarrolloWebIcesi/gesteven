<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Resporte de asistentes a un evento
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
    <title>Gesti&oacute;n de eventos - Reportes - Universidad Icesi - Cali, Colombia</title>
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
        <div id="listado_reportes">
            <h3>Purga de monitores</h3>
            <?php
            $asistentes = $_SESSION['asistentes'];            
            if ($asistentes!=null || $asistentes!='') {
            ?>
                
                Total de monitores: <?php echo count($asistentes);?></br></br>

                <form name="importa" method="post" action="../src/purga_monitores_evento.php" enctype="multipart/form-data" >
                  <input type="hidden" name="sched_conf_id" id="sched_conf_id" value="<?php echo $_SESSION['sched_conf_id']?>"/>
                  <input type='submit' name='enviar'  value="Purgar"  />
                </form>

                <br />

                <table width="100%">
                    <tr align="left">
                        <th>Nombre de usuario</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo electr&oacute;nico</th>
                    </tr>
                    <?php
                        for ($i=0;$i<count($asistentes);$i++) {
                            $asistente=$asistentes[$i];
                    ?>
                        <tr class="tablerow<?php echo $i%2;?>">
                            <td><?php echo htmlentities($asistente['username']) ?></td>
                            <td><?php echo htmlentities($asistente['nombre']) ?></td>
                            <td><?php echo htmlentities($asistente['apellido']) ?></td>
                            <td><?php echo htmlentities($asistente['correo']) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <div class="nodata">NO HAY MONITORES ASIGNADOS A ESTE EVENTO</div>
            <?php } ?>
        </div>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>