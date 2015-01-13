<?php

/**
 * Description of OracleServices
 * Clase encargada de hacer la conexion con una base de datos oracle
 *
 * @author David Andrés Manzano - damanzano
 * @version $Id: OracleServices.php 01
 * @since 22/10/10
 */
class OracleServices {

    /**
     * @var $host Hostname o IP del servidor de la base de datos
     */
    private $host;
    /**
     * @var $user Usuario de la base de datos
     */
    private $user;
    /**
     * @var $pass Password del usuatio de la base de datos
     */
    private $pass;
    /**
     * @var $bd Nombre de la base de datos a la cual se va a conectar
     */
    private $siddb;
    /**
     * @var $connstring Cadena de conexión a la base de datos
     */
    private $connstring;
    /**
     * @var $myconn Instacia de conexión a la base de datos
     */
    private $myconn;
    /**
     * @var $error almacena los errores que se hayan podido generar al realizar alguna de las transanciones en la base de datos.
     */
    private $error;
    /**
     * @var $numcols Guarda el número de columnas que tiene el resultado de una consulta.
     */
    private $numcols;
    /**
     * @var $nomcols Array que contiene los nombres de las columnas ordenados por posición desde 0.
     */
    private $nomcols = array();
    /**
     * @var $tipocols Array que contiene los tipos de columnas String , number , text ...
     */
    private $tipocols = array();
    /**
     * @var tamcols Array que contiene la longuitud de las columnas , 20 , 30 ,
     */
    private $tamcols = array();
    /**
     * @var $numfilas  Guarda el número de filas que devuelve el resultado de una consulta.
     */
    private $numfilas;

    /**
     * Contructor de la clase
     * Construye un nuevo objeto OracleServices
     */
    public function OracleServices($connectionFile) {
        $this->setDatosConexion($connectionFile);
    }

