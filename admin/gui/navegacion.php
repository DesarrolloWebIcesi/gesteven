<?php
/**
 * HTML requerido para el despliegue del men� de navegaci�n.
 * @package gui
 */

 echo "<h2>".htmlentities(Evento::consultarDetalles('title', $_SESSION['sched_conf_id']))."</h2>";
 ?>
<div class="navegacion">
    <script type="text/javascript" src="../js/menu.js" language="javascript"></script>
    <ul id="menu">
        <!-- OPCIONES GENERALES DEL SITIO-->
        <li class="node"><a>Sitio</a>
            <ul class="subnav">
                <li>
                    <a href="panel_evento.php" class="icon-16-cpanel">Inicio</a>
                </li>
                <li>
                    <a href="../src/ControlInicio.php" class="icon-16-cpanel">Seleccionar otro evento</a>
                </li>
                <!--<li class="separator" ><span></span></li>-->
                <li class="">
                    <a href="../src/salir.php" class="icon-16-logout">Cerrar sesi&oacute;n</a>
                </li>                
            </ul>
        </li>
        
        <!-- OPCIONES DE REGISTRO DE ASISITENCIA-->
        <li class="node">
            <a>Registro Asistencia</a>
            <ul class="subnav">
                <li>
                    <a href="registro_entrada.php" class="icon-16-category">Entrada</a>
                </li>
                <li>
                    <a href="registro_salida.php" class="icon-16-content">Salida</a>
                </li>
                <li>
                    <a href="registro_masivo.php" class="icon-16-content">Masivos</a>
                </li>
            </ul>
        </li>

        <!-- OPCIONES DE REPORTES -->
        <li class="node">
            <a>Reportes</a>
            <ul class="subnav">
                <li>
                    <a href="../src/ControlPreinscritos.php" >Preinscritos</a>
                </li>
                <li>
                    <a href="../src/ControlInscritos.php" >Inscritos</a>
                </li>
                <li>
                    <a href="../src/ControlAsisConferencia.php" >Asistentes al evento</a>
                </li>
                <li>
                    <a href="reporte_asistentespon.php" >Asistentes por ponencia</a>
                </li>
                  <li>
                    <a href="../src/ControlReportePonencias.php" >Asistentes totales</a>
                </li>
                <li>
                    <a href="../src/ControlMerecedores.php" >Merecedores de certificado</a>
                </li>
            </ul>
        </li>

        <!-- OPCIONES DE VERIFICACI�N DE DATOS -->
        <li class="node">
            <a href="inscripcion_nuevo.php">Inscripci&oacute;n</a>
            <!--<ul class="subnav">
                <li>
                  <a href="inscripcion.php">Usuarios preinscritos</a>
                </li>
                <li>
                    <a href="inscripcion_nuevo.php">Usuarios nuevos</a>
                </li>
            </ul>-->
        </li>
        <!-- OPCIONES DE INSCRIPCI�N -->
        
        <?php
        //echo $_SESSION['usuario'].'-';
        //echo $_SESSION['sadmin'].'-';
        if (!empty($_SESSION['role_id'])) {
            //echo '-'.$_SESSION['sadmin'].'-entro-';
            if ($_SESSION['role_id'] <= 64) {
        ?>
                <!-- OPCIONES CONFIGURACI�N -->
                <li class="node">
                    <a>Configuraci&oacute;n</a>
                    <ul class="subnav" >
                        <li>
                            <a href="../src/ControlCargarConfiguracion.php?tab=conf_certificado" class="icon-16-archive">Certificado</a>
                        </li>
                        <li>
                            <a href="../src/ControlCargarConfiguracion.php?tab=conf_sistema" class="icon-16-module">Sistema</a>
                        </li>
                        <li>
                            <a href="configuracion.php#conf_roles" class="icon-16-module">Asiganci&oacute;n de monitores</a>
                        </li>
                        <li>
                            <a target="_blank" href="../src/ControlPreviewCertificado.php" class="icon-16-archive">Vista previa</a>
                        </li>
                    </ul>
                </li>

                <!-- ENV�O DE CERTIFICADOS-->
                <li class="node">
                    <a href="../src/ControlEnviarCertificado.php">Enviar certificados</a>
                </li>
        <?php
            }
        }
        ?>
        <li class="node">
            <a href="http://www.icesi.edu.co/manuales/manual_ocs_asistencia.pdf">Ayuda</a>
        </li>
    </ul>
</div>
