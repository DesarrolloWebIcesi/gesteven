<?php

/**
 * Generador del listado de presentaciones disponibles
 *
 * @author Alejandro Orozco - aorozco
 * @since 2011-02-25
 * @package src
 */
/**
 * Clase para el manejo de eventos
 */
include_once '../class/Evento.php';

$listado_lugares = Evento::consultarDetallesGlobales('listado_organizaciones', $_SESSION['sched_conf_id']);
$html = "";
$vacio = true;
if (!empty($listado_lugares))
{
  $html .= "                <select id=\"organizacion\" name=\"organizacion\" class=\"formulario\">\n";
  $html .= "                  <option value=\"N/A\">Seleccionar</option>\n";
  $lista = explode("|",$listado_lugares);
  foreach ($lista as $item)
  {
    if (!empty($item))
    {
      $html .= "                  <option value=\"$item\">".htmlentities($item)."</option>\n";
      $vacio = false;
    }
  }
  $html .= "                </select>\n";
}
if($vacio)
{
  $html = "                <input type=\"text\" name=\"organizacion\" id=\"organizacion\" size=\"20\" class=\"formulario\"/>\n";
}
echo $html;
?>
