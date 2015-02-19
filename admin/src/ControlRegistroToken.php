<?php

/**
 * Este archivo se encarga de realizar el registro de actulización de datos
 * realizado por un usuario, generar el token y enviar un correo con el enlace
 * al usuario
 *
 * @author David Andrés Maznzano <damanzano>
 * @since 2015-01-26
 * @package src
 */
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
/**
 * Libreria de manejo de errores de MySQL
 */
require_once("../lib/ErrorManager.class.php");
/**
 * Libreria de acceso a bases de datos Mysql
 */
require_once("../lib/MySQL.class.php");
require_once("../Configuracion.php");
require_once("../class/Evento.php");

$control = new ControlRegistroToken();
$control->obtenerParametrosPost();
$control->ejecutarTarea();

class ControlRegistroToken {

    private $sched_conf_id;
    private $username;
    private $email;
    private $action;
    private $tokenUsar;

    /**
     * Ejecuta la tarea programada en el atributo $action de esta clase.
     * 0 Generar un nuevo token para actualización de datos
     * 1 Validar y utilizar un token generado previamente que se recive por
     * parámetro
     * @author damanzano
     * @since 2015-01-26
     * @return array con los resultados de la operación
     * error
     */
    public function ejecutarTarea() {
        switch ($this->action) {
            case 0:
                echo json_encode($this->generarToken());
                break;
            case 1:
                echo json_encode($this->usarToken($this->username, $this->tokenUsar));
                break;
        }
    }

    /**
     * Crea un token para una solicitud de actulización de datos, lo registra en
     * la base de datos y envia un correo al usuario para con el link de acceso
     * al formulario de actualización
     * @author damanzano
     * @since 2015-01-26
     * @return array con los resultados de la operación
     * error
     */
    private function generarToken() {
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');    // MySQL datetime format
        
        $concatenar = $this->sched_conf_id . "" . $this->username . "" . strtotime($now->getTimestamp()) * 1000;
        $token = sha1($concatenar);
        $registro = $this->registrarToken($this->sched_conf_id, $this->username, $token);

        $retorno = Array();

        if (sizeof($registro) > 0 && !empty($registro)) {
            //echo $registro["error"];
            if ($registro["error"] == 0) {
                $this->enviarCorreo($token);
                $retorno['error'] = 0;
                $retorno['msg'] = utf8_encode("Operación exitosa ".$token);
            } else {
                $retorno['error'] = 1;
                $retorno['msg'] = "Ups hubo un error al registrar el token";
            }
        }
        return $retorno;
    }

    /**
     * Registra una solicitud de actulización de datos en la base de datos
     * @author damanzano
     * @since 2015-01-26
     * @param int $pEvento
     * @param string $pUsuario
     * @param strinf $pToken 
     * @return boolean true si se registró la información, false en caso de algún
     * error
     */
    private function registrarToken($pEvento, $pUsuario, $pToken) {
        $resultado = false;
        $retorno = Array();
        try {
            $mysql = new Mysql();
            $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
            $consulta = "insert into actualizacion_tokens (username,sched_conf_id,token,fecha_solicitud,fecha_vencimiento,usado) VALUES ('$pUsuario',$pEvento,'$pToken', NOW(), DATE_ADD(NOW(), INTERVAL 2 HOUR), 0)";
            $resultado = $mysql->query($consulta);

            if ($resultado) {
                $retorno['error'] = 0;
                $retorno['msg'] = utf8_encode("Operación exitosa");
            } else {
                $retorno['error'] = -1;
                $retorno['msg'] = utf8_encode("No se pudo actualizar el rol del usuario");
            }
        } catch (Exception $e) {
            $retorno['error'] = -1;
            $retorno['msg'] = "Mensaje: " . $e->getMessage();
        }
        
        return $retorno;
    }

