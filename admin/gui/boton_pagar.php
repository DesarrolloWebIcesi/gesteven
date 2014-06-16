<?php
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
$pronto_pago = false;
$valor = "$120.000,00";
if($pronto_pago){
  $valor = "$90.000,00";
}
$css = false;
$embed = false;
if(isset($_GET['css']) && $_GET['css'] == 1){
  $css = true;
}else if(!isset($_GET['css'])){
  $css = true;
}
if(isset($_GET['embed']) && $_GET['embed'] == 1){
  $embed = true;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <title>Pagos en línea</title>
    <?php if($css){?><link rel="stylesheet" href="../css/estilos.css" type="text/css"/><?php } ?>
  </head>

  <body>
  <!--?php if(isset($_GET['sched_conf_id']) && ($_GET['sched_conf_id']== '43')){?-->
  <div id="wrapper<?php if(!$embed){echo "2";}?>" style="margin: 5px auto 5px auto;">
    <?php if(!$embed){?><div id="encabezado2"><?php include_once('/home/sicesi/joomla/icesi/templates/icesi_principal/header.php');?></div><?php } ?>
    <!--<div id="contenido">-->
      <span class="titulo3" style="margin: 0 0 0 2%;">Pago en l&iacute;nea</span>
      <div id = "formulario" style="margin: 0 2% 10px 2%; width:94%; padding: 2% 1%;">
        <p>Para pagar el valor de su inscripci&oacute;n en l&iacute;nea (<?php echo $valor;?>), haga clic en el siguiente bot&oacute;n. </p>
<?php if($pronto_pago){ ?>
          <form method="post" action="https://gateway.pagosonline.net/apps/gateway/boton_simplificado.html">
          <input type="image" src="../imgs/botones_pago/boton_90.png" border="0" alt="">
          <input name="usuarioId" type="hidden" value="99093">
          <input name="firma" type="hidden" value="f0494a81a3bd7bfaf2d6832c99c0bd1f5b631581">
          <input name="descripcion" type="hidden" value="Pago de inscripci&oacute;n al evento EdukaTIC 2014 desde el 25 de marzo de 2014 hasta el 3 de mayo de 2014">
          <input name="valor" type="hidden" value="90000.0">
          <input name="moneda" type="hidden" value="COP">
          <input name="lng" type="hidden" value="es">
          <input name="iva" type="hidden" value="0.00">
          <input name="ivaItem" type="hidden" value="0.00">
          <input name="baseDevolucionIva" type="hidden" value="0.00">
          <input name="baseDevolucionIvaItem" type="hidden" value="0.00">
          <input name="valorOtros" type="hidden" value="0.00">
          <input name="valorOtrosItem" type="hidden" value="0.00">
          <input name="urlAprobada" type="hidden" value="">
          <input name="urlEnValidacion" type="hidden" value="">
          <input name="urlRechazada" type="hidden" value="">
          <input name="descripcionItem" type="hidden" value="Pago de inscripci&oacute;n al evento EdukaTIC 2014 desde el 25 de marzo de 2014 hasta el 3 de mayo de 2014">
          <input name="referenciaItem" type="hidden" value="EDUKATIC2014-PRONTOPAGO">
          <input name="cantidadItem" type="hidden" value="1">
          <input name="valorItem" type="hidden" value="90000.0">
          <input name="codigo_pse" type="hidden" value="">
          <input name="codigoPseItem" type="hidden" value="">
          <input name="botonSimplificado" type="hidden" value="true">
          </form>
<?php } else { ?>
          <form method="post" action="https://gateway.pagosonline.net/apps/gateway/boton_simplificado.html">
          <input type="image" src="../imgs/botones_pago/boton_120.png" border="0" alt="">
          <input name="usuarioId" type="hidden" value="99093">
          <input name="firma" type="hidden" value="94b71e69b72b1cd22a960ca5e0d9d9c87983381d">
          <input name="descripcion" type="hidden" value="Pago de inscripci&oacute;n al evento EdukaTIC 2014 desde el 4 de mayo de 2014 hasta el 31 de mayo de 2014">
          <input name="valor" type="hidden" value="120000.0">
          <input name="moneda" type="hidden" value="COP">
          <input name="lng" type="hidden" value="es">
          <input name="iva" type="hidden" value="0.00">
          <input name="ivaItem" type="hidden" value="0.00">
          <input name="baseDevolucionIva" type="hidden" value="0.00">
          <input name="baseDevolucionIvaItem" type="hidden" value="0.00">
          <input name="valorOtros" type="hidden" value="0.00">
          <input name="valorOtrosItem" type="hidden" value="0.00">
          <input name="urlAprobada" type="hidden" value="">
          <input name="urlEnValidacion" type="hidden" value="">
          <input name="urlRechazada" type="hidden" value="">
          <input name="descripcionItem" type="hidden" value="Pago de inscripci&oacute;n al evento EdukaTIC 2014 desde el 4 de mayo de 2014 hasta el 31 de mayo de 2014">
          <input name="referenciaItem" type="hidden" value="EDUKATIC2014">
          <input name="cantidadItem" type="hidden" value="1">
          <input name="valorItem" type="hidden" value="120000.0">
          <input name="codigo_pse" type="hidden" value="">
          <input name="codigoPseItem" type="hidden" value="">
          <input name="botonSimplificado" type="hidden" value="true">
          </form>
<?php } ?>
      </div>
    <!--</div>-->
    <?php if(!$embed){?><div id="footer2"><?php include_once('/home/sicesi/joomla/icesi/templates/icesi_principal/footer.php');?></div><?php } ?>
  </div>
  <!--?php } ?-->
  </body>
</html>