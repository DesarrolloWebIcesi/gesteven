<?php
        if (Evento::consultarDetalles('title', $_GET['sched_conf_id']) != null)
        {
          $fecha_fin = Evento::consultarDetalles('endDate', $_GET['sched_conf_id']);
          $fecha_fin_r = explode(" ", $fecha_fin);
          $items_fecha_fin = explode("-", $fecha_fin_r[0]);
          $hoy_num = intval(date("Ymd"));
          $fecha_fin_num = intval($items_fecha_fin[0] . $items_fecha_fin[1] . $items_fecha_fin[2]);

          if ($hoy_num <= $fecha_fin_num)
          {
            ?>
            <h3><?php echo htmlentities(Evento::consultarDetalles('title', $_GET['sched_conf_id'])); ?></h3>
            <h3>Inscripci&oacute;n en l&iacute;nea / <span class="ingles">Online Registration</span></h3>
            <p>Los campos con el siguiente <span class="campo_obligatorio">formato*</span> son obligatorios.</p>
            <p><span class="ingles">Fields in this <span class="campo_obligatorio">format*</span> are mandatory.</span></p>
            <form id="formulario" method="POST" action="">
              <br/>
              <span style="text-align: center; display: block; font-weight: bold;">Informaci&oacute;n del usuario / <span class="ingles">User Information</span></span>
              <br/>
              <table align="center" style="border: 1px dashed gray; background-color: rgb(230, 230, 230);" id="inscripcion">
                <tr>
                  <td class="campo_obligatorio" align="right">
                    Tipo de inscripci&oacute;n*<br/>
										<span class="ingles">Registration Type</span>
                  </td>
                  <td align="left">
                    <?php include_once '../src/listado_tipos_inscripcion_publico.php'; ?>
                  </td>
                </tr>
                <tr>
                  <td class="campo_obligatorio" align="right">
                    Correo electr&oacute;nico*<br/>
										<span class="ingles">Email Address</span>
                  </td>
                  <td align="left">
                    <input type="text" name="email" id="email" size="20" class="formulario"/>
                  </td>
                </tr>
                <tr>
                  <td class="campo_obligatorio" align="right">
                    Usuario / Documento identidad / Código*<br/>
										<span class="ingles">Username / Doc. Id / Code</span>
                  </td>
                  <td align="left">
                    <input type="text" name="usuario" id="usuario" size="20" class="formulario"/>
                  </td>
                </tr>
                <tr>
                  <td class="campo_obligatorio" align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Nombre(s)*<br/>
										<span class="ingles">First Name</span>
                  </td>
                  <td align="left">
                    <input type="text" name="nombre" id="nombre" size="20" class="formulario"/> 
                  </td>
                </tr>
                <tr>
                  <td class="campo_obligatorio" align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Apellidos*<br/>
										<span class="ingles">Last Name</span>
                  </td>
                  <td align="left">
                    <input type="text" name="apellidos" id="apellidos" size="20" class="formulario"/>
                  </td>
                </tr>
                <tr>
                  <td class="campo_obligatorio" align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Tel&eacute;fono/Celular*<br/>
										<span class="ingles">Telephone/Mobile Phone</span>
                  </td>
                  <td align="left">
                    <input type="text" name="telefono" id="telefono" size="20" class="formulario"/>
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> G&eacute;nero<br/>
										<span class="ingles">Gender</span>
                  </td>
                  <td align="left">
                    <select id="genero" name="genero" class="formulario">
                      <option value="N/A">Seleccionar/Choose an option</option>
                      <option value="M">Masculino/Male</option>
                      <option value="F">Femenino/Female</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Direcci&oacute;n<br/>
										<span class="ingles">Address</span>
                  </td>
                  <td align="left">
                    <?php include_once('../src/listado_lugares.php'); ?>
                  </td>
                </tr>
                <tr>
                  <td align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> Organizaci&oacute;n/Universidad/Colegio<br/>
										<span class="ingles">Organization/University/High school</span>
                  </td>
                  <td align="left">
                    <?php include_once('../src/listado_organizaciones.php'); ?>
                  </td>
                </tr>                
                <!-- Listado de campos personalizados-->
                <?php include_once('../src/cargar_campos_personalizados.php');?>
                <!--<tr>
                  <td align="right">
                    <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" class="imagen_espera"/> C&oacute;digo de barras
                  </td>
                  <td align="left">
                    <input type="text" name="codigo_barras" id="codigo_barras" size="20" maxlength="100" class="formulario"/>
                  </td>
                </tr>-->
                <tr>
                  <td align="center" colspan="2">
                    <?php echo recaptcha_get_html($publickey, null, true); ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <input type="submit" value="Enviar" class="boton" id="submit"/>
                    <input type="reset" value="Limpiar" class="boton" id="limpiar"/>
                  </td>
                </tr>
              </table>
              <input type="hidden" value="<?php echo $_GET['sched_conf_id'] ?>" id="sched_conf_id" />
              <input type="hidden" value="C" id="transaccion" />
              <input type="hidden" value="N" id="asignado" />
              <input type="hidden" value=" " id="nombre_usuario" />
              <input type="hidden" value="1" id="publico" />
              <div id="error">
                &nbsp;
              </div>
              <div style="display: block; width: 400px; margin: 0 auto; overflow: hidden;">
                <div id="espera">
                  <img src="../imgs/wait.gif" alt="Cargando" border="0" align="top" /> Por favor espere...
                </div>
              </div>
            </form>
            <?php
          } else
          {
            ?>
            <h3><?php echo htmlentities(Evento::consultarDetalles('title', $_GET['sched_conf_id'])); ?> </h3><br/>
            <div class="advertencia" id="mensaje" style="display: block; width: 400px; margin: 0 auto;">Las inscripciones al evento han terminado.</div><br/><br/>
            <div style="text-align:center;"><a href="http://www.icesi.edu.co/eventos/" alt="Gestión de eventos" title="Gestión de eventos">Volver al sitio web de eventos de la Universidad Icesi</a></div>
          <?php
          }
        } else
        {
          ?>
          <h3><?php echo htmlentities(Evento::consultarDetalles('title', $_GET['sched_conf_id'])); ?> </h3><br/>
          <div class="error" id="mensaje" style="display: block; width: 400px; margin: 0 auto;">El evento solicitado no existe.</div><br/><br/>
          <div style="text-align:center;"><a href="http://www.icesi.edu.co/eventos/" alt="Gestión de eventos" title="Gestión de eventos">Volver al sitio web de eventos de la Universidad Icesi</a></div>
          <?php
        }
        ?>