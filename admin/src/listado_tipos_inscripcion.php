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

$tipos = Evento::consultarTipoInscripcion($_SESSION['sched_conf_id']);
$html = "";
$vacio = true;
if (!empty($tipos))
{
  $html .= '<select id="tipo_inscripcion" class="formulario">';
  foreach ($tipos as $tipo)
  {
    if (!empty($tipo))
    {
      $html .= "<option value=\"" . $tipo['type_id'] . "\">". htmlentities(utf8_decode($tipo['setting_value'])) . " [$" . $tipo['cost'] . "]</option>";
      $vacio = false;
    }
  }
  $html .= "</select>";
}
if ($vacio)
{
  $html = "<h3>No hay tipos de inscripci&oacute;n registrados.</h3>";
}
echo $html;
?>
