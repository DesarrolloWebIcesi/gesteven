<?php
/**
 * Clase Autenticacion
 * @package clases
 */

/**
 * Manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 * Conexión a la base de datos MySQL
 */
require_once("../lib/MySQL.class.php");
/**
 * Configuración del sistema
 */
require_once("../Configuracion.php");

/**
 * Clase para operaciones de autenticación de usuarios contra la BD de OCS
 * @package clases
 * @author  Alejandro Orozco <aorozco@icesi.edu.co>
 * @since   2010-02-01
 */
class Autenticacion
{

  /**
   * Autentica un usuario contra la BD de usuarios de OCS
   * @param string $pNombreUsuario
   * @param string $pClave
   * @return int (0) Autenticación exitosa, (1) Usuario no existe, (2) Usuario o contraseña equivocados, (3) Error de conexion a la BD, (4) Otro error
   */
  public static function autenticarUsuario($pNombreUsuario, $pClave)
  {
    try
    {
      $pNombreUsuario = trim($pNombreUsuario);
      $mysql = new Mysql();
      $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
      $consulta = "select password from users where username = '$pNombreUsuario'";
      $resultado = $mysql->query($consulta);
      $clave = $mysql->fetchAll($resultado);

      if (!empty($clave))
      {
        if ($clave[0]['password'] == sha1($pNombreUsuario . $pClave))
        {
          return 0;
        }
      }
      return 2;
    } catch (Exception $e)
    {
      return 3;
    }
  }
}

?>
