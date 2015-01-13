<?php
/**
 * Este archivo se encarga registrar la aceptación de la política de protección 
 * de datos personales. Se tomó como base la implementación realizada por <jdholgin>
 * en octubre de 2013 
 * 
 * @author David Andrés Manzano Herrera <damanzano>
 * @since 2015-01-13
 * @package src
 *
 */

/**
 * Librería de acceso a bases de datos oracle
 */
include_once ('../lib/OracleServices.php');

ProteccionDatos::registrarProteccionDatos();

/**
 * Description of ControlProteccionDatos.php
 *
 * Script contiene todas las funcionalidades para crear el registro en la tabla
 * de auditoría TAUD_DISCLAIMER, usando el procedimiento almacenado PGESAUD_DISCLAIMER
 * que almacenará el consentimiento del usuario de la política de tratamiento de datos
 * 
 * @author Juan David Holguín Moreno <jdholguin>
 * @author David Andrés Manzano Herrera <damanzano>
 * 
 * @param char $aceptacion Indicador si acepta (S) o no (N) la ley de protección de datos
 * @param string $correo Correo electrónico del usuario
 * @param string $documento Identificación del usuario. Obligatorio
 * @param string $sistema El sistema desde el que se hace el llamado al servicio
 * @param string(3) $periodo_acad Período académico
 * @param numeric $per_consecutivo Consecutivo del período académico
 * @param string $respuesta Respuesta brindada por el usuario
 * @param char $entramite Si aún no se ha brindado la respuesta o si ya se brindó y se cierra el caso.
 * @param string $lider Líder o persona que brinda la respuesta.
 * @param string $motivo Motivo de autorización o negación.
 * @param char $negacion Si el usuario niega la autorización.
 * @return array Posición 0: Cantidad de errores, Posición 1: Mensaje, Posición 2: 1 o null para indicar el retorno exitoso o no
 *
 * 
 */
class ProteccionDatos {
    private $aceptacion;
    private $correo;
    private $documento;
    private $sistema;
    private $periodo_acad;
    private $per_consecutivo;
    private $respuesta;
    private $entramite;
    private $lider;
    private $motivo;
    private $negacion;
    
    

    public static function registrarProteccionDatos() {

        $sqlSelect = "SELECT COUNT(*) cuenta FROM taud_disclaimer WHERE documento = '" . $this->documento . "' AND sistema = '" . $this->sistema . "'";

        $bdAuditoria = new OracleServices('../oraconfig/.config');
        $bdAuditoria->conectar();

        $rs = $bdAuditoria->ejecutarConsulta($sqlSelect);

        if ($bdAuditoria->siguienteFila($rs)) {
            $cuenta = $bdAuditoria->dato($rs, 1);
			
            if ($cuenta <= 0) {
                $params = $aceptacion . ";" . $this->correo . ";" . $this->documento . ";" 
                        . $this->ip . ";" . $this->sistema . ";" . $this->periodo_acad . ";" 
                        . $this->per_consecutivo . ";" . $this->respuesta . ";" . $this->entramite . ";" 
                        . $this->lider . ";" . $this->motivo . ";" . $this->negacion;
                $sql = "BEGIN PGESAUD_DISCLAIMER(:params); END;";
                $input = array(":params" => $params);
                $retorno = $bdAuditoria->ejecutarProcSimple($sql, $input, 'I');
            } else {
                $retorno = 1;
            }
        }

        $bdAuditoria->desconectar();

        $result = array();

        // El procedimiento se ejecutó con éxito.
        if ($retorno == 1) {
            $result['error'] = 0;
            $result['msg'] = "Datos registrados.";
            $result['retorno'] = 1;
        } else {
            $result['error'] = 1;
            $result['msg'] = "Hubo un error al registrar los datos.";
        }

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET');
        header('Content-type: application/json');
        echo json_encode($result);
    }
    
    public static function obtenerParametrosPost(){
        $this->aceptacion = $_POST['aceptacion'];
        $this->$correo = $_POST['correo'];
        $this->$documento = $_POST['documento'];
	$this->$ip=$_POST['ip'];
        $this->$sistema = $_POST['sistema'];
        $this->$periodo_acad = $_POST['periodo_acad'];
        $this->$per_consecutivo = $_POST['per_consecutivo'];
        $this->$respuesta = $_POST['respuesta'];
        $this->$entramite = $_POST['entramite'];
        $this->$lider = $_POST['lider'];
        $this->$motivo = $_POST['motivo'];
        $this->$negacion = $_POST['negacion'];
    }
    
    public static function obtenerParametros($aceptacion, $correo, $documento, $ip, $sistema, $periodo_acad, $per_consecutivo, $respuesta, $entramite, $lider, $motivo, $negacion){
        $this->aceptacion = $aceptacion;
        $this->correo = $correo;
        $this->documento = $documento;
	$this->ip=$ip;
        $this->sistema = $sistema;
        $this->periodo_acad = $periodo_acad;
        $this->per_consecutivo = $per_consecutivo;
        $this->respuesta = $respuesta;
        $this->entramite = $entramite;
        $this->lider = $lider;
        $this->motivo = $motivo;
        $this->negacion = $negacion;
    }

}

?>
