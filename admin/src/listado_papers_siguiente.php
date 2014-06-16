<?php

/**
 * Generador del listado de presentaciones disponibles para cambio masivo
 *
 * @author Alejandro Orozco - aorozco
 * @since 2011-02-25
 * @package src
 */
/**
 * Clase para el manejo de eventos
 */
include_once '../class/Evento.php';

$papers = Evento::consultarPapers($_SESSION['sched_conf_id']);
$html = "";
$vacio = true;
if (!empty($papers))
{
  $html .= '<select id="paper_siguiente">';
  foreach ($papers as $paper)
  {
    if (!empty($paper))
    {
      if ($_POST['paper_anterior'] != $paper['paper_id'])
      {
        $titulo = Evento::consultarDetallesPaper('title', $paper['paper_id']);
        $lugar = Evento::consultarDetallesLugar('abbrev', $paper['room_id']);
        $html .= "<option value=\"" . $paper['paper_id'] . "\">$titulo [" . $paper['start_time'] . "-" . $paper['end_time'] . "] ($lugar)</option>";
        $vacio = false;
      }
    }
  }
  $html .= "</select>";
}
if ($vacio)
{
  $html = "<h3>No hay ponencias disponibles en este momento.</h3>";
}
echo $html;
?>
