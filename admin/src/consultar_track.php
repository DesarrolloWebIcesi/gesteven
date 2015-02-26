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
if(isset($_POST['sched_conf_id']))
{
  $_GET['sched_conf_id'] = $_POST['sched_conf_id'];
}
if(isset($_GET['sched_conf_id']))
{
  $tracks = Track::consultarTracks($_GET['sched_conf_id']);
  $vacio = true;
  $ahora = strtotime('now');
  //Consultando tracks de la ponencia
  if (!empty($tracks))
  {
    foreach ($tracks as $track)
    {
      if (!empty($track))
      {  
        //Consultando las ponencias de cada track
        $papers = Track::consultarPonenciasTrack($track['track_id']);
        $papers_temp = null;
        if (!empty($papers))
        {
          //print_r($papers);
          foreach ($papers as $paper)
          {
            if (!empty($paper))
            {
              //Consultando los autores de cada ponencia
              $autor = Track::consultarAutoresPonencia($paper['paper_id']);
              if(!empty($autor)){
                $autor[0]['archivo'] = strtolower(strtr(trim($autor[0]['first_name'])," ",".")).".".strtolower(strtr(trim($autor[0]['last_name'])," ",".")).".jpg";
                $autor[0]['first_name'] = trim($autor[0]['first_name']);
                $autor[0]['last_name'] = trim($autor[0]['last_name']);
                $paper['autor']=$autor[0];
                $papers_temp[] = $paper;
              }
            }
          }
        }
        $track['papers'] = $papers_temp;
        $data['tracks'][] = $track;
        $vacio = false;
      }
    }
  }
  if ($vacio)
  {
    $data['error'] = "No hay tracks disponibles en este momento";
  }
  else
  {
    $data['error'] = "OK";
  }
}
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Content-type: application/json');
echo json_encode($data);
?>
