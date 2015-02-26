<?php
/**
 * Este archivo se encarga de cargar en la sessión el listado de los asistentes a
 * la conferencia identidicada con el código recibido en la variable $_SESSION['sched_conf_id']
 * 
 * @author David Andrés Manzano - damanzano
 * @since 15/02/11
 * @package src
 *
 */

/**
 * Libreria de manejo de errores de MySQL
 */
error_reporting(E_ALL);
require_once("../lib/ErrorManager.class.php");
/**
 * Control de acceso a la informacion de reportes
 */
include_once('ControlReportes.php');

session_start();
$id_evento = $_SESSION['sched_conf_id'];
$mensaje = $_POST['message'];
$margen = $_POST['margencert'];

//carpeta para subir los archivos
$ruta_destino = "../certificados/";

//nombre del input en el que se carga la imagen
$fieldname = 'ifile';

// Lidiar con la subida
// Posibles errores en la subida
$errors = array(1 => 'Execido el tamaño máximo de subida establecido en php.ini',
    2 => 'Execido el tamaño máximo de subida establecido en el formulario',
    3 => 'Se ha interrumpido el proceso de subida',
    4 => 'No se adjunto ningún archivo');

// verificamos que no hayan errores en la subida
if ($_FILES[$fieldname]['error'] != 0) {
    echo $errors[$_FILES[$fieldname]['error']];
} else {
    // verifica se se realizó la subuda a través de http
    //@is_uploaded_file($_FILES[$fieldname]['tmp_name'])
    //or error('not an HTTP upload', $uploadForm);
    if (!is_uploaded_file($_FILES[$fieldname]['tmp_name'])) {
        echo 'No hubo una carga HTTP';
    } else {
        // Verificar que el archivo subido sea una imagen.
        // Here is a simple check:
        // getimagesize() returns false if the file tested is not an image.
        //@getimagesize($_FILES[$fieldname]['tmp_name'])
        //or error('only image uploads are allowed', $uploadForm);
        if (!getimagesize($_FILES[$fieldname]['tmp_name'])) {
            //or error('only image uploads are allowed', $uploadForm);
            echo 'Solo se permite la carga de im&aacute;genes';
        } else {
            //se verifican las dimensiones de la imagen;
            $iattrs = getimagesize($_FILES[$fieldname]['tmp_name']);

            //obtengo el ancho
            $iancho = $iattrs[0];

            //obtengo el alto
            $ialto = $iattrs[1];

            if ($iancho != 960 || $ialto != 720) {
                echo "las dimensiones de la imagen no se ajustan a la hoja";
            } else {
                //la imagen cumple con las condiciones y se procede a hacer el registro
                // se construye un nombre unico para la imagen
                // taken... if it is already taken keep trying until we find a vacant one
                // sample filename: 1140732936-filename.jpg
                $now = time();
                //$image_name = $now . '-' . $_FILES[$fieldname]['name'];
                $image_name = $id_evento;
                $ext = substr($_FILES[$fieldname]['name'], strrpos($_FILES[$fieldname]['name'], '.') + 1);
                $uploadFilename = $ruta_destino . $id_evento .".". $ext;
                //$uploadFilename = $ruta_destino . $now . '-' . $_FILES[$fieldname]['name'];
                /*if (file_exists($uploadFilename)) {
                    unlink($uploadFilename);
                }*/

                // Se guarda la imagen en el servidor
                //@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename)
                //or error('receiving directory insuffiecient permission', $uploadForm);
                // now let's move the file to its final location and allocate the new filename to it
                if (!move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename)) {
                    //or error('receiving directory insuffiecient permission', $uploadForm);
                    echo 'No se tienen permisos de escritura sobre la carpeta';
                } else {
                    // Si ha llegado hasta aqui todo ha ido bien, a continuación se hace el registro
                    // en la base de datos.
                    // Do the database registration
                    $image_dir = substr($uploadFilename, 3);
                    //$image_blob = chunk_split(base64_encode(file_get_contents($uploadFilename)));
					//jdholguin - se incluye la variable $include_id para que tenga en cuenta si debe incluir o no la identificación en el certificado
					if($_POST['includeid']==1)
						$incluir_id = '1';
					else
						$incluir_id = '0';
					//fin jdholguin
                    ControlReportes::configurar_certificado($id_evento, $image_dir, $mensaje, $margen, $incluir_id);
                    header('Location: ControlPreviewCertificado.php');
                }
            }
        }
    }
}

?>
