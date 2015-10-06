<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
* Carga masiva de usuarios en un evento.
* @package gui
*/
/**
* Manejo de sesión
*/
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
include_once '../Configuracion.php';
extract($_POST);
$tipo="";
$Asignado = "";
//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 

$archivo = $_FILES['excel']['name'];
$tipo = $_FILES['excel']['type'];
$destino = "bak_".$archivo;
if (copy($_FILES['excel']['tmp_name'],$destino)) echo "Archivo Cargado Con Éxito";
else echo "Error Al Cargar el Archivo";

////////////////////////////////////////////////////////

if (file_exists ("bak_".$archivo)){ 
	require_once('../lib/excelamysql/Classes/PHPExcel.php');
	require_once('../lib/excelamysql/Classes/PHPExcel/Reader/Excel2007.php');

	//Purga de datos - OCS Mercadeo
	/*if(Configuracion::$instancia == "mercadeo"){
		//$purga = "delete from codigos_barras; delete from registrations; delete from users where username not IN ('cmalfatt', 'josem', 'slivovitz', 'lmescobar', 'pruiz', 'josemgadban', 'bhmelo', 'jjssepulveda', 'idsanchez', 'jquinchia', 'jabetancourt', 'jrsanabria') or username not IN (SELECT u.username FROM users u, roles r WHERE u.user_id = r.user_id AND r.role_id <=1)"
		//$resultado = mysql_query ($purga);
	}*/
  
	// Cargando la hoja de cálculo
	$objReader = new PHPExcel_Reader_Excel2007();
	$objPHPExcel = $objReader->load("bak_".$archivo);
	$objFecha = new PHPExcel_Shared_Date();       

	// Asignar hoja de excel activa
	$objPHPExcel->setActiveSheetIndex(0);

	// Llenamos el arreglo con los datos  del archivo xlsx
	$fin_archivo = false;
	try{
		for ($i=2;!$fin_archivo;$i++){
			$_DATOS_EXCEL[$i]['username'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
			$_DATOS_EXCEL[$i]['password'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
			$_DATOS_EXCEL[$i]['codigo_barras'] = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
			$_DATOS_EXCEL[$i]['first_name']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getValue();
			$_DATOS_EXCEL[$i]['last_name']= $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getValue();
			$_DATOS_EXCEL[$i]['affiliation'] = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getValue();
			$_DATOS_EXCEL[$i]['email'] = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getValue();
			$_DATOS_EXCEL[$i]['phone'] = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getValue();
			$_DATOS_EXCEL[$i]['mailing_address'] = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getValue();
			$_DATOS_EXCEL[$i]['gender'] = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getValue();
			//Condición de parada
			if($_DATOS_EXCEL[$i]['username'] == '' &&
				$_DATOS_EXCEL[$i]['password'] == '' &&
				$_DATOS_EXCEL[$i]['codigo_barras'] == '' &&
				$_DATOS_EXCEL[$i]['first_name'] == '' &&
				$_DATOS_EXCEL[$i]['last_name'] == '' &&
				$_DATOS_EXCEL[$i]['affiliation'] == '' &&
				$_DATOS_EXCEL[$i]['email'] == '' &&
				$_DATOS_EXCEL[$i]['phone'] == '' &&
				$_DATOS_EXCEL[$i]['mailing_address'] == '' &&
				$_DATOS_EXCEL[$i]['gender'] == ''){
				unset($_DATOS_EXCEL[$i]);
				$fin_archivo = true;
			}
		}
	}catch(Exception $e){
		echo $e->getMessage();
	}
}else{echo "Necesitas primero importar el archivo";}
$errores=0;
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD

//Consultar inscrito; transacción I, transacción A, transacción C
//Revisa la asignación del código de barras; Asignado S, Asignado N
$Evento= Evento::consultarDetalles('title', $_SESSION['sched_conf_id']);
$date = new DateTime();
$ruta_archivo = "../logs/$Evento [".$_SESSION['sched_conf_id']."] - ".date_format($date, 'Y-m-d').".txt";
$file = fopen($ruta_archivo, "a");

foreach($_DATOS_EXCEL as $item ){
  $Asignado = "S";
	$usuario= $item{'username'};
	$evento= $_SESSION['sched_conf_id'];
	$transaccion= Evento::consultarInscrito($evento,$usuario);
	
	if (!empty($transaccion))
	{
	  $tipotransaccion= "I";
	 
	}else{  	
	   $transaccion = Evento::consultarUsuario($evento, $usuario);
	   if (!empty($transaccion)){
		 $tipotransaccion= "A";
      
	   }else{
		 $tipotransaccion= "C";
	   }  
  	}

  	if($item['codigo_barras'] != null && $item['codigo_barras'] != ''){
        $Asignado = "N";
      }

  	$TipoInscripcion= $_POST['tipo_inscripcion'];
  	$Nombre= $item{'first_name'};
  	$Apellidos= $item{'last_name'};
  	$Email= $item{'email'};
  	$Telefono= $item{'phone'};
  	$CodigoBarras= $item{'codigo_barras'};
  	$idconf= $_SESSION['sched_conf_id'];
  	$Usuario= $item{'username'};
  	$Lugar= $item{'mailing_address'};
  	$Organizacion= $item{'affiliation'};
  	$Genero= $item{'gender'};

   	$respuesta= Evento::crearInscrito($TipoInscripcion, $Nombre, $Apellidos, $Email, $Telefono, $CodigoBarras, $idconf, $Usuario, $tipotransaccion, $Asignado, ";;;;", $Lugar, $Organizacion, $Genero);
   
   	if ($respuesta["error"]== 1)
   	{
   	   $errores++;
   	   $mensaje= $respuesta["msg"];
   	   $file = fopen($ruta_archivo, "a");
   	   $linea_log = "[".date_format($date, 'H:i:s')."] ".$Nombre . " " . $Apellidos . " - " . $Usuario . " - " . $Email . " - Tipo de error: " . $respuesta["msg"];
   	   fwrite($file, $linea_log . "\r\n");
   	   fclose($file);
   	   $logs[]=htmlentities($linea_log);
   	}
}

/////////////////////////////////////////////////////////////////////////

//una vez terminado el proceso borramos el 
//archivo que esta en el servidor el bak_
unlink($destino);

$_SESSION['logs'] = $logs;
$host  = $_SERVER['HTTP_HOST'];
$uri   = str_replace("src","gui",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
$uri_log = str_replace("src","logs",rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
$extra = 'carga_masiva_usuarios.php?logs='.$errores;
$_SESSION['ruta_log'] = "http://$host$uri_log/$Evento [".$_SESSION['sched_conf_id']."] - ".date_format($date, 'Y-m-d').".txt";
header("Location: http://$host$uri/$extra");
?>