<?php
/**
 * Clase Evento
 * @author aorozco - Alejandro Orozco
 * @since 2011-02-01
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
 * Hace las gestiones relacionadas con eventos como consulta de eventos, asistentes
 * @author aorozco - Alejandro Orozco
 * @since 2011-02-01
 * @package clases
 */
class Evento
{

  public static $usuarios;

  /**
   * Obtiene los eventos para los que el usuario dado tiene al menos permisos de Monitor (0x00000060)
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-03
   * @param string $pUsuario nombre del usuario que inició sesión
   * @return Array Cada posición representa un evento en el cual el usuario
   * tiene permisos al menos como monitor se obtiene el id, la fecha de inicio,
   * y la fecha de finalización) o false en caso de error de conexión a la BD
   */
  public static function consultarEventos($pUsuario)
  {
    $resultado = null;
    try
    {
      //$lapso = self::consultarDetalles('lapso_evento', $pEvento);
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      /* $consulta = "SELECT DISTINCT DATE(sc.start_date) fecha_inicial, DATE(sc.end_date) fecha_final, sc.sched_conf_id
        FROM users u, roles r, sched_confs sc
        WHERE u.username = '" . $pUsuario . "'
        AND u.user_id = r.user_id
        AND r.role_id <= 0x00000060
        AND ADDTIME(sc.end_date, '$lapso:00:00.000000') >= DATE(NOW())
        AND ADDTIME(sc.start_date, '-$lapso:00:00.000000') <= NOW()"; */
      $consulta = "SELECT DISTINCT DATE( sc.start_date ) fecha_inicial, DATE( sc.end_date ) fecha_final, sc.sched_conf_id
FROM users u, roles r, sched_confs sc
WHERE u.username = '".$pUsuario."'
AND u.user_id = r.user_id
AND r.role_id <= 0x00000060
AND (
r.sched_conf_id = sc.sched_conf_id
OR r.sched_conf_id =0
)
AND (
r.conference_id = sc.conference_id
OR r.conference_id =0
)
ORDER BY fecha_inicial DESC";
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
   * Consulta informacion detallada de un evento programado en particular
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param string $pDetalle Detalle que se desea consultar (title, acronym,
   * etc.)
   * @param int $pEvento Identificador del evento
   * @return string Detalle solicitado o false en caso de que ocurra algun problema
   */
  public static function consultarDetalles($pDetalle, $pEvento)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select focsbus_confsetting(" . $pEvento . ", '" . $pDetalle . "') detalle";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return utf8_decode($respuesta[0]['detalle']);
      //return ($respuesta[0]['detalle']);
    } catch (Exception $e)
    {
      return false;
    }
  }
  
  /**
   * Consulta informacion detallada de un evento en particular
   * @author aorozco - Alejandro Orozco
   * @since 2011-09-08
   * @param string $pDetalle Detalle que se desea consultar (title, acronym,
   * etc.)
   * @param int $pEvento Identificador del evento
   * @return string Detalle solicitado o false en caso de que ocurra algun problema
   */
  public static function consultarDetallesGlobales($pDetalle, $pEvento)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select sc.conference_id
  from sched_confs sc
  where sc.sched_conf_id = $pEvento";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      $conference_id = $respuesta[0]['conference_id'];
      $consulta = "SELECT cs.setting_value
    FROM conference_settings cs
   WHERE cs.setting_name = '$pDetalle'
     AND cs.conference_id = $conference_id";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta[0]['setting_value'];
    } catch (Exception $e)
    {
      return false;
    }
  }

  /**
   * Consulta todos los usuarios inscritos a una conferencia programada
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pEvento Identificador del evento
   * @return Array Listado de inscritos
   */
  public static function consultarInscritos($pEvento)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select u.salutation, u.first_name, u.middle_name, u.last_name, u.gender, u.initials, u.affiliation, u.email, u.url, u.phone, u.fax, DATE(r.date_registered)
from users u, registrations r
where r.user_id = u.user_id
and r.sched_conf_id = " . $pEvento;
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta;
    } catch (Exception $e)
    {
      return false;
    }
  }

  /**
   * Consulta el máximo rol de un usuario para un evento
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pEvento Identificador del evento
   * @param string $pUsuario Nombre de usuario
   * @return int ID del rol del usuario
   */
  public static function consultarRol($pEvento, $pUsuario)
  {
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);

      $consulta = "SELECT DISTINCT MIN(r.role_id) rol
FROM users u, roles r
WHERE u.username = '$pUsuario'
AND (r.sched_conf_id = $pEvento OR r.sched_conf_id = 0)
AND u.user_id = r.user_id";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta[0]['rol'];
    } catch (Exception $e)
    {
      echo $e;
      return false;
    }
  }

  /**
   * Consulta los detalles de un inscrito dado su nombre de usuario
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pEvento Identificador del evento
   * @param string $pUsuario Nombre de usuario
   * @return Array Detalles del usuario
   */
  public static function consultarInscrito($pEvento, $pUsuario)
  {
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);

      $consulta = "select u.salutation, u.first_name, u.middle_name, u.last_name, u.gender, u.initials, u.affiliation, u.email, u.url, u.phone, u.mailing_address, u.fax, DATE(r.date_registered) fecha_registro, u.user_id, u.username, r.type_id, sc.conference_id
