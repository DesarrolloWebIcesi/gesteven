<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Formularios de Configraci�n de la aplicaci�n.
 * @package gui
 */
/**
 * Manejo de sesi�n
 */
include_once '../src/manejo_sesion.php';
include_once '../class/Evento.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <title>Gesti&oacute;n de eventos - Configuraci&oacute;n - Universidad Icesi - Cali, Colombia</title>
    <meta http-equiv="Content-Type" content="text/html;" />
    <script type="text/javascript" src="../js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/localization/messages_es.js" charset="iso-8859-1"></script>
    <script type="text/JavaScript" src="../js/script_configuracion.js" charset="iso-8859-1"></script>
    <script type="text/JavaScript" src="../js/ajax_confcertificado.js" charset="iso-8859-1"></script>
    <script type="text/JavaScript" src="../js/ajax_conf_roles.js" charset="iso-8859-1"></script>
    <script type="text/JavaScript" src="../js/dialogos.js" charset="iso-8859-1"></script>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css" />
    <link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" />
  </head>
  <body>
    <?php
    $conf_evento = $_SESSION['configuracion'];
    include_once 'dialogos.php';
    ?>
    <div id="wrapper">
      <div><?php include_once('cabezote.php'); ?></div>
      <div id="contenido">
        <?php include_once('navegacion.php'); ?>
        <div id="tabs_configuracion">
          <ul>
            <li><a href="#conf_certificado" title="conf_certificado">Configuraci&oacute;n del certificado</a></li>
            <li><a href="#conf_sistema" title="conf_sistema">Configuraci&oacute;n del sistema</a></li>
            <li><a href="#conf_roles" title="conf_roles">Asignar monitores</a></li>
          </ul>
          <div id="conf_certificado">
            <form id="configform" method="post" enctype="multipart/form-data" action="../src/ControlConfCertificado.php" target="popup9" onsubmit="javascript:window.open('../src/ControlConfCertificado.php','popup9','toolbar=no, scrollbars=no,location=no,status=no,resizable=yes, width=960, height=720,top=0,left=0')">
              <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
              <table align="center" style="border: 1px dashed gray; background-color: #e6e6e6;">
                <tr >
                  <td><span class="campo_obligatorio">Fondo del certificado*</span></td>
                  <td>
                    <p style="display: block;clear: both;text-align: left;">
                      La imagen debe tener las siguientes dimensiones:
                    </p>
                    <p style="display: block;clear: both;text-align: left;">
                      Ancho: 960px
                      Alto: 720px
                    </p>
                    <input type="file" name="ifile" id="ifile" size="35" class="required"/>
                    <?php $max_file_size = 30000; ?>
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"/>
                  </td>
                </tr>
                <tr>
                  <td><span class="campo_obligatorio">Margen superior*</span></td>
                  <td>
                    <p style="display: block;clear: both;text-align: left;">
                      N&uacute;mero de pixeles entre el margen inferior del certificado y el nombre
                      de merecedor.
                      <br/>
                      Debe ser un n&uacute;mero entre 50 y 620
                    </p>
                    <input type="text" name="margencert" id="margencert" class="required number" value="<?php echo $conf_evento['margen'] ?>"/>
                  </td>
                </tr>
                <tr>
                  <td><span class="campo_obligatorio">Mensaje del certificado*</span></td>
                  <td>
                    <p style="display: block;clear: both;text-align: left;">
                      Se utiliza como mensaje en el correo electr&oacute;nico <br/>
                      en el que se envia el certificado.
                    </p>
                    <textarea rows="6" cols="41" name="message" id="message" class="required"><?php echo $conf_evento['mensaje']; ?></textarea>
                  </td>
                </tr>
				
				<!-- jdholguin se incluye un check para habilitar el incluir el username (cuando es c�dula) en el certificado-->
				<tr>
                  <td><span class="campo_obligatorio">Incluir el nombre de usuario (si es la identificaci�n)</span></td>
                  <td>
					<input type="checkbox" name="includeid" id="includeid" value='1' <?php if($conf_evento['incluir_id'] == '1') { echo "checked"; } ?>/>
                  </td>
                </tr>				
				<!-- fin jdholguin -->
				
                <tr>
                  <td></td>
                  <td>
                    <input type="hidden" name="sched_conf_id" value="<?php echo $_GET['sched_conf_id'] ?>"/>
                    <input type="submit" value="Guardar"/>
                  </td>
                </tr>
              </table>
            </form>            
            <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
              <div id="espera">
                <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" /> Por favor espere...
              </div>
            </div>
          </div>
          <div id="conf_sistema">
            <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
            <form id="configsisform" method="post"  action="../src/ControlConfSistema.php">
              <table align="center" style="border: 1px dashed gray; background-color: #e6e6e6;">
                <tr >
                  <td valign="top" ><span class="campo_obligatorio">Lapso de tiempo para listar las ponencias*</span></td>
                  <td>
                    <p>
                      Umbral de tiempo para listar la ponencia en el registro de asistencia
                    </p>
                    <input type="text" name="lapsopaper" id="lapsopaper" class="required number" value="<?php echo $conf_evento['lpaper'] ?>"/>
                  </td>
                </tr>
                <tr>
                  <td valign="top" ><span class="campo_obligatorio">Forma de determinar los merecedores de certificado*</span></td>
                  <td>
                    <select name="fcmc" id="fcmc" class="required">
                        <option value="porc"  <?php
                            if ($conf_evento['fcmc']=='porc'){echo 'selected';}?>>
                            Por n&uacute;mero de horas asistidas
                        </option>
                        <option value="npres" <?php
                            if ($conf_evento['fcmc']=='npres'){echo 'selected';}?>>Por n&uacute;mero de ponencias</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td valign="top" ><span>N&uacute;mero de horas para merecimiento de certificado</span></td>
                  <td>
                    <input name="porc_asistencia" id="porc_asistencia" type="text" class="number" value="<?php echo $conf_evento['pasistencia'] ?>" <?php if (($conf_evento['fcmc']=='npres')){?>disabled<?php } ?>/>
                  </td>
                </tr>
                <tr>
                  <td valign="top" ><span>N&uacute;mero de ponencias para merecimiento de certificado</span></td>
                  <td>
                      <input name="n_presentaciones" id="n_presentaciones" type="text" class="number" value="<?php echo $conf_evento['npapers'] ?>" <?php if (($conf_evento['fcmc']=='porc') || ($conf_evento['fcmc']=='')){?>disabled<?php } ?>/>
                  </td>
                </tr>
                <tr >
                  <td valign="top" ><span>Listado de lugares para inscripci&oacute;n</span></td>
                  <td>
                    <p>
                      Listado de lugares separados por barra "|" que ser�n listados en el formulario de inscripci&oacute;n.
                    </p>
                    <input type="text" name="listado_lugares" id="listado_lugares" value="<?php echo $conf_evento['listado_lugares'] ?>" style="width:600px;"/>
                  </td>
                </tr>
                <tr >
                  <td valign="top" ><span>Listado de organizaciones/universidades para inscripci&oacute;n</span></td>
                  <td>
                    <p>
                      Listado separado por barra "|" que ser� mostrado en el formulario de inscripci&oacute;n.
                    </p>
                    <input type="text" name="listado_organizaciones" id="listado_organizaciones" value="<?php echo $conf_evento['listado_organizaciones'] ?>" style="width:600px;"/>
                  </td>
                </tr>
                <tr >
                  <td valign="top" ><span>Campos personalizados</span></td>
                  <td>
                    <p>
                      Se pueden agregar hasta 5 campos personalizados al formulario de inscripci&oacute;n, por favor especifique las etiquetas y valores de dichos campos.
                    </p>
                    <table>
                      <tr>
                      <td></td> <td>T&iacute;tulo</td> <td>Valores</td>
                      </tr>
                      <tr>
                      <td>Campo 1</td> <td><input type="text" name="campo_personalizado_1" id="campo_personalizado_1" value="<?php echo $conf_evento['campo_personalizado_1'] ?>"/></td> <td><input type="text" name="valor_campo_personalizado_1" id="valor_campo_personalizado_1" value="<?php echo $conf_evento['valor_campo_personalizado_1'] ?>" style="width:380px"/></td>
                      </tr>
                      <tr>
                      <td>Campo 2</td> <td><input type="text" name="campo_personalizado_2" id="campo_personalizado_2" value="<?php echo $conf_evento['campo_personalizado_2'] ?>"/></td> <td><input type="text" name="valor_campo_personalizado_2" id="valor_campo_personalizado_2" value="<?php echo $conf_evento['valor_campo_personalizado_2'] ?>" style="width:380px"/></td>
                      </tr>
                      <tr>
                      <td>Campo 3</td> <td><input type="text" name="campo_personalizado_3" id="campo_personalizado_3" value="<?php echo $conf_evento['campo_personalizado_3'] ?>"/></td> <td><input type="text" name="valor_campo_personalizado_3" id="valor_campo_personalizado_3" value="<?php echo $conf_evento['valor_campo_personalizado_3'] ?>" style="width:380px"/></td>
                      </tr>
                      <tr>
                      <td>Campo 4</td> <td><input type="text" name="campo_personalizado_4" id="campo_personalizado_4" value="<?php echo $conf_evento['campo_personalizado_4'] ?>"/></td> <td><input type="text" name="valor_campo_personalizado_4" id="valor_campo_personalizado_4" value="<?php echo $conf_evento['valor_campo_personalizado_4'] ?>" style="width:380px"/></td>
                      </tr>
                      <tr>                   
                      <td>Campo 5</td> <td><input type="text" name="campo_personalizado_5" id="campo_personalizado_5" value="<?php echo $conf_evento['campo_personalizado_5'] ?>"/></td> <td><input type="text" name="valor_campo_personalizado_5" id="valor_campo_personalizado_5" value="<?php echo $conf_evento['valor_campo_personalizado_5'] ?>" style="width:380px"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" value="Guardar"/>
                  </td>
                </tr>
              </table>
            </form>
          </div>
          <div id="conf_roles">
            <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
            <table align="center" id="inscripcion">
              <tr>
                <td align="right">
                  <span class="campo_obligatorio">Nombre de usuario*</span>
                </td>
                <td align="left">
                  <input type="text" name="usuario" id="usuario" size="20" />
                </td>
                <!-- consultar monitores lmrivera-->
                <td colspan="2" align="center">
                  <button onclick="consultarUsuario()">Consultar</button>
                </td>
              </tr>
            </table>
            <form id="formulario" method="POST" action="">
              <table align="center" style="border: 1px dashed gray; background-color: rgb(230, 230, 230);" id="inscripcion">
                <tr>
                  <td align="right" width="50%" class="campo_obligatorio">
                    Nombre
                  </td>
                  <td align="left">
                    <span id="nombre">&nbsp;</span>
                  </td>
                </tr>
                <tr>
                  <td class="texto" align="right" class="campo_obligatorio">
                    Segundo nombre
                  </td>
                  <td align="left">
                    <span id="segundo_nombre">&nbsp;</span>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="campo_obligatorio">
                    Apellidos
                  </td>
                  <td align="left">
                    <span id="apellidos">&nbsp;</span>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="campo_obligatorio">
                    Correo electr&oacute;nico
                  </td>
                  <td align="left">
                    <span id="email">&nbsp;</span>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="campo_obligatorio">
                    Tel&eacute;fono
                  </td>
                  <td align="left">
                    <span id="telefono">&nbsp;</span>
                  </td>
                </tr>
                <tr>
                  <td align="right" class="campo_obligatorio">
                    Rol actual
                  </td>
                  <td align="left">
                    <span id="rol">&nbsp;</span>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <input type="submit" value="Enviar" class="boton" id="submit"/>
                  </td>
                </tr>
              </table>
              <input type="hidden" value="<?php echo $_SESSION['sched_conf_id'] ?>" id="sched_conf_id" />
              <input type="hidden" value=" " id="user_id" />
              <input type="hidden" value=" " id="nombre_usuario" />
              <div id="error">
                &nbsp;
              </div>
            </form>
          </div>
        </div>
      </div>
      <div><?php include_once('footer.php'); ?></div>
    </div>
    <pre><?php print_r($_SESSION['otro']); ?></pre>
  </body>
</html>
