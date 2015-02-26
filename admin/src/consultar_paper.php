<?php

/**
 * Generador del listado de la ponencia en curso en formato JSON
 *
 * @author Alejandro Orozco - aorozco
 * @since 2012-06-14
 * @package src
 */
/**
 * Script que consulta ponencias de un evento determinado y devuelve un objeto JSON con la ponencia en curso
 */
//ini_set('display_errors',1); 
//error_reporting(E_ALL);
include_once '../class/Track.php';
$data = null;
$papers = null;
if(isset($_POST['sched_conf_id']))
{
  $_GET['sched_conf_id'] = $_POST['sched_conf_id'];
  $_GET['track_id'] = $_POST['track_id'];
}
if(isset($_GET['sched_conf_id']) && isset($_GET['track_id']))
{
  $papers = Track::consultarPapers($_GET['sched_conf_id']);
  $vacio = true;
  $ahora = strtotime('now');
  if (!empty($papers))
  {
    foreach ($papers as $paper)
    {
      if (!empty($paper))
      {
        if($ahora >= strtotime($paper['start_time_2']) && $ahora <= strtotime($paper['end_time_2']) && $_GET['track_id'] == $paper['track_id']){
          $data['resumen'] = Evento::consultarDetallesPaper('abstract', $paper['paper_id']); //Abstract en HTML
          $data['title'] = htmlentities(Evento::consultarDetallesPaper('title', $paper['paper_id']));
          $data['start_time'] = $paper['start_time'];
          $data['end_time'] = $paper['end_time'];
          $data['hora_actual'] = date('H:i:s');
          $vacio = false;          
        }
      }
    }
    if ($vacio)
    {
      $data['error'] = "No hay ponencias en curso";
    }
    else
    {
      $data['error'] = "OK";
    }
  }
  $data['hora_actual_i'] = $ahora;
}
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Content-type: application/json');
echo json_encode($data);
?>