from users u, registrations r, sched_confs sc
where r.user_id = u.user_id
and r.sched_conf_id = $pEvento
and sc.sched_conf_id = $pEvento
and u.username = '$pUsuario'";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      $return = Array();
      if (!empty($respuesta[0]))
      {
        $consulta = "select cb.codigo_barras
from codigos_barras cb, users u
where cb.username like '$pUsuario'
and cb.sched_conf_id = $pEvento";
        $resultado = $mysql->query($consulta);
        $cb = $mysql->fetchAll($resultado);
        $respuesta[0]['codigo_barras'] = $cb[0]['codigo_barras'];
        $consulta = "select us.setting_value
from user_settings us
where us.user_id = ".$respuesta[0]['user_id']."
and us.setting_name = 'campos_personalizados_c".$respuesta[0]['conference_id']."'";
        $resultado = $mysql->query($consulta);
        $cb = $mysql->fetchAll($resultado);
        $campos = explode(";", $cb[0]['setting_value']);
        $respuesta[0]['campo_personalizado_1'] = $campos[0];
        $respuesta[0]['campo_personalizado_2'] = $campos[1];
        $respuesta[0]['campo_personalizado_3'] = $campos[2];
        $respuesta[0]['campo_personalizado_4'] = $campos[3];
        $respuesta[0]['campo_personalizado_5'] = $campos[4];
      }
      return $respuesta[0];
    } catch (Exception $e)
    {
      echo $e;
      return false;
    }
  }
  
    /**
   * Consulta los detalles de un inscrito dado su correo electrónico
   * @author aorozco - Alejandro Orozco
   * @since 2011-08-31
   * @param int $pEvento Identificador del evento
   * @param string $pEmail Correo electrónico
   * @return Array Detalles del usuario
   */
  public static function consultarInscritoEmail($pEvento, $pEmail)
  {
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);

      $consulta = "select u.salutation, u.first_name, u.middle_name, u.last_name, u.gender, u.initials, u.affiliation, u.username, u.url, u.phone, u.mailing_address, u.fax, DATE(r.date_registered) fecha_registro, u.user_id, r.type_id, sc.conference_id
from users u, registrations r, sched_confs sc
where r.user_id = u.user_id
and r.sched_conf_id = $pEvento
and sc.sched_conf_id = $pEvento
and u.email = '$pEmail'";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      $usuario = $respuesta[0]['username'];
      if (!empty($respuesta[0]))
      {
        $consulta = "select cb.codigo_barras
from codigos_barras cb, users u
where cb.username = '$usuario'
and cb.sched_conf_id = $pEvento";
        $resultado = $mysql->query($consulta);
        $cb = $mysql->fetchAll($resultado);
        $respuesta[0]['codigo_barras'] = $cb[0]['codigo_barras'];
        $consulta = "select us.setting_value
from user_settings us
where us.user_id = ".$respuesta[0]['user_id']."
and us.setting_name = 'campos_personalizados_c".$respuesta[0]['conference_id']."'";
        $resultado = $mysql->query($consulta);
        $cb = $mysql->fetchAll($resultado);
        $campos = explode(";", $cb[0]['setting_value']);
        $respuesta[0]['campo_personalizado_1'] = $campos[0];
        $respuesta[0]['campo_personalizado_2'] = $campos[1];
        $respuesta[0]['campo_personalizado_3'] = $campos[2];
        $respuesta[0]['campo_personalizado_4'] = $campos[3];
        $respuesta[0]['campo_personalizado_5'] = $campos[4];
      }
      return $respuesta[0];
    } catch (Exception $e)
    {
      echo $e;
      return false;
    }
  }

  /**
   * Consulta los detalles de un usuario dado su nombre de usuario
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pEvento Identificador del evento
   * @param string $pUsuario Nombre de usuario
   * @return Array Detalles del usuario
   */
  public static function consultarUsuario($pEvento, $pUsuario)
  {
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);

      $consulta = "select u.salutation, u.first_name, u.middle_name, u.last_name, u.gender, u.initials, u.affiliation, u.mailing_address, u.email, u.url, u.phone, u.fax, u.user_id, u.username
from users u
where u.username = '$pUsuario'";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta[0];
    } catch (Exception $e)
    {
      return false;
    }
  }
  
    /**
   * Consulta los detalles de un usuario dado su correo electrónico
   * @author aorozco - Alejandro Orozco
   * @since 2011-08-31
   * @param int $pEvento Identificador del evento
   * @param string $pEmail Correo electrónico
   * @return Array Detalles del usuario
   */
  public static function consultarUsuarioEmail($pEvento, $pEmail)
  {
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);

      $consulta = "select u.salutation, u.first_name, u.middle_name, u.last_name, u.gender, u.initials, u.affiliation, u.mailing_address, u.username, u.url, u.phone, u.fax, u.user_id