    /**
     * Lee un archivo de texto con los datos de conexión a la base de datos.
     * El formato del archivo de configuración debe ser el siguiente:
     *
     * @method setDatosConexion($connectionFile) se ejecuta en el momento de crear una nueva instancia
     * de la clase.
     * @author damanzano
     * @since 22/10/10
     * 
     * @param string $connectionFile ruta del archivo de configuración
     */
    private function setDatosConexion($connectionFile) {        
        $fileData = file($connectionFile);
        $this->host = substr($fileData[0], 0, strlen($fileData[0]) - 2);
        $this->user = substr($fileData[1], 0, strlen($fileData[1]) - 2);
        $this->pass = substr($fileData[2], 0, strlen($fileData[2]) - 2);
        $this->siddb = substr($fileData[3], 0, strlen($fileData[3]) - 2);
        $this->connstring = "(DESCRIPTION =
                        (ADDRESS =
                            (PROTOCOL = TCP)
                            (HOST = $this->host)
                            (PORT = 1521)
                        )
                        (CONNECT_DATA = (SID = $this->siddb))
                    )";
    }

    /**
     * Se conecta a una base de datos MySQL de acuerdo a los parametros proporcionados en
     * OracleServices->setDatosConexion()
     *
     * @method conectar()
     * @author damanzano
     * @since 22/10/10
     * @see setDatosConexion()
     */
    public function conectar() {
        $this->myconn = oci_connect($this->user, $this->pass, $this->connstring);
        if (!$this->myconn) {
            $e = oci_error();
            //trigger_error(htmlentities($e['message']), E_USER_ERROR);
            $this->error = "Error tratando de conectarse a la base de datos<br>" . htmlentities($e['message']);
            echo $this->error;
            return false;
        }
        return true;
    }

    /**
     * Este método se usa para desconectrase de la base de datos
     *
     * @method desconectar()
     * @author damanzano
     * @since 22/10/10
     */
    public function desconectar() {
        if (oci_close($this->myconn)) {
            return true;
        } else {
            $e = oci_error($this->myconn);
            $this->error = "No es posible desconectarse de la base de datos<br>" . htmlentities($e['message']);
            die($this->error);
        }
    }

    /**
     * Ejecuta la consulta pasada por paranetro sobre la base de datos y retorna los resultados
     * de la consulta.
     *
     * @method ejecutarConsulta()
     * @author damanzano
     * @param string $sql Consulta que se desea consultar
     */
    public function ejecutarConsulta($sql) {
        $statement = oci_parse($this->myconn, $sql);
        if (!$statement) {
            $e = oci_error($statement);
            $this->error = "Error al procesar la consulta<br>" . htmlentities($e['message']);
            die($this->error);
        }
        oci_execute($statement, OCI_DEFAULT);

        $this->numcols = oci_num_fields($statement);
        $this->numfilas = oci_num_rows($statement);

        //Si la consulta fue un select se guarda la información de los nombres y tipos de las
        //columnas que vienen en el resultado
        if (oci_statement_type($statement) == 'SELECT') {

            for ($n = 1; $n <= $this->numcols; $n++) {
                $this->nomcols[$n] = oci_field_name($statement, $n);
                $this->tipocols[$n] = oci_field_type($statement, $n);
                $this->tamcols[$n] = oci_field_size($statement, $n);
            }
        }
        return $statement;
    }

    /**
     * Retorna el número de filas o registros de una consulta
     *
     * @author damanzano
     * @since 22/10/10
     *
     * @param int $id_sql Identificador de la consulta.     
     */
    public function numFilas($id_sql) {
        if ($id_sql != 0) {
            return oci_num_rows($id_sql);
        }
        return 0;
    }

    /**
     * Se retornar el n&uacute;mero de filas afectadas de las operaciones: INSERT, DELETE y UPDATE
     *
     * @author damanzano
     * @since 22/10/10
     *
     * @param int $id_sql Identificador de la consulta.
     */
    public function filasAfectadas($id_sql) {
        $numFilasAfectadas = oci_num_rows($id_sql);
        $stringres = '';
        switch (oci_statement_type($statement)) {
            case 'INSERT':
                $stringres = 'Se insertaron ' . $numFilasAfectadas . ' registros';
                break;
            case 'DELETE':
                $stringres = 'Se eliminaron ' . $numFilasAfectadas . ' registros';
                break;
            case 'UPDATE':
                $stringres = 'Se actualizaron ' . $numFilasAfectadas . ' registros';
                break;
            default :
                $stringres = 'Se obtubieron ' . $numFilasAfectadas . ' registros';
        }
        return $numFilasAfectadas;
    }

    /**
     * Busca la siguiente fila (para sentencias SELECT) dentro del statement proporcionado por parametro
     * @autor   damanzano
     * @since   22/10/10
     * 
     * @param int $id_sql Identificador de la consulta.
     * @return La siguiente fila de un set de resultados arrojados por una consulta previamnete ejecutada.
     */
    public function siguienteFila($id_sql) {
        return oci_fetch_array($id_sql, OCI_BOTH);
    }

    /**
     * Devuelve el valor de la columna $campo de la fila actual como una cadena
     *
     * @author  damanzano
     * @since   22/10/10
     *
     * @param int $id_sql Identificador de la consulta.
     * @param mixed $campo Puede ser la posici&oacute;n de la columna (1-Based) o su nombre en mayúsculas
     * @return  $this->dat
     */
    public function dato($id_sql, $campo) {
        return oci_result($id_sql, $campo);
    }

    /**
     * Confirma todas las sentencias pendientes para la conexión con Oracle
     * @author damanzano
     * @since 22/10/10
     */
    public function commit() {
        oci_commit($this->myconn);
    }

    /**
     * Restablece todas las transacciones sin confirmar para la conexión Oracle
     * @author  damanzano
     * @since 22/10/10
     */
    public function rollback() {
        oci_rollback($this->myconn);
    }

    /**
     * Se encarga de liberar la memoria utilizada por una consulta
     *
     * @author damanzano
     * @param int $id_sql Identificador de la consulta.
     */
    public function liberarMemoria ($id_sql)
    {
        oci_free_statement($id_sql);
    }

    /*Getters*/
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getSiddb() {
        return $this->siddb;
    }

    public function getConnstring() {
        return $this->connstring;
    }

    public function getMyconn() {
        return $this->myconn;
    }

    public function getError() {
        return $this->error;
    }

    public function getNumcols() {
        return $this->numcols;
    }

    public function getNomcols() {
        return $this->nomcols;
    }

    public function getTipocols() {
        return $this->tipocols;
    }

    public function getTamcols() {
        return $this->tamcols;
    }

    public function getNumfilas() {
        return $this->numfilas;
    }

    
    //Estas funiones sueron heredades de  la anterior clase de conexion a oracle pero no han sido
    //completamente desarrolladas
    /**
     * @method Esta funcíon le pasas una consulta sql y saca por pantalla una tabla con los resultados,
     * si no le pasas nada, lo hace basandose e nla última consulta realizada.
     * @autor bogomez - Blanca Gómez Muñoz
     * @since 2008-08-19
     * @param $p_sql="ninguna"
     * @return $this->filas
     */
    function ver($p_sql="ninguna") {

        $border = 1;
        $cellspacing = 0;
        $cellpading = 10;

        if ($p_sql != "ninguna") {
            $this->consulta($p_sql);
        }

        for ($x = 1; $x <= $this->numcols; $x++) {
            $this->nomcols[$x];
        }
        echo '<select name="empresa">';

        $n = 0;

        while ($n <= $this->numfilas - 1) {
            for ($x = 1; $x <= $this->numcols; $x++) {
                echo '<option value="$this->nomcols[$x]">' . $this->filas[$this->nomcols[$x]][$n] . '</option>';
            }
            $n++;
        }

        echo'</select>';

        return $this->filas;
    }


    /**
     * @method  devuelve el valor de la columna $campo de la fila actual OCIResult() devolverá todo como una cadena
     * @autor   bogomez - Blanca Gómez Muñoz
     * @since   2008-08-19
     * @param
     * @return  $this->dat
     */
    function ver2($p_sql="ninguna") {
        $border = 1;
        $cellspacing = 0;
        $cellpading = 10;

        if ($p_sql != "ninguna") {
            $this->consulta($p_sql);
        }

        for ($x = 1; $x <= $this->numcols; $x++) {
            $this->nomcols[$x];
        }

        $n = 0;

        while ($n <= $this->numfilas - 1) {
            for ($x = 1; $x <= $this->numcols; $x++) {
                echo "<br>x" . $x . $contenido[$x][$n] = $this->filas[$this->nomcols[$x]][$n];
            }
            $n++;
        }

        return $contenido;
    }
	
	/**
     * Ejecuta un procedimiento almacenado sin parámetros
     * @method ejecutarProcedimiento()
     * @author jdholguin
     * @param string $sql Consulta que contiene el llamado al procedimiento
	 * @return 1 si fue exitoso, 0 si hubo error
     */
    public function ejecutarProcedimiento($sql) {
        $statement = oci_parse($this->myconn, $sql);
        if (!$statement) {
            $e = oci_error($statement);
            $this->error = "Error al procesar la consulta<br>" . htmlentities($e['message']);
            die($this->error);
        }
		
        if(oci_execute($statement)){
			return 1;
		}else{
			return 0;
		}
    }
	
	/**
     * Ejecuta un procedimiento almacenado con parámetros de entrada o salida
     * @method ejecutarProcSencillo()
     * @author jdholguin
     * @param string $sql Consulta que contiene el llamado al procedimiento
	 * @param array $params Arreglo correspondiente a los parámetros (clave => valor)
	 * @param string(1) $type Caracter que especifica si los parámetros son de entrada (I) o salida (O)
	 * @return 1 si fue exitoso, o el arreglo de salida, 0 si hubo error
     */
    public function ejecutarProcSimple($sql, $params, $type) {
        $statement = oci_parse($this->myconn, $sql);
        if (!$statement) {
            $e = oci_error($statement);
            $this->error = "Error al procesar la consulta<br>" . htmlentities($e['message']);
            die($this->error);
        }
		
		foreach ($params as $key => $value){
			oci_bind_by_name($statement,$key,$value);
		}
		
        if(oci_execute($statement)){		
			if($type = 'I'){
				return 1;
			}else{
				return $params;
			}
		}else{
			return 0;
		}
    }
	
	/**
     * Ejecuta un procedimiento almacenado con los parámetros de entrada y salida especificados
     * Esta función asume que los parámetros de entrada están primero y después los de salida
     * @method ejecutarProcIO()
     * @author jdholguin
     * @param string $sql Consulta que contiene el llamado al procedimiento
	 * @param array $input Parámetros de entrada para el procedimiento
	 * @param array $output Parámetros de salida para el procedimiento
	 * @return el arreglo de parámetros de salida (si lo hay) o uno, si fue exitoso, 0 si hubo error
     */
    public function ejecutarProcIO($sql, $input, $output) {
        $statement = oci_parse($this->myconn, $sql);
        if (!$statement) {
            $e = oci_error($statement);
            $this->error = "Error al procesar la consulta<br>" . htmlentities($e['message']);
            die($this->error);
        }
		
		//Bind the input parameter
		foreach ($input as $ikey => $ivalue){
			oci_bind_by_name($statement,$ikey,$ivalue);
		}
		
		//Bind the output parameter
		foreach ($output as $okey => $ovalue){
			oci_bind_by_name($statement,$okey,$ovalue);
		}
		
        if(oci_execute($statement)){
			return $output;
		}else{
			return 0;
		}
    }
}
?>
