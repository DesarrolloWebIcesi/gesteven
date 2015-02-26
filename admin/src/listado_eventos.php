<?php

/**
 * Generador del listado de eventos disponibles y enlaces para su administración
 * @author aorozco - Alejandro Orozco
 * @since 2011-02-02
 * @package src
 */
/**
 * Clase para el manejo de eventos
 */
include_once '../class/Evento.php';

$eventos = Evento::consultarEventos($_SESSION['user_id']);
//print_r($eventos);
$html = "";
$vacio = true;
if (!empty($eventos))
{
  $html .= "<h3>Eventos en curso</h3>
  <ul>\n";
  $anteriores .= "<h3>Eventos anteriores</h3>
  <ul>\n";
  $en_curso = false;
  $anterior = false;
  
  foreach ($eventos as $evento)
  {
	  
    if (!empty($evento['sched_conf_id']))
    {
      $titulo = Evento::consultarDetalles('title', $evento['sched_conf_id']);
      $acronimo = Evento::consultarDetalles('acronym', $evento['sched_conf_id']);
      $hoy_num = intval(date("Ymd"));
      $fecha_ini = Evento::consultarDetalles('startDate', $evento['sched_conf_id']);
      $fecha_ini_r = explode(" ", $fecha_ini);
      $items_fecha_ini = explode("-",$fecha_ini_r[0]);
      $fecha_ini_num = intval($items_fecha_ini[0].$items_fecha_ini[1].$items_fecha_ini[2]);
      $fecha_fin = Evento::consultarDetalles('endDate', $evento['sched_conf_id']);
      $fecha_fin_r = explode(" ", $fecha_fin);
      $items_fecha_fin = explode("-",$fecha_fin_r[0]);
      $fecha_fin_num = intval($items_fecha_fin[0].$items_fecha_fin[1].$items_fecha_fin[2]);
      $anticipacion = intval(Evento::consultarDetalles('lapso_evento', $evento['sched_conf_id']));
      //if(!empty($fecha_ini) && ($hoy_num >= ($fecha_ini_num - $anticipacion)) && ($hoy_num <= ($fecha_fin_num + 183)))
      //echo $fecha_ini_num." ".$titulo."<br/>";
      if(!empty($fecha_ini))
      {
        if($hoy_num <= ($fecha_fin_num)){
        //if(true){
          $en_curso = true;
          $html .= "<li><span class=\"titulo_conferencia\"><a href=\"#\" id=\"" . $evento['sched_conf_id'] . "\" class=\"enlace_menu\">" . $titulo . " (" . $acronimo . ") [" . $fecha_ini_r[0] . " - " . $fecha_fin_r[0] . "]</a> - <a href=\"../../inscripcion.php?sched_conf_id=".$evento['sched_conf_id']."\" target=\"_blank\">Formulario de inscripci&oacute;n</a> - <a href=\"../../inscripcion.php?sched_conf_id=".$evento['sched_conf_id']."&embed=1\" target=\"_blank\">Versi&oacute;n sin dise&ntilde;o</a></span>";
          $html .= "</li>\n";
        }else{
          $anterior = true;
          $anteriores .= "<li><span class=\"titulo_conferencia\"><a href=\"#\" id=\"" . $evento['sched_conf_id'] . "\" class=\"enlace_menu\">" . $titulo . " (" . $acronimo . ") [" . $fecha_ini_r[0] . " - " . $fecha_fin_r[0] . "]</a> - <a href=\"../../inscripcion.php?sched_conf_id=".$evento['sched_conf_id']."\" target=\"_blank\">Formulario de inscripci&oacute;n p&uacute;blico</a> - <a href=\"../../inscripcion.php?sched_conf_id=".$evento['sched_conf_id']."&embed=1\" target=\"_blank\">Versi&oacute;n sin dise&ntilde;o</a></span>\n";
          $anteriores .= "</li>\n";
        }
        $vacio = false;
      }
    }
  }
  if(!$en_curso){
    $html .= "<li>No hay eventos disponibles</li>\n";
  }
  $html .= "</ul>\n";
  if(!$anterior){
    $anteriores .= "<li>No hay eventos disponibles</li>\n";
  }
  $anteriores .= "</ul>\n";
  $html .= $anteriores;
}
if($vacio)
{
  $html = "<h3>No hay eventos disponibles en este momento.</h3>";
}
echo $html;
?>