from users u
where u.email = '$pEmail'";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta[0];
    } catch (Exception $e)
    {
      return false;
    }
  }

  /**
   * Actualiza la información de un inscrito y le asigna código de barras si fue asignado
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param string $pNombre Nombre
   * @param string $pSegundoNombre Segundo nombre
   * @param string $pApellidos Apellidos
   * @param string $pEmail Correo electrónico
   * @param string $pTelefono Teléfono
   * @param string $pCodigoBarras Código de barras
   * @param int $pEvento ID del evento
   * @param string $pUsuario Nombre de usuario
   * @param string $pAsignado S si previamente se habia asignado código de barras
   * o N si no se habia asociado previamente
   * @return boolean true si se actualizo la información, false en caso de algún
   * error
   */
  public static function actualizarInscrito($pNombre, $pSegundoNombre, $pApellidos, $pEmail, $pTelefono, $pCodigoBarras, $pEvento, $pUsuario, $pAsignado)
  {
    $resultado = false;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $pNombre = mysql_real_escape_string($pNombre);
      $pSegundoNombre = mysql_real_escape_string($pSegundoNombre);
      $pApellidos = mysql_real_escape_string($pApellidos);
      $pEmail = mysql_real_escape_string($pEmail);
      $pTelefono = mysql_real_escape_string($pTelefono);
      $pCodigoBarras = mysql_real_escape_string($pCodigoBarras);
      $consulta = "update users u set u.first_name = '$pNombre', u.middle_name = '$pSegundoNombre', u.last_name = '$pApellidos', u.email = '$pEmail', u.phone = '$pTelefono' where u.username = '$pUsuario'";
      $resultado = $mysql->query($consulta);
      if ($resultado)
      {
        if ($pAsignado == "S")
        {
          $consulta = "update codigos_barras cb set cb.codigo_barras = '$pCodigoBarras' where cb.sched_conf_id = $pEvento and cb.username like '$pUsuario'";
        } else
        {
          $consulta = "insert into codigos_barras (codigo_barras, username, sched_conf_id) values ('$pCodigoBarras', '$pUsuario', $pEvento)";
        }
        if ($pCodigoBarras != "" && $pCodigoBarras != null)
        {
          $resultado = $mysql->query($consulta);
        }
      }
      return $resultado;
    } catch (Exception $e)
    {
      echo $e;
      return false;
    }
  }
  
  
   /**
   * Crea un usuario nuevo y lo inscribe al evento con el tipo de inscripción seleccionado, posteriormente le asigna el código de barras. El usuario se toma de la primera parte del correo electrónico (antes de la @).
   * @author aorozco - Alejandro Orozco
   * @since 2011-08-30
   * @param string $pTipoInscriopcion Tipo de inscripción
   * @param string $pNombre Nombre
   * @param string $pApellidos Apellidos
   * @param string $pEmail Correo electrónico
   * @param string $pTelefono Teléfono
   * @param string $pCodigoBarras Código de barras
   * @param int $pEvento ID del evento
   * @param int $pUsuario nombre de usuario
   * @param int $pTransaccion C creación de usuario, A actualización de usuario, I actualización de inscrito
   * @return Array Código de éxito o error con mensaje asociado
   */
  public static function crearInscrito($pTipoInscripcion, $pNombre, $pApellidos, $pEmail, $pTelefono, $pCodigoBarras, $pEvento, $pUsuario = null, $pTransaccion, $pAsignado, $pCampos, $pLugar, $pOrganizacion, $pGenero)
  { 
    $respuesta['error'] = 1;
    $mensaje = "Ocurrió un error al guardar la información. Intente de nuevo más tarde.";
    $user_id = -1;
    $conference_id = -1;
    $registrado = false;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      // Si no se diligenció el nombre de usuario se obtiene del correo electrónico
      if($pUsuario == null || $pUsuario == ""){
        $tempUsuario = explode("@",$pEmail);
        $pUsuario = $tempUsuario[0];
      }
      
      //escapando cadenas para evitar ataques por inyección de SQL
      $pEmail = mysql_real_escape_string($pEmail);
      $pNombre = mysql_real_escape_string($pNombre);
      $pApellidos = mysql_real_escape_string($pApellidos);
      $pUsuario = mysql_real_escape_string($pUsuario);
      $pTelefono = mysql_real_escape_string($pTelefono);
      $pCampos = mysql_real_escape_string($pCampos);
      $pLugar = mysql_real_escape_string($pLugar);
      $pOrganizacion = mysql_real_escape_string($pOrganizacion);
      $pGenero = mysql_real_escape_string($pGenero);
      $pCodigoBarras = mysql_real_escape_string($pCodigoBarras);
      
      //Accion dependiendo del tipo de transacción
      switch($pTransaccion){
        case 'C': //El usuario no existe, se crea y se inscribe
        
        // Verificar que el correo no exista en la BD
        $consulta = "select count('x') asignado from users u where u.email = '$pEmail'";
        $resultado = $mysql->query($consulta);
        $conteo_usuario = $mysql->fetchAll($resultado);
        if($conteo_usuario[0]['asignado'] == 0)
        {
          // Verificar que el usuario no exista en la BD
          $consulta = "select count('x') asignado from users u where u.username = '$pUsuario'";
          $resultado = $mysql->query($consulta);
          $conteo_usuario = $mysql->fetchAll($resultado);
          if($conteo_usuario[0]['asignado'] == 0)
          {
            // Crear usuario
            $length = 10;
            $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
            $pClave = "";

            for ($p = 0; $p < $length; $p++)
            {
              $pClave .= $characters[mt_rand(0, strlen($characters))];
            }
            
            $password = sha1($pUsuario . $pClave);
            $consulta = "INSERT INTO users (username, password, first_name, last_name, email, phone, country, date_registered, date_last_login, affiliation, mailing_address, gender) VALUES ('$pUsuario','$password', '$pNombre','$pApellidos','$pEmail','$pTelefono', 'CO', NOW(),NOW(), '$pOrganizacion', '$pLugar', '$pGenero')";
            $resultado = $mysql->query($consulta);
            if($resultado){
              
              // Asignar Rol
              $consulta = "SELECT sc.conference_id, c.path, sc.path sc_path
  FROM sched_confs sc, conferences c
 WHERE sc.sched_conf_id = $pEvento AND sc.conference_id = c.conference_id";
              $resultado = $mysql->query($consulta);
              $filas = $mysql->fetchAll($resultado);
              $conference_id = $filas[0]['conference_id'];
              $conference_path = $filas[0]['path'];
              $sched_conf_path = $filas[0]['sc_path'];
              $consulta = "select u.user_id from users u where u.username = '$pUsuario'";
              $resultado = $mysql->query($consulta);
              $filas = $mysql->fetchAll($resultado);
              $user_id = $filas[0]['user_id'];
              
              $consulta = "SELECT count('x') enrolado from roles r where r.conference_id = $conference_id and r.sched_conf_id = $pEvento and r.user_id =  $user_id and r.role_id = 32768";
              $resultado = $mysql->query($consulta);
              $filas = $mysql->fetchAll($resultado);
              $resultado = true;
              if($filas[0]['enrolado'] <= 0)
              {
                $consulta = "insert into roles (conference_id,sched_conf_id,user_id,role_id) VALUES ($conference_id, $pEvento, $user_id, 32768)";
                $resultado = $mysql->query($consulta);
              }
              if($resultado)
              {
                // Inscribir al evento con tipo de inscripción y pago
                $consulta = "select count('x') inscrito from registrations r where r.user_id = $user_id and r.sched_conf_id = $pEvento";
                $resultado = $mysql->query($consulta);
                $conteo_usuario = $mysql->fetchAll($resultado);
                if($conteo_usuario[0]['inscrito'] <= 0)
                {
                  $consulta = "insert into registrations (sched_conf_id,user_id,type_id,date_registered,date_paid) VALUES ($pEvento, $user_id, $pTipoInscripcion, NOW(), null)";
                  $resultado = $mysql->query($consulta);
                  if($resultado){
                    $registrado = true;
                    //$consulta = "select focsbus_confsetting(" . $pEvento . ", '" . $pDetalle . "') detalle";
                    $consulta = "SELECT scs.setting_value detalle
    FROM sched_conf_settings scs
   WHERE scs.setting_name = 'contactEmail'
     AND scs.sched_conf_id = $pEvento";
                    $resultado = $mysql->query($consulta);
                    $respuesta = $mysql->fetchAll($resultado);
                    $from =  utf8_decode($respuesta[0]['detalle']);
                    $respuesta['error'] = 0;
                    $mensaje = "Se ha inscrito al usuario exitosamente.";
                    $mensaje_correo = "Cordial saludo $pNombre, a continuación detallamos la información de su cuenta para asistir a los eventos de la Universidad Icesi:\n
                    \n
                    -Usuario: $pUsuario\n
                    -Contraseña: $pClave\n
                    \n
                    Recuerde que puede cambiar su contraseña en la siguiente URL: https://www.icesi.edu.co/eventos/index.php/$conference_path/$sched_conf_path/user/changePassword\n";
                    $asunto = "Su cuenta en Gestión de Eventos de la Universidad Icesi";
                    $cabeceras =  'From: '.$from."\r\n" .
                                  'Reply-To: '.$from."\r\n" .
                                  "\r\n";
                    mail($pEmail, $asunto, $mensaje_correo, $cabeceras);
                  }
                  else
                  {
                    $mensaje = "Se creó el usuario pero no se pudo inscribir al evento, intente nuevamente";
                  }
                }
                else
                {
                  $registrado = true;
                }
              }
              else
              {
                $mensaje = "Se creó el usuario pero no se pudo enrolar al evento, intente nuevamente.";
              }
            }
            else
            {
              $mensaje = "No se pudo crear el usuario.";
            }
          }
          else
          {
            $mensaje = "Ya existe un usuario con ese nombre de usuario.";
          }
        }
        else
        {
          $mensaje = "Ya existe un usuario con ese correo electrónico.";
        }
        break;
        case 'A': //El usuario existe, se inscribe y actualizan datos
          // Verificar que el correo no exista en la BD para otro usuario
          $consulta = "select count('x') otro from users u where u.email = '$pEmail' and u.username <> '$pUsuario'";
          $resultado = $mysql->query($consulta);
          $conteo_usuario = $mysql->fetchAll($resultado);
          if($conteo_usuario[0]['otro'] == 0)
          { 
            $consulta = "UPDATE users u SET u.first_name = '$pNombre', u.middle_name = '', u.last_name = '$pApellidos', u.email = '$pEmail', u.phone = '$pTelefono', u.affiliation = '$pOrganizacion', u.mailing_address = '$pLugar', u.gender = '$pGenero' WHERE u.username = '$pUsuario'";
            $resultado = $mysql->query($consulta);
            if($resultado)
            {
              
              // Asignar Rol
              $consulta = "select sc.conference_id from sched_confs sc where sc.sched_conf_id = $pEvento";
              $resultado = $mysql->query($consulta);
              $filas = $mysql->fetchAll($resultado);
              $conference_id = $filas[0]['conference_id'];
              $consulta = "select u.user_id from users u where u.username = '$pUsuario'";
              $resultado = $mysql->query($consulta);
              $filas = $mysql->fetchAll($resultado);
              $user_id = $filas[0]['user_id'];
              $consulta = "SELECT count('x') enrolado from roles r where r.conference_id = $conference_id and r.sched_conf_id = $pEvento and r.user_id =  $user_id and r.role_id = 32768";
              $resultado = $mysql->query($consulta);
              $filas = $mysql->fetchAll($resultado);
              $resultado = true;
              if($filas[0]['enrolado'] <= 0)
              {
                $consulta = "insert into roles (conference_id,sched_conf_id,user_id,role_id) VALUES ($conference_id, $pEvento, $user_id, 32768)";
                $resultado = $mysql->query($consulta);
              }
            
              if($resultado)
              {
                // Inscribir al evento con tipo de inscripción y pago
                $consulta = "select count('x') inscrito from registrations r where r.user_id = $user_id and r.sched_conf_id = $pEvento";
                $resultado = $mysql->query($consulta);
                $conteo_usuario = $mysql->fetchAll($resultado);
                if($conteo_usuario[0]['inscrito'] <= 0)
                {
                  $consulta = "insert into registrations (sched_conf_id,user_id,type_id,date_registered,date_paid) VALUES ($pEvento, $user_id, $pTipoInscripcion, NOW(), null)";
                  $resultado = $mysql->query($consulta);
                  if($resultado)
                  {
                    $registrado = true;
                    $respuesta['error'] = 0;
                    $mensaje = "Se ha inscrito al usuario exitosamente";
                  }
                  else
                  {
                    $mensaje = "Se creó el usuario pero no se pudo inscribir al evento, intente nuevamente";
                  }
                }
                else
                {
                  $registrado = true;
                }
              }
              else
              {
                $mensaje = "Se creó el usuario pero no se pudo enrolar al evento, intente nuevamente.";
              }
            }
            else
            {
              $mensaje = "No se pudo modificar la información del usuario.";
            }
          }
          else
          {
            $mensaje = "Ya existe otro usuario con ese correo electrónico.";
          }
        break;
        case 'I': //El usuario existe y está inscrito, se actualizan datos
          // Verificar que el correo no exista en la BD
          $consulta = "select count('x') asignado from users u where u.email = '$pEmail' and u.username <> '$pUsuario'";
          $resultado = $mysql->query($consulta);
          $conteo_usuario = $mysql->fetchAll($resultado);
          if($conteo_usuario[0]['asignado'] <= 0)
          {
            $consulta = "UPDATE users u SET u.first_name = '$pNombre', u.middle_name = '', u.last_name = '$pApellidos', u.email = '$pEmail', u.phone = '$pTelefono', u.affiliation = '$pOrganizacion', u.mailing_address = '$pLugar', u.gender = '$pGenero' WHERE u.username = '$pUsuario'";
            $resultado = $mysql->query($consulta);
            
              if($resultado)
              {
                $registrado = true;
                $respuesta['error'] = 0;
                $mensaje = "La información del usuario fue actualizada.";
              }
              else
              {
                $mensaje = "No se pudo actualizar la información del usuario.";
              }
          }
          else
          {
            $mensaje = "Ya existe otro usuario con ese correo electrónico.";
          }
        break;
        default:
          $mensaje = "Opción no válida.";
        break;
      }
      
      //Validar que el usuario fue registrado (creado, actualizado o inscrito) para evitar errores de SQL en las siguientes consultas
      if($registrado)
      {
        // Asignar código de barras
        // VALIDAR QUE EL CB NO HAYA SIDO ASIGNADO A OTRO USUARIO
        if ($pCodigoBarras != "" && $pCodigoBarras != null)
        {
          $consulta = "SELECT count('x') asignado
      FROM codigos_barras cb
     WHERE cb.sched_conf_id = $pEvento AND cb.codigo_barras = '$pCodigoBarras'";
          $resultado = $mysql->query($consulta);
          $filas = $mysql->fetchAll($resultado);
          $otro_asignado = $filas[0]['asignado'];
          if($otro_asignado <= 0)
          {
            if($pAsignado == "N")
            {
              $consulta = "INSERT INTO codigos_barras (codigo_barras, username, sched_conf_id) VALUES ('$pCodigoBarras', '$pUsuario', $pEvento)";
            }
            else
            {
              $consulta = "UPDATE codigos_barras cb SET cb.codigo_barras = '$pCodigoBarras' WHERE cb.sched_conf_id = $pEvento AND cb.username = '$pUsuario'";
            }
            $resultado = $mysql->query($consulta);
            if(!$resultado)
            {
              $respuesta['error'] = 1;
              $mensaje = "No se pudo asignar el código de barras.";             
            }
          }
          else
          {
            $respuesta['error'] = 1;
            $mensaje = "El código de barras ya ha sido asignado a otro usuario en este evento.";
          }
        }
        $consulta = "SELECT sc.conference_id
        FROM sched_confs sc
        WHERE sc.sched_conf_id = $pEvento";
        $resultado = $mysql->query($consulta);
        $filas = $mysql->fetchAll($resultado);
        $conference_id = $filas[0]['conference_id'];
        $consulta = "select u.user_id from users u where u.username = '$pUsuario'";
        $resultado = $mysql->query($consulta);
        $filas = $mysql->fetchAll($resultado);
        $user_id = $filas[0]['user_id'];
        
        //VERIFICANDO EXISTENCIA DE VALORES PERSONALIZADOS PARA ESTE EVENTO
        $consulta = "SELECT count('x') campos from user_settings us where us.user_id = $user_id and setting_name = 'campos_personalizados_c$conference_id'";
        $resultado = $mysql->query($consulta);
        $filas = $mysql->fetchAll($resultado);
        $campos = $filas[0]['campos'];
        if($campos <= 0)
        {
          $consulta = "INSERT INTO user_settings (user_id, setting_name, setting_value) VALUES ($user_id, 'campos_personalizados_c$conference_id', '$pCampos')";
        }
        else
        {
          $consulta = "UPDATE user_settings us SET us.setting_value = '$pCampos' WHERE us.user_id = $user_id AND us.setting_name = 'campos_personalizados_c$conference_id'";
        }
        $resultado = $mysql->query($consulta);
        if(!$resultado)
        {
          $respuesta['error'] = 1;
          $mensaje = "No se pudo guardar los valores de los campos personalizados.";             
        }
      }
    } catch (MySQLException $e)
    {
      $respuesta['error'] = 1;
      $mensaje = "Ocurrió un error en la conexión a la base de datos."; 
      $respuesta['detalles_error'] = $e->getMessage();
    } catch (Exception $e)
    {
      $respuesta['error'] = 1;
      $mensaje = "Ocurrió un error en el sistema."; 
      $respuesta['detalles_error'] = $e->getMessage();
    }
    $respuesta['msg'] = utf8_encode($mensaje);
    return $respuesta;   
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
       TIME(p.end_time) end_time,
       pp.room_id
  FROM papers p, published_papers pp
 WHERE     pp.sched_conf_id = $pEvento
       AND pp.paper_id = p.paper_id
       AND ADDTIME(p.end_time, '$lapso:00:00.000000') >= NOW()
       AND ADDTIME(p.start_time, '-$lapso:00:00.000000') <= NOW()
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
  
  /**
   * Obtiene el listado de Papers (ponencias) para un evento determinado
   * @author damanzano - David Andrés Manzano
   * @since 2011-08-24
   * @param int $pEvento
   * @return Array Listado de papers programados para este evento (id, fecha y hora inicial, fecha y hora final)
   */
  public static function consultarPapersListados($pEvento)
  {
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT p.paper_id, ps.setting_value       
       FROM papers p, published_papers pp, paper_settings ps
       WHERE pp.sched_conf_id = $pEvento
       AND pp.paper_id = p.paper_id
       AND ps.paper_id = p.paper_id
       AND ps.setting_name='title'
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

  /**
   * Obtiene informacion detallada de un paper
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param string $pDetalle Información que se desea obtener (title,cleanTitle)
   * @param int $pPaper ID del paper
   * @return string Cadena con el detalle solicitado
   */
  public static function consultarDetallesPaper($pDetalle, $pPaper)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select ps.setting_value
from paper_settings ps
where ps.setting_name like '$pDetalle'
and ps.paper_id = $pPaper";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return utf8_decode($respuesta[0]['setting_value']);
    } catch (Exception $e)
    {
      return false;
    }
  }

  /**
   * Obtiene informacion detallada de un lugar
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param string $pDetalle Información que se desea obtener (abbrev, name,
   * description)
   * @param int $pRoom ID del lugar
   * @return string Cadena con el detalle solicitado
   */
  public static function consultarDetallesLugar($pDetalle, $pRoom)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select rs.setting_value