    /**
     * Valida que un token que sea válido y luego lo marca como usado.
     * @author damanzano
     * @since 2015-01-26
     * @param string $pUsuario
     * @param strinf $pToken 
     * @return array con los resultados de la operación
     */
    private static function usarToken($pUsuario, $pToken) {
        $resultado = false;
        $retorno = Array();
        try {
            $mysql = new Mysql();
            $mysql->connect(Configuracion::$bd_servidor, Configuracion::$bd_esquema, Configuracion::$bd_usuario, Configuracion::$bd_contrasena);
            $consulta = "select t.* "
                    . "from actualizacion_tokens t "
                    . "where t.token = '".$pToken."' "
                    . "and t.username = '".$pUsuario."' "
                    . "and t.usado = 0 "
                    . "and t.fecha_vencimiento > NOW()";
            //echo $consulta;
            $resultado = $mysql->query($consulta);
            $respuesta = $mysql->fetchAll($resultado);
            //$respuesta = self::$usuarios;
            if (sizeof($respuesta) > 0 && !empty($respuesta)) {
                $consulta = "update actualizacion_tokens set usado=1 "
                        . "where token = '$pToken' "
                        . "and username = '$pUsuario'";
                $resultado = $mysql->query($consulta);
                if ($resultado) {
                    $retorno['error'] = 0;
                    $retorno['msg'] = "Operación exitosa";
                } else {
                    $retorno['error'] = -1;
                    $retorno['msg'] = "No se pudo actualizar el rol del usuario";
                }
            } else {
                $retorno['error'] = 1;
                $retorno['msg'] = "Mensaje: Token Invalido";
            }
        } catch (Exception $e) {
            $retorno['error'] = -1;
            $retorno['msg'] = "Mensaje: " . $e->getMessage();
        }
        return $retorno;
    }

    /**
     * Esta función envía un correo al usuario que solicito el token con la
     * url a la que debe acceder para actualizar sus datos.
     * @author damanzano
     * @since 2015-01-26
     * @return boolean true si envío el correo satisfactoriamente false en caso
     * contrario.
     */
    private function enviarCorreo($token) {
        //Cuerpo del mensaje del correo
        $params = "http://localhost/eventos/actualizacion.php?sched_conf_id=" . $this->sched_conf_id . "&username=" . $this->username . "&email=" . $this->email . "&token=" . $token;
        $mensaje_correo = "Cordial saludo, \n";
        $mensaje_correo.= "Usted ha realizado una solicitud de actualización sus de datos en nuestro sistema. "
                . "Para ello haga clic en el siguiente enlace: <a href=\"" . $params . "\" target=\"_blank\">Actualizar Datos</a>\n\n";

        $mensaje_correo.="Sus datos han sido registrados en la base de datos de gestión de "
                . "eventos de la Universidad Icesi para propósitos de estadísticas de asistencia a eventos académicos. "
                . "Si desea que su información personal sea eliminada escriba un correo a midatopersonal@listas.icesi.edu.co ";

        //Se obtiene el nombre del evento
        $nombre_evento = Evento::consultarDetalles('title', $this->sched_conf_id);
        $from = "multimedios@listas.icesi.edu.co";
        $asunto = "Actualización" . " " . $nombre_evento;

        $cabeceras = 'From: ' . $from . "\r\n" .
                'Reply-To: ' . $from . "\r\n" .
                "\r\n";
        mail($this->email, $asunto, $mensaje_correo, $cabeceras);
    }

    public function obtenerParametrosPost() {
        $this->sched_conf_id = $_POST['sched_conf_id'];
        $this->username = $_POST['username'];
        $this->action = $_POST['action'];
        $this->email = $_POST['email'];
        $this->tokenUsar = $_POST['token'];
    }

    function getSched_conf_id() {
        return $this->sched_conf_id;
    }

    function getUsername() {
        return $this->username;
    }

    function getAction() {
        return $this->action;
    }

    function getEmail() {
        return $this->email;
    }

    function getTokenUsar() {
        return $this->tokenUsar;
    }

}
