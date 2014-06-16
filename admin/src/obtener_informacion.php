<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
setlocale(LC_MONETARY, 'es_CO');
session_start();
if ($_SESSION['user_id'] == "")
{
  echo "<script language='javaScript'> " .
  "location.href='../index.php' </script>";
}
include_once '../class/Factura.php';
$info_factura = explode("~", $_POST['factura']);
$detalles = Factura::consultarDetalles($info_factura[0], $info_factura[1]);
$detalle = explode("~", $detalles);

if (empty($detalles))
{
  $return['error'] = true;
  $return['msg'] = 'Ha ocurrido un error obteniendo informaci&oacute;n de la factura';
} else
{
  $return['error'] = false;
  $return['concepto'] = $detalle[0];
  $return['procultura'] = $detalle[1];
  $return['seguro'] = $detalle[2];
  $return['mora'] = $detalle[3];
  $return['extemporaneidad'] = $detalle[4];
  $return['msg'] = "M&aacute;ximo de " . money_format('%n', $detalle[0]);
}

echo json_encode($return);
?>