from room_settings rs
where rs.setting_name like '$pDetalle'
and rs.room_id = $pRoom;";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return utf8_decode($respuesta[0]['setting_value']);
    } catch (Exception $e)
    {
      return false;
    }
  }
  
   /**
   * Obtiene los tipos de inscripción de un evento sin restricción de fechas de cierre
   * @author aorozco - Alejandro Orozco
   * @since 2011-08-31
   * @param string $pEvento Información que se desea obtener (name, description)
   * @return string Cadena con el detalle solicitado
   */
  public static function consultarTipoInscripcion($pEvento, $actuales = false)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      if(!$actuales){
        $consulta = "SELECT rt.type_id,
       rt.cost,
       rts.setting_value,
       rt.currency_code_alpha
  FROM registration_types rt, registration_type_settings rts
 WHERE     rt.sched_conf_id = $pEvento
       AND rt.type_id = rts.type_id
       AND rts.setting_name = 'name'";
      }else{
        $consulta = "SELECT rt.type_id,
       rt.cost,
       rts.setting_value,
       rt.currency_code_alpha
  FROM registration_types rt, registration_type_settings rts
 WHERE     rt.sched_conf_id = $pEvento
       AND rt.type_id = rts.type_id
       AND rts.setting_name = 'name'
       AND NOW() >=rt.opening_date
       AND NOW() <= rt.closing_date;";
      }
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta;
    } catch (Exception $e)
    {
      return false;
    }
  } 
  
    /**
   * Obtiene informacion detallada de un tipo de inscripcion
   * @author aorozco - Alejandro Orozco
   * @since 2011-08-31
   * @param string $pDetalle Información que se desea obtener (name, description)
   * @param int $pRegType ID del tipo de inscripción
   * @return string Cadena con el detalle solicitado
   */
  public static function consultarDetallesTipoInscripcion($pDetalle, $pRegType)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select rs.setting_value
from registration_type_settings rts
where rts.setting_name like '$pDetalle'
and rts.type_id = $pRegType;";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      return $respuesta[0]['setting_value'];
      //return ($respuesta[0]['detalle']);
    } catch (Exception $e)
    {
      return false;
    }
  }

  /**
   * Registra un ingreso utilizando el codigo de barras
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param string $pCodigoBarras Código de barras ingresado por el lector
   * @param int $pPaper ID del paper
   * @param int $pEvento ID del evento al que pertenece el paper
   * @return int 0 si es exitoso, 1 si ya se registro E/S anteriormente, 2 si el
   * codigo de barras no esta asociado, 3 si no se pudo hacer el insert, -1 en
   * caso de algún error de conexión. 
   */
  public static function registrarIngreso($pCodigoBarras, $pPaper, $pEvento)
  {
    $retorno = Array();
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $pCodigoBarras = mysql_real_escape_string($pCodigoBarras);
      $consulta = "select cb.username
from codigos_barras cb
where cb.codigo_barras = '$pCodigoBarras'
and cb.sched_conf_id = $pEvento";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);

      //Verificando que el codigo de barras este asociado a un usuario
      if ($respuesta[0]['username'] != null || $respuesta[0]['username'] != "")
      {
        $usuario = $respuesta[0]['username'];
        $consulta = "select count('x') registros
from registros_papers rp
where rp.paper_id = $pPaper
and rp.username = '$usuario'
and (rp.tipo_transaccion = 'E' OR rp.tipo_transaccion = 'S')";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);

        //Verificando que anteriormente no se haya registrado un ingreso o
        //salida
        if ($respuesta[0]['registros'] <= 0)
        {
          $consulta = "insert into registros_papers (paper_id, username, fecha_hora_transaccion, tipo_transaccion)
values ($pPaper, '$usuario', NOW(), 'E')";
          $resultado = $mysql->query($consulta);
          if ($resultado)
          {
            $retorno['error'] = 0;
            $retorno['msg'] = "Operación exitosa";
          } else
          {
            $retorno['error'] = 3;
            $retorno['msg'] = "Error al tratar de generar el registro, intente de nuevo";
          }
        } else
        {
          $retorno['error'] = 1;
          $retorno['msg'] = "Ya se había registrado la entrada de este usuario";
        }
      } else
      {
        $retorno['error'] = 2;
        $retorno['msg'] = "El código de barras no se ha asignado a un usuario";
      }
    } catch (Exception $e)
    {
      $retorno['error'] = -1;
      $retorno['msg'] = "Error de SQL o de conexión a la base de datos";
    }
    return $retorno;
  }

  /**
   * Registra una salida utilizando el codigo de barras
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param string $pCodigoBarras Código de barras ingresado por el lector
   * @param int $pPaper ID del paper
   * @param int $pEvento ID del evento al que pertenece el paper
   * @return int 0 si es exitoso, 1 si ya se registro E/S anteriormente, 2 si el
   * codigo de barras no esta asociado, 3 si no se pudo hacer el insert, 4 si no
   * se ha registrado un ingreso y -1 en caso de algún error de conexión.
   */
  public static function registrarSalida($pCodigoBarras, $pPaper, $pEvento)
  {
    $resultado = false;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $pCodigoBarras = mysql_real_escape_string($pCodigoBarras);
      $consulta = "select cb.username
from codigos_barras cb
where cb.codigo_barras = '$pCodigoBarras'
and cb.sched_conf_id = $pEvento";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);

      //Verificando que el codigo de barras este asociado a un usuario
      if ($respuesta[0]['username'] != null || $respuesta[0]['username'] != "")
      {
        $usuario = $respuesta[0]['username'];
        $consulta = "select count('x') registros
from registros_papers rp
where rp.paper_id = $pPaper
and rp.username = '$usuario'
and rp.tipo_transaccion = 'E'";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);

        //Verificando que se haya registrado el ingreso
        if ($respuesta[0]['registros'] >= 1)
        {
          $consulta = "select count('x') registros
from registros_papers rp
where rp.paper_id = $pPaper
and rp.username = '$usuario'
and rp.tipo_transaccion = 'S'";
          $resultado = $mysql->query($consulta);
          $respuesta = $mysql->fetchAll($resultado);

          //Verificando que anteriormente no se haya registrado un ingreso o
          //salida
          if ($respuesta[0]['registros'] <= 0)
          {
            $consulta = "insert into registros_papers (paper_id, username, fecha_hora_transaccion, tipo_transaccion)
values ($pPaper, '$usuario', NOW(), 'S')";
            $resultado = $mysql->query($consulta);
            if ($resultado)
            {
              $retorno['error'] = 0;
              $retorno['msg'] = "Operación exitosa";
            } else
            {
              $retorno['error'] = 3;
              $retorno['msg'] = "Error al tratar de generar el registro, intente de nuevo";
            }
          } else
          {
            $retorno['error'] = 1;
            $retorno['msg'] = "Ya se había registrado la salida de este usuario";
          }
        } else
        {
          $retorno['error'] = 4;
          $retorno['msg'] = "No se ha registrado la entrada del usuario a esta conferencia";
        }
      } else
      {
        $retorno['error'] = 2;
        $retorno['msg'] = "El código de barras no se ha asignado a un usuario";
      }
    } catch (Exception $e)
    {
      $retorno['error'] = -1;
      $retorno['msg'] = "Error de SQL o de conexión a la base de datos";
    }
    return $retorno;
  }

  /**
   * Registra la salida de todos los usuarios que tengan un registro de entrada (pero no de salida) a un paper.
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pPaper ID del paper del que se registrarán las salidas
   * @return 0 si la transaccion es exitosa, -1 en caso de error de conexión, 1
   * si ocurrio algun error en el insert
   */
  public static function registrarSalidaMasiva($pPaper)
  {
    $resultado = null;
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "SELECT DISTINCT rp.username
  FROM registros_papers rp
 WHERE rp.paper_id = $pPaper AND rp.tipo_transaccion = 'E'
       AND rp.username NOT IN
              (SELECT DISTINCT rp.username
                 FROM registros_papers rp
                WHERE rp.paper_id = $pPaper AND rp.tipo_transaccion = 'S')";
      $resultado = $mysql->query($consulta);
      $respuesta = $mysql->fetchAll($resultado);
      if (sizeof($respuesta) > 0)
      {
        $consulta_salida = "INSERT INTO registros_papers (paper_id,
                             username,
                             fecha_hora_transaccion,
                             tipo_transaccion)
VALUES ";
        foreach ($respuesta as $username)
        {
          $usuario = $username['username'];
          $consulta_salida .= "($pPaper, '$usuario', NOW(), 'S'), ";
        }
        $consulta_salida = substr($consulta_salida, 0, strlen($consulta_salida) - 2);
        $resultado = $mysql->query($consulta_salida);
      }
      if ($resultado)
      {
        $retorno['error'] = 0;
        $retorno['msg'] = "Se registró exitosamente la salida de " . sizeof($respuesta) . " asistentes";
      } else
      {
        $retorno['error'] = 1;
        $retorno['msg'] = "No se registró la salida masiva";
      }
    } catch (Exception $e)
    {
      $retorno['error'] = -1;
      $retorno['msg'] = "Error de SQL o de conexión a la base de datos";
    }
    return $retorno;
  }

  /**
   * Registra la salida de todos los usuarios que tengan un registro de entrada (pero no de salida) a un paper.
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pPaper ID del paper del que se registrarán las salidas
   * @return Array en la posición 'error': 0 si la transaccion es exitosa, -1 en
   * caso de error de conexión, 1 si ocurrio algun error en el insert.
   * En la posición 'msg' se indica el mensaje asociado
   */
  public static function registrarCambioMasivo($pPaper, $pPaperSiguiente)
  {
    $retorno = self::registrarSalidaMasiva($pPaper);
    if ($retorno['error'] == 0)
    {
      try
      {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $cadena_usuarios = "";
        foreach (self::$usuarios as $u)
        {
          $cadena_usuarios .= "'" . $u['username'] . "',";
        }
        $cadena_usuarios = substr($cadena_usuarios, 0, strlen($cadena_usuarios) - 1);
        $consulta = "SELECT DISTINCT rp.username
  FROM registros_papers rp
 WHERE rp.paper_id = $pPaper AND rp.tipo_transaccion = 'E'
       AND rp.username IN
              ($cadena_usuarios)
       AND rp.username NOT IN
              (SELECT DISTINCT rp.username
                 FROM registros_papers rp
                WHERE rp.paper_id = $pPaperSiguiente AND rp.tipo_transaccion = 'E')";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);
        //$respuesta = self::$usuarios;
        if (sizeof($respuesta) > 0 && !empty($respuesta))
        {
          $consulta_salida = "INSERT INTO registros_papers (paper_id, username, fecha_hora_transaccion, tipo_transaccion)
VALUES ";
          foreach ($respuesta as $username)
          {
            $usuario = $username['username'];
            $consulta_salida .= "($pPaperSiguiente, '$usuario', NOW(), 'E'), ";
          }
          $consulta_salida = substr($consulta_salida, 0, strlen($consulta_salida) - 2);
          $resultado = $mysql->query($consulta_salida);
        }
        if ($resultado)
        {
          $retorno['error'] = 0;
          $retorno['msg'] = "Se registró exitosamente el cambio de ponencia a " . sizeof(self::$usuarios) . " asistentes";
        } else
        {
          $retorno['error'] = 1;
          $retorno['msg'] = "No se registró el cambio masivo";
        }
      } catch (Exception $e)
      {
        $retorno['error'] = -1;
        $retorno['msg'] = "Error de SQL o de conexión a la base de datos";
      }
    }
    return $retorno;
  }

  /**
   * Verifica que una transacción de salida o cambio masivo sea factible y genera el mensaje y formulario de confirmación
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pPaper ID del paper del que se registrarán las salidas masivas
   * @param string $pOperacion
   * @param int $pPaperSiguiente ID del paper al que se registrarán las entradas
   * cuando se trata de un cambio masivo
   * @return Array Código de error/éxito y mensaje asociado. Si es una operación
   * exitosa el mensaje contiene el HTML del formulario de confirmación
   */
  public static function verificarMasivo($pPaper, $pOperacion, $pPaperSiguiente=null)
  {
    $resultado = null;
    if($pPaper != null){
      try
      {
        $mysql = new Mysql();
        $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
        $consulta = "SELECT DISTINCT rp.username
    FROM registros_papers rp
   WHERE rp.paper_id = $pPaper AND rp.tipo_transaccion = 'E'
         AND rp.username NOT IN
                (SELECT DISTINCT rp.username
                   FROM registros_papers rp
                  WHERE rp.paper_id = $pPaper AND rp.tipo_transaccion = 'S')";
        $resultado = $mysql->query($consulta);
        $respuesta = $mysql->fetchAll($resultado);
        if (sizeof($respuesta) > 0 && !empty($respuesta))
        {
          $retorno['error'] = 5;
          if ($pPaperSiguiente == null)
          {
            $retorno['msg'] = "¿Está seguro de registrar la salida a " . sizeof($respuesta) . " asistentes de la ponencia \"" . self::consultarDetallesPaper('title', $pPaper) . "\"?";
            $retorno['confirmacion'] = '<br /><input type="submit" id="confirmacion_' . $pOperacion . '" value="Confirmar" onclick="$(\'#id_paper_masivo\').val(' . $pPaper . ');registro(\'confirmacion_' . $pOperacion . '\');"/> <input type="hidden" id="id_paper_masivo" value="' . $pPaper . '" />';
          } else
          {
            $retorno['msg'] = "¿Está seguro de registrar el cambio masivo a " . sizeof($respuesta) . " asistentes de la ponencia \"" . self::consultarDetallesPaper('title', $pPaper) . "\" a la ponencia \"" . self::consultarDetallesPaper('title', $pPaperSiguiente) . "\"?";
            $retorno['confirmacion'] = '<br /><input type="submit" id="confirmacion_' . $pOperacion . '" value="Confirmar" onclick="$(\'#id_paper_masivo\').val(' . $pPaper . ');$(\'#id_paper_masivo_siguiente\').val(' . $pPaperSiguiente . ');registro(\'confirmacion_' . $pOperacion . '\');"/>';
            self::$usuarios = $respuesta;
            //print_r(self::$usuarios);
          }
        } else
        {
          $retorno['error'] = 1;
          $retorno['msg'] = "No hay registros de entrada";
        }
      } catch (Exception $e)
      {
        $retorno['error'] = -1;
        $retorno['msg'] = "Error de SQL o de conexión a la base de datos";
      }
    }else{
      $retorno['error'] = -1;
      $retorno['msg'] = "No se seleccionó una ponencia";
    }
    /* $retorno['error'] = 1;
      $retorno['msg'] = print_r($respuesta, true); */
    print_r($respuesta, true);
    return $retorno;
  }

  /**
   * Este método ingresa los datos de configuración de las diferentes opciones del sistema
   *
   * @author damanzano
   * @since 18/02/11
   *
   * @param int $id_conferencia código de indentificación de la conferencia en
   * el sistema
   * @param int $lapso_evento Tiempo en horas antes del evento en que se puede comenzar
   * a registrar asistencia
   * @param int $lapso_paper Tiempo en horas después de cada presentación hasta
   * la que se puede registrar salidas.
   * @param string $calculo_certificado Forma de calcular el merecimiento de certificado
   * @param int $porc_asistencia Porcentaje de asistencia mínimo para hacerce merecedor
   * de certificado (cuando la forma de calcularlo es por porcentaje)
   * @param int $n_papers Número de paper mínimos pra hacerce merecedor de certificado
   * (cuendo la forma de calcularlo es por número de presentaciones)
   */
  public static function configurar_sistema($id_conferencia, $lapso_evento, $lapso_paper, $calculo_certificado, $porc_asistencia, $n_papers, $lugares, $campos, $valoresCampos, $pOrganizaciones)
  {
    $mysql = new Mysql();
    $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);

    $sql = "call pocsact_confsistema(" . $id_conferencia . ", 0, " . $lapso_paper . ",'" . $calculo_certificado . "', " . $porc_asistencia . ", " . $n_papers . ");";
    //echo $sql;
    $resultado = $mysql->query($sql);
    $sql = "call pocsact_confcamposinsc(" . $id_conferencia . ",'" . $lugares . "','" . $campos . "','".$valoresCampos."', '".$pOrganizaciones."');";
    //echo $sql;
    $resultado = $mysql->query($sql);
    return $resultado;
  }

  /**
   * Actualiza el rol de un usuario a monitor
   * @author aorozco - Alejandro Orozco
   * @since 2011-02-28
   * @param int $pEvento
   * @param int $pUsuario
   * @return boolean true si se actualizo la información, false en caso de algún
   * error
   */
  public static function actualizarRolUsuario($pEvento, $pUsuario)
  {
    $resultado = false;
    $retorno = Array();
    try
    {
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select sc.conference_id from sched_confs sc where sc.sched_conf_id = $pEvento";
      $resultado = $mysql->query($consulta);
      $filas = $mysql->fetchAll($resultado);
      $conference_id = $filas[0]['conference_id'];
      $consulta = "insert into roles (conference_id,sched_conf_id,user_id,role_id)
VALUES ($conference_id, $pEvento, $pUsuario, 96)";
      $resultado = $mysql->query($consulta);
      if ($resultado)
      {
        $retorno['error'] = 0;
        $retorno['msg'] = "Operación exitosa";
      } else
      {
        $retorno['error'] = -1;
        $retorno['msg'] = "No se pudo actualizar el rol del usuario";
      }
    } catch (Exception $e)
    {
      $retorno['error'] = -1;
      $retorno['msg'] = "Mensaje: " . $e->getMessage();
    }
    return $retorno;
  }

}

?>
