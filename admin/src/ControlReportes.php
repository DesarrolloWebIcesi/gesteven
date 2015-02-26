<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * @author David Andrיs Manzano - damanzano
 * @since 14/02/11
 * @package src
 *
 */

/**
 * Libreria de acceso a bases de datos Mysql
 */
require_once("../lib/MySQL.class.php");
require_once("../Configuracion.php");
/**
 * Description de ControlReportes
 * Esta clase se encarga de realizar las diferentes consultas referentes a la 
 * generacion y configuraciףn de los reportes.
 *
 * @author David Andrיs Manzano - damanzano
 * @since 14/02/11 
 */
class ControlReportes {    
    /**
     * Este mיtodo consulta los asistentes a un evento determinado
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param int $id_conferencia cףdigo de indentificaciףn del evento en
     * el sistema
     *
     * @return array Arreglo con el listado de asistentes a la conferencia  con la
     * siguiente informaciףn:
     * [0] nombre de usuario
     * [1] Nombre
     * [2] Apellidos
     * [3] Correo electrףnico
     */
    public static function asistentes_x_conferecia($id_conferencia) {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $consulta = "select sc.conference_id
  from sched_confs sc
  where sc.sched_conf_id = $id_conferencia";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);
        $conference_id = $respuesta[0]['conference_id'];
        $sql = "SELECT DISTINCT lower(rp.username) username,
                upper(concat_ws(' ', u.first_name, u.middle_name)) nombre,
                upper(u.last_name) apellido,
                u.email correo,
                u.phone,
                u.gender,
                u.affiliation,
                u.mailing_address,
                us.setting_value,
                cb.fecha_inscripcion
  FROM registros_papers rp,
       papers p,
          users u
       LEFT JOIN
          user_settings us
       ON us.user_id = u.user_id
          AND us.setting_name = 'campos_personalizados_c".$conference_id."'
       LEFT JOIN
          codigos_barras cb
       ON u.username = cb.username
          AND cb.sched_conf_id = ".$id_conferencia."
 WHERE     rp.paper_id = p.paper_id
       AND rp.username = u.username
       AND rp.tipo_transaccion = 'E'
       AND p.sched_conf_id = ".$id_conferencia."
       AND p.status = 3
ORDER BY nombre;";
        $resultado = $mysql->query($sql);
        $asistentes=array();
        foreach ($mysql->fetchAll($resultado) as $fila){
           $fila['nombre'] = strtr(strtoupper(utf8_decode($fila['nombre'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['apellido'] = strtr(strtoupper(utf8_decode($fila['apellido'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['correo'] = utf8_decode($fila['correo']);
           $fila['phone'] = utf8_decode($fila['phone']);
           $fila['gender'] = utf8_decode($fila['gender']);
           $fila['affiliation'] = utf8_decode($fila['affiliation']);
           $fila['mailing_address'] = utf8_decode($fila['mailing_address']);
           $fila['campos_personalizados'] = utf8_decode($fila['setting_value']);
           $asistentes[]=$fila;
        }

        if(empty($asistentes)){
            return null;
        }
        return $asistentes;        
    }

/**
     * Este mיtodo consulta los inscritos a un evento determinado
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param int $id_conferencia cףdigo de indentificaciףn del evento en
     * el sistema
     *
     * @return array Arreglo con el listado de asistentes a la conferencia  con la
     * siguiente informaciףn:
     * [0] nombre de usuario
     * [1] Nombre
     * [2] Apellidos
     * [3] Correo electrףnico
     */
    public static function inscritos($id_conferencia) {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $consulta = "select sc.conference_id
  from sched_confs sc
  where sc.sched_conf_id = $id_conferencia";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);
        $conference_id = $respuesta[0]['conference_id'];
        $sql = "SELECT DISTINCT lower(u.username) username,
                upper(concat_ws(' ', u.first_name, u.middle_name)) nombre,
                upper(u.last_name) apellido,
                u.email correo,
                u.phone,
                u.gender,
                u.affiliation,
                u.mailing_address,
                us.setting_value,
                rts.setting_value tipo_inscripcion,
                r.date_registered,
                r.date_paid,
                r.special_requests,
		r.registration_id,
                cb.codigo_barras
  FROM registrations r, registration_type_settings rts, codigos_barras cb,
          users u
       LEFT JOIN
          user_settings us
       ON us.user_id = u.user_id
          AND us.setting_name = 'campos_personalizados_c".$conference_id."'
 WHERE     r.user_id = u.user_id
       AND r.sched_conf_id = $id_conferencia
       AND r.type_id = rts.type_id
       AND u.username = cb.username
       AND cb.sched_conf_id = r.sched_conf_id
       AND rts.setting_name = 'name'
 ORDER BY nombre";
        $resultado = $mysql->query($sql);
        $asistentes=array();
        foreach ($mysql->fetchAll($resultado) as $fila){
           $fila['nombre'] = strtr(strtoupper(trim(utf8_decode($fila['nombre']))),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['apellido'] = strtr(strtoupper(utf8_decode($fila['apellido'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['correo'] = utf8_decode($fila['correo']);
           $fila['campos_personalizados'] = utf8_decode($fila['setting_value']);
           $fila['phone'] = utf8_decode($fila['phone']);
           $fila['date_registered'] = utf8_decode($fila['date_registered']);
           $fila['mailing_address'] = utf8_decode($fila['mailing_address']);
           $fila['affiliation'] = utf8_decode($fila['affiliation']);
           $fila['tipo_inscripcion'] = utf8_decode($fila['tipo_inscripcion']);
           $fila['date_paid'] = utf8_decode($fila['date_paid']);
           $fila['special_requests'] = utf8_decode($fila['special_requests']);
           $fila['codigo_barras'] = utf8_decode($fila['codigo_barras']);
           $asistentes[]=$fila;
        }

        if(empty($asistentes)){
            return null;
        }
        return $asistentes;        
    }
    
 /**
     * Este mיtodo consulta los preinscritos a un evento determinado
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param int $id_conferencia cףdigo de indentificaciףn del evento en
     * el sistema
     *
     * @return array Arreglo con el listado de asistentes a la conferencia  con la
     * siguiente informaciףn:
     * [0] nombre de usuario
     * [1] Nombre
     * [2] Apellidos
     * [3] Correo electrףnico
     */
    public static function preinscritos($id_conferencia) {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $consulta = "select sc.conference_id
  from sched_confs sc
  where sc.sched_conf_id = $id_conferencia";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);
        $conference_id = $respuesta[0]['conference_id'];
        $sql = "SELECT DISTINCT lower(u.username) username,
                upper(concat_ws(' ', u.first_name, u.middle_name)) nombre,
                upper(u.last_name) apellido,
                u.email correo,
                u.phone,
                u.gender,
                u.affiliation,
                u.mailing_address,
                us.setting_value,
                rts.setting_value tipo_inscripcion,
                r.date_registered,
                r.date_paid,
                r.special_requests,
								r.registration_id
  FROM registrations r, registration_type_settings rts,
          users u
       LEFT JOIN
          user_settings us
       ON us.user_id = u.user_id
          AND us.setting_name = 'campos_personalizados_c".$conference_id."'
 WHERE     r.user_id = u.user_id
       AND r.sched_conf_id = $id_conferencia
       AND r.type_id = rts.type_id
       AND rts.setting_name = 'name'
 ORDER BY nombre, apellido";
        $resultado = $mysql->query($sql);
        $asistentes=array();
        foreach ($mysql->fetchAll($resultado) as $fila){
           $fila['nombre'] = strtr(strtoupper(trim(utf8_decode($fila['nombre']))),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['apellido'] = strtr(strtoupper(utf8_decode($fila['apellido'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['correo'] = utf8_decode($fila['correo']);
           $fila['campos_personalizados'] = utf8_decode($fila['setting_value']);
           $fila['phone'] = utf8_decode($fila['phone']);
           $fila['date_registered'] = utf8_decode($fila['date_registered']);
           $fila['mailing_address'] = utf8_decode($fila['mailing_address']);
           $fila['affiliation'] = utf8_decode($fila['affiliation']);
           $fila['tipo_inscripcion'] = utf8_decode($fila['tipo_inscripcion']);
           $fila['date_paid'] = utf8_decode($fila['date_paid']);
           $fila['special_requests'] = utf8_decode($fila['special_requests']);
           $asistentes[]=$fila;
        }

        if(empty($asistentes)){
            return null;
        }
        return $asistentes;        
    }    
 /**
     * Este mיtodo consulta los monitores de un evento determinado
     *
     * @author lmrivera
     * @since 08/01/15
     *
     * @param int $id_conferencia cףdigo de indentificaciףn del evento en
     * el sistema
     *
     * @return array Arreglo con el listado de monitores del evento con la
     * siguiente informaciףn:
     * [0] nombre de usuario
     * [1] Nombre
     * [2] Apellidos
     * [3] Correo electrףnico
     */
    public static function monitores($id_conferencia) {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        /*$consulta = "select sc.conference_id
  from sched_confs sc
  where sc.sched_conf_id = $id_conferencia";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);
        $conference_id = $respuesta[0]['conference_id'];*/
        $sql = "SELECT DISTINCT LOWER( u.username ) username, UPPER( CONCAT_WS(  ' ', u.first_name, u.middle_name ) ) nombre, UPPER( u.last_name ) apellido, u.email correo, u.user_id id_usuario
FROM users u, roles r
WHERE u.user_id = r.user_id
AND r.sched_conf_id =".$id_conferencia."
AND r.role_id =96";
        $resultado = $mysql->query($sql);
        $asistentes=array();
        foreach ($mysql->fetchAll($resultado) as $fila){
           $fila['nombre'] = strtr(strtoupper(trim(utf8_decode($fila['nombre']))),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['apellido'] = strtr(strtoupper(utf8_decode($fila['apellido'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['correo'] = utf8_decode($fila['correo']);
           $fila['username'] = utf8_decode($fila['username']);
           $fila['id_usuario'] = utf8_decode($fila['id_usuario']);
           $asistentes[]=$fila;
        }

        if(empty($asistentes)){
            return null;
        }
        return $asistentes;        
    }
    
    /**
     * Este mיtodo consulta los a una ponencia determinada
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param int $id_evento cףdigo de indentificaciףn del evento en el sistema
     * @param int $id_ponencia cףdigo de identificaciףn de la ponencia en el sistema
     *
     * @return array Arreglo con el listado de asistentes a la conferencia  con la
     * siguiente informaciףn:
     * [0] nombre de usuario
     * [1] Nombre
     * [2] Apellidos
     * [3] Correo electrףnico
     */
    public static function asistentes_x_ponencia($id_evento, $id_ponencia) {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        /*$sql = "select distinct rp.username username, upper(concat(u.first_name,' ',u.middle_name)) nombre, upper(u.last_name) apellido, u.email correo
              from registros_papers rp, papers p, users u
              where rp.paper_id=p.paper_id
              and rp.username=u.username
              and rp.tipo_transaccion='E'
              and p.sched_conf_id=".$id_evento."
              and p.paper_id=".$id_ponencia.";";*/
        $sql = "SELECT u.username, upper(concat_ws(' ',u.first_name,u.middle_name)) nombre, upper(u.last_name) apellido, lower(u.email) correo, rp.fecha_hora_transaccion entrada, rp1.fecha_hora_transaccion salida
    FROM papers p
       JOIN registros_papers rp
          ON p.paper_id = rp.paper_id
       JOIN users u
          ON rp.username = u.username
       LEFT JOIN registros_papers rp1
          ON     rp.paper_id = rp1.paper_id
             AND rp.username = rp1.username
             AND rp1.tipo_transaccion = 'S'
     WHERE p.sched_conf_id = $id_evento
       AND p.paper_id = $id_ponencia
       AND rp.tipo_transaccion = 'E'
    GROUP BY rp.username";
        $resultado = $mysql->query($sql);
        $asistentes=array();
        foreach ($mysql->fetchAll($resultado) as $fila){
           $fila['nombre'] = strtr(strtoupper(utf8_decode($fila['nombre'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['apellido'] = strtr(strtoupper(utf8_decode($fila['apellido'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['correo'] = utf8_decode($fila['correo']);
           if($fila['entrada'] == null){
              $fila['entrada'] = "No registrada";
           }
           if($fila['salida'] == null){
              $fila['salida'] = "No registrada";
           }
           $asistentes[]=$fila;
        }

        if(empty($asistentes)){
            return null;
        }
        return $asistentes;        
    }

    /**
     * Este mיtodo consulta los asistentes a una conferencia, que ademבs son
     * merecedores de certificado.
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param int $id_conferencia cףdigo de indentificaciףn de la conferencia en
     * el sistema
     *
     * @return array Arreglo con el listado de asistentes a la conferencia con la
     * siguiente informaciףn:
     * [0] nombre de usuario
     * [1] Nombre
     * [2] Apellidos
     * [3] Porcentaje de asistencia
     */
	 
    public static function merecedores_certificado($id_conferencia) {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $sql = "select temp.username username, temp.nombre nombre, temp.apellido apellido, temp.correo correo, temp.asistencia_ponencias asistencia_ponencias, temp.asistencia_horas asistencia_horas, temp.merece merece
                from (
                  select distinct rp.username username, upper(concat_ws(' ',u.first_name,u.middle_name)) nombre, upper(u.last_name) apellido, u.email correo, focscal_ponenciasasistidas(".$id_conferencia.",rp.username) asistencia_ponencias, focscal_horasasistidas(".$id_conferencia.",rp.username) asistencia_horas, focscal_merecertificado(".$id_conferencia.",rp.username) merece
                  from registros_papers rp, papers p, users u
                  where rp.paper_id=p.paper_id
                  and rp.username=u.username
                  and rp.tipo_transaccion='E'
                  and p.sched_conf_id=".$id_conferencia.") temp
                where temp.merece = 1
                order by nombre;";
        $resultado = $mysql->query($sql);
        $merecedores = array();
        foreach ($mysql->fetchAll($resultado) as $fila) {
           $fila['nombre'] = strtr(strtoupper(utf8_decode($fila['nombre'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['apellido'] = strtr(strtoupper(utf8_decode($fila['apellido'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
           $fila['correo'] = utf8_decode($fila['correo']);
            $merecedores[] = $fila;
        }

        if (empty($merecedores)) {
            return null;
        }
        return $merecedores;
    }

    /**
     * Este mיtodo consulta el listado de presentaciones de una conferencia a las
     * que asistiף una persona.
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param string $id_asistente nombre de usuario del asistente
     * @param int $id_conferencia cףdigo de indentificaciףn de la conferencia en
     * el sistema
     *
     * @return array Arreglo con el listado presentaciones de la conferencia con
     * la siguiente informaciףn:
     * [0]ID de la presentaciףn
     * [1]Nombre de la presentaciףn
     * [2]Fecha y Hora de inicio
     * [3]Fecha y Hora de fin
     * [4]Asistencia (S/N)
     */
    public static function asistencia_persona($id_asistente, $id_conferencia){
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        /*$sql="select p.paper_id idpaper,ps.setting_value titulo, p.start_time finicio, p.end_time ffin, (case rp.tipo_transaccion when 'E' then 'SI' else 'NO'end) asistio
             from users u join papers p join paper_settings ps on p.paper_id=ps.paper_id left join registros_papers rp on rp.username = u.username and rp.paper_id = p.paper_id
             
             where u.username = '".$id_asistente."'
             and p.sched_conf_id = ".$id_conferencia."
             and ps.setting_name='title'
             and (rp.tipo_transaccion = 'E' or rp.tipo_transaccion is null);";*/
        $sql = "SELECT p.paper_id idpaper,
       ps.setting_value titulo,
       rp.fecha_hora_transaccion finicio,
       rp1.fecha_hora_transaccion ffin,
       (CASE rp.tipo_transaccion WHEN 'E' THEN 'SI' ELSE 'NO' END) asistio
  FROM users u
       JOIN papers p
       JOIN paper_settings ps
          ON p.paper_id = ps.paper_id
       LEFT JOIN registros_papers rp
          ON rp.username = u.username AND rp.paper_id = p.paper_id
       LEFT JOIN registros_papers rp1
          ON     rp1.username = u.username
             AND rp1.paper_id = p.paper_id
             AND rp1.tipo_transaccion = 'S'
 WHERE     u.username = '$id_asistente'
       AND p.sched_conf_id = $id_conferencia
       AND ps.setting_name = 'title'
       AND (rp.tipo_transaccion = 'E' OR rp.tipo_transaccion IS NULL)
       AND p.status = 3
 ORDER BY  p.start_time;";
        $resultado = $mysql->query($sql);
        $presentaciones = array();
        foreach ($mysql->fetchAll($resultado) as $fila) {
             $fila['titulo'] = strtr(strtoupper(utf8_decode($fila['titulo'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
            $presentaciones[] = $fila;
        }

        if (empty($presentaciones)) {
            return null;
        }
        return $presentaciones;
    }

    /**
     * Este mיtodo calcula el porcentaje de asistencia de una persona a una
     * conferencia
     *
     * @author damanzano
     * @since 14/02/11
     *
     * @param string $id_asistente nombre de usuario del asistente
     * @param int $id_conferencia cףdigo de indentificaciףn de la conferencia en
     * el sistema
     *
     * @return array Arreglo con la siguiente informaciףn
     * [0] Nombre del asistente
     * [1] Porcentaje de asistencia del asistente a la conferencia
     */
    public static function porcentaje_asistencia($id_asistente,$id_conferencia){
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $sql="select upper(concat_ws(' ',u.first_name,u.middle_name,u.last_name)) usuario, focscal_porcasistencia(".$id_conferencia.",u.username)*100 asistencia
              from users u
              where u.username='".$id_asistente."';";
        $resultado = $mysql->query($sql);
        $datos=array();
        foreach ($mysql->fetchAll($resultado) as $fila) {
            $fila['usuario'] = strtr(strtoupper(utf8_decode($fila['usuario'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
            $datos[] = $fila;
        }
        
        if (empty($datos)) {
            return null; 
        }
        return $datos;
    }

    /**
     * Este mיtodo ingresa los datos de configuraciףn de los certificados
     *
     * @author damanzano
     * @since 18/02/11
	 * @since 15/05/13 - jdholguin: se agregף el parבmetro $include_id
     *
     * @param int $id_conferencia cףdigo de indentificaciףn de la conferencia en
     * el sistema
     * @param string $imagen nombre con el que se guardo la imagen el servidor.
     * Esta direccion es relativa a la carpeta certificados.
     * @param string $mensaje mensaje que va el en el vertificado.
	 * @param string $include_id es un valor 1 o 0 en caso de que deba o no incluirse (respectivamente)
	 * la cיdula en el certificado
     */
    public static function configurar_certificado($id_conferencia, $imagen, $mensaje, $margen, $include_id){
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        
        $sql="call pocsact_confcertificados(".$id_conferencia.", '".$imagen."', '".mysql_real_escape_string(utf8_encode($mensaje))."', ".$margen.", '".$include_id."');";
        //echo $sql;
        $resultado = $mysql->query($sql);       
    }


		public static function asistencia_totalizada($id_conferencia){
				$mysql = new Mysql();
				$mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
				$sql = "SELECT ps.paper_id, CONCAT( ps.setting_value,  ' [', p.start_time,  ' - ', p.end_time,  ']' ) nombre, COUNT( 
CASE WHEN rp.tipo_transaccion =  'E'
THEN 1 
ELSE NULL 
END ) cantidad
FROM papers p
LEFT JOIN registros_papers rp ON p.paper_id = rp.paper_id
LEFT JOIN paper_settings ps ON p.paper_id = ps.paper_id
WHERE p.sched_conf_id = $id_conferencia
AND ps.setting_name =  'title'
GROUP BY p.paper_id
ORDER BY p.start_time";
				$resultado = $mysql->query($sql);
				$presentaciones = array();
				foreach ($mysql->fetchAll($resultado) as $fila) {
					 $fila['nombre'] = strtr(strtoupper(utf8_decode($fila['nombre'])),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
					$presentaciones[] = $fila;
				}

				if (empty($presentaciones)) {
					return null;
				}
				return $presentaciones;
			}
	}
?>