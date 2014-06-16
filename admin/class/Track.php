<?php
/**
 * Clase Track
 * @author aorozco - Alejandro Orozco
 * @since 2012-06-19
 * @package clases
 */
/**
 * Libreria de manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 * Libreria de conexión a BD MySQL
 */
require_once("../lib/MySQL.class.php");

/**
 * Configuracion de la aplicación
 */
include_once '../Configuracion.php';
/**
 * Configuracion de la aplicación
 */
include_once 'Evento.php';
/**
 * Hace las gestiones relacionadas con eventos y tracks como consulta de ponencias en curso, tracks de un evento
 * @author aorozco - Alejandro Orozco
 * @since 2011-02-01
 * @package clases
 */
class Track extends Evento
{
  /**
   * Consulta informacion detallada de un track
   * @author aorozco - Alejandro Orozco
   * @since 2012-06-19
   * @param string $pDetalle Detalle que se desea consultar [title, policy, abbrev, identifyType]
   * @param int $pTrack Identificador del track
   * @return string Detalle solicitado o false en caso de que ocurra algun problema
   */
  public static function consultarDetallesTrack($pDetalle, $pTrack)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT ts.setting_value detalle
FROM track_settings ts
WHERE ts.setting_name = '$pDetalle'
AND ts.track_id = $pTrack";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return utf8_decode($respuesta[0]['detalle']);
    } catch (Exception $e)
    {
      return false;
    }
  }
  /**
   * Consulta los tracks de un evento dado
   * @author aorozco - Alejandro Orozco
   * @since 2012-06-19
   * @param int $pEvento Identificador del evento
   * @return array Tracks del evento [id (int), título(string)]
   */
  public static function consultarTracks($pEvento)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT t.track_id, ts.setting_value title
FROM tracks t, track_settings ts
WHERE ts.setting_name = 'title'
AND ts.track_id = t.track_id
AND t.sched_conf_id =$pEvento
ORDER BY title";
      $resultado = $mysql->query($consulta);
      $respuesta = Array();
      foreach ($mysql->fetchAll($resultado) as $track)
      {
        $respuesta[] = $track;
      }
      return $respuesta;
    } catch (Exception $e)
    {
      return false;
    }
  }
  /**
   * Consulta las ponencias de un track
   * @author aorozco - Alejandro Orozco
   * @since 2012-06-19
   * @param int $pTrack Identificador del evento
   * @return array Ponencias del track [id(int), título(string), hora de inicio (time), hora final (time)]
   */
  public static function consultarPonenciasTrack($pTrack)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT p.paper_id, ps.setting_value title, TIME( p.start_time ) start_time, p.start_time start_time_2, TIME( p.end_time ) end_time, p.end_time end_time_2
FROM papers p, paper_settings ps, published_papers pp
WHERE p.track_id = $pTrack
AND p.paper_id = pp.paper_id
AND p.paper_id = ps.paper_id
AND ps.setting_name = 'title'
AND p.status = 3
ORDER BY start_time";
      $resultado = $mysql->query($consulta);
      $respuesta = Array();
      foreach ($mysql->fetchAll($resultado) as $paper)
      {
        $paper['start_time_i'] = strtotime($paper['start_time_2']);
        $paper['end_time_i'] = strtotime($paper['end_time_2']);
        $respuesta[] = $paper;
      }
      return $respuesta;
    } catch (Exception $e)
    {
      return false;
    }
  }
    /**
   * Consulta los autores de una ponencia
   * @author aorozco - Alejandro Orozco
   * @since 2012-06-19
   * @param int $pPaper Identificador de la ponencia
   * @return array Ponencias del track [título(string), hora de inicio (time), hora final (time)]
   */
  public static function consultarAutoresPonencia($pPaper)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT pa.first_name, pa.middle_name, pa.last_name, pa.affiliation, pa.country, pa.email, pa.url
FROM paper_authors pa
WHERE pa.paper_id = $pPaper";
      $resultado = $mysql->query($consulta);
      $respuesta = Array();
      foreach ($mysql->fetchAll($resultado) as $evento)
      {
        $respuesta[] = $evento;
      }
      return $respuesta;
    } catch (Exception $e)
    {
      return false;
    }
  }
    /**
   * Obtiene el listado de Papers (presentaciones) para un evento determinado que se daran proximamente segun el lapso de tiempo especificado en la configuración
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pEvento
   * @return Array Listado de papers programados para este evento (id, fecha y hora inicial, fecha y hora final)
   */
  public static function consultarPapers($pEvento)
  {
    $resultado = null;
    $lapso = self::consultarDetalles('lapso_paper', $pEvento);
    if($lapso == 0 || $lapso == null)
      $lapso = 1;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT p.paper_id,
       TIME(p.start_time) start_time,
       p.start_time start_time_2,
       TIME(p.end_time) end_time,
       p.end_time end_time_2,
       pp.room_id,
       p.track_id
  FROM papers p, published_papers pp
 WHERE     pp.sched_conf_id = $pEvento
      AND pp.paper_id = p.paper_id
      AND p.status=3
      ORDER BY p.start_time";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta;
    } catch (Exception $e)
    {
      return false;
    }
  }
}
?>