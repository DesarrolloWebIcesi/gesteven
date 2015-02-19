/**
 * Created on : 09-dic-2014, 17:06:16
 * @author David Andrés Manzano Herrera <damanzano>
 * 
 * Módulo encargado de las operaciones necesarias para la inscripción de un usuario
 * en el sistema de gestión de eventos, desde el formulario de inscripción público
 */
jQuery.validator.addMethod("evaluate", function (value, element, param) {
    return value.match(new RegExp("^" + param + "$"));
});

$(document).ready(function () {
    if(actualizacion){
        //Obtener los parametros enviados desde el enlace
        var token = $('#token').val();
        var username = $('#formulario input[name=usuario]').val();
        var correoUsuario = $('#formulario input[name=email]').val();
        var idEvento= $('#sched_conf_id').val();
        verificarToken(username, correoUsuario, idEvento, token);
    }
    
    $('#verificacion-email').validate({
        rules: {
            email: {
                required: true,
                email: true,
                minlength: 6
            }
        },
        submitHandler: function (form) {
            var correoUsuario = $('#verificacion-email input[name=email]').val();
            var idEvento= $('#verificacion-email input[name=sched_conf_id]').val();
            consultarUsuario(correoUsuario, idEvento);
        }
    });
    
    $('#formulario').validate({
        submitHandler: function (form) {
            var aceptaPolitica = $('#chkAcepta').attr("checked");
            var formulario = {email: $("#email").val(),
                nombre: $("#nombre").val(),
                apellidos: $("#apellidos").val(),
                telefono: $("#telefono").val(),
                username: $("#usuario").val(),
                codigo_barras: $("#codigo_barras").val(),
                sched_conf_id: $("#sched_conf_id").val(),
                transaccion: $("#transaccion").val(),
                tipo_inscripcion: $("#tipo_inscripcion").val(),
                asignado: $("#asignado").val(),
                lugar: $("#lugar").val(),
                organizacion: $("#organizacion").val(),
                genero: $("#genero").val(),
                campo_personalizado_1: $("#campo_personalizado_1").val(),
                campo_personalizado_2: $("#campo_personalizado_2").val(),
                campo_personalizado_3: $("#campo_personalizado_3").val(),
                campo_personalizado_4: $("#campo_personalizado_4").val(),
                campo_personalizado_5: $("#campo_personalizado_5").val(),
                publico: $("#publico").val(),
                recaptcha_response_field: $("#recaptcha_response_field").val(),
                recaptcha_challenge_field: $("#recaptcha_challenge_field").val()
            }
            if(aceptaPolitica){
                registrarUsuario(formulario);
            }else{
                mensaje = "Debe aceptar la política de tratamiento de datos para poder registrase.";
                desplegarDialogo(mensaje, 'Mensaje', 300, 110, 5);
            }
            
        },
        focusInvalid: true,
        rules: {
            nombre: {
                required: true,
                evaluate: "[a-zA-Zñ á-úÁ-ÚÑüÜ.]{1,}"
            },
            usuario: {
                required: true,
                evaluate: "[a-zA-Z0-9-_.]{1,}"
            },
            apellidos: {
                required: true,
                evaluate: "[a-zA-Zñ á-úÁ-ÚÑüÜ.]{1,}"
            },
            telefono: {
                required: true
            },
            email: {
                required: true,
                email: true,
                minlength: 6
            }
        },
        messages: {
            nombre: {
                evaluate: "Sólo se admiten letras en este campo"
            },
            apellidos: {
                evaluate: "Sólo se admiten letras en este campo"
            },
            usuario: {
                evaluate: "Sólo se admiten letras sin tilde, números, guion (-) y guion bajo (_)"
            }
        }
    });
});

/***
 * Esta función se encarga de verificar y mostrar cuales son las opciones que 
 * tiene un usuario respecto a su inscripción en un evento o en el sistema
 * Si el usuario no se encuentra registrado en el sistema, se muestra el
 * formulario de registro al sistema e inscripción al evento.
 * Si el usuario esta registrado en el evento pero no se eceuntra inscrito, se
 * muestran las opciones de solo inscripción o de inscripción y actualización de
 * sus datos
 * @param {string} correoUsuario El correo que fue consultado.
 * @param {string} idEvento Identificador del evento.
 * @param {json} respuestaServidor Los datos del usuario que se desea procesar enviados por el servidor
 */
function procesarDatosConsulta(correoUsuario, idEvento, respuestaServidor){
    // Verificar si hay errores en la respuesta
    if(respuestaServidor.error==0){
        // verificar si el usuario esta inscrito al evento o solo registrado
        if(respuestaServidor.transaccion=="I"){
            // El usuario ya esta inscrito en el evento seleccionado
            $('#espera').hide(500);
            mensaje = "El correo electrónico "+correoUsuario+" ya se encuentra inscrito en este evento"+
                    "Desea actualizar sus datos?";
            
            confirmacionActDatos(mensaje, 'Información', 500, 110, respuestaServidor, idEvento);
            
        }else{
            // El usuario ya esta registrado pero no inscrito en el evento seleccionado
            $('#espera').hide(500);
            mensaje = "El correo electrónico "+correoUsuario+" ya se encuentra registrado en nuestro sistema en otro evento."+
                    "Por favor confirme su deseo de inscribirse en este evento";
            confirmacionActDatos(mensaje, 'Información', 500, 110,  respuestaServidor, idEvento);
        }
        
    }else{
        /*
         * El usuario no esta registrado y se debe mostrar el formulario de 
         * registro.
         */ 
        mostrarFormularioRegistro(correoUsuario);
    }
}

/***
 * Esta función llena el formulario de actualización de datos con los datos 
 * registrados previamente por el usuario. 
 * sus datos.
 * @param {string} correoUsuario El correo que fue consultado.
 * @param {json} data Los datos del usuario que se desea procesar enviados por el servidor
 */
function procesarDatosAct(correoUsuario, idEvento, data){
    // Verificar si hay errores en la respuesta
    if(data.error==0){
        $('#registro-actualizacion-datos').show();
        if (data.middle_name != null) {
            $("#nombre").val(trim(data.first_name + " " + data.middle_name));
        } else {
            $("#nombre").val(trim(data.first_name));
        }
        $("#apellidos").val(data.last_name);
        $("#telefono").val(data.phone);
        $("#usuario").val(data.username);
        $("#email").val(data.email);
        
        $("#codigo_barras").val(data.codigo_barras);
        $("#transaccion").val(data.transaccion);
        $("#lugar").val(data.mailing_address);
        $("#genero").val(data.gender);
        $("#organizacion").val(data.affiliation);
        $("#campo_personalizado_1").val(data.campo_personalizado_1);
        $("#campo_personalizado_2").val(data.campo_personalizado_2);
        $("#campo_personalizado_3").val(data.campo_personalizado_3);
        $("#campo_personalizado_4").val(data.campo_personalizado_4);
        $("#campo_personalizado_5").val(data.campo_personalizado_5);
        if (data.transaccion == "A" || data.transaccion == "I") {
            $("#usuario").attr('disabled', true);
        } 
        if (data.codigo_barras != null && data.codigo_barras != "") {
            $("#asignado").val("S");
        } else {
            $("#asignado").val("N");
        }
        $('#formulario').validate();
        $('#nombre').focus();
        
        
    }
    
}

/***
 * Esta función se encarga de verificar si un usuario que desea actulizar sus datos
 * esta usando un token válido.
 * Si el token es válido se carga el formulario de actulización con los datos
 * previamente registrados.
 * Si el token no es válido se le indica al usario que no es posible actualizar
 * sus datos.
 * @param {string} correoUsuario El correo que fue consultado.
 * @param {json} respuestaServidor Los datos del usuario que se desea procesar enviados por el servidor
 */
function procesarDatosConsultaToken(correoUsuario, idEvento, respuestaServidor){
    // Verificar si hay errores en la respuesta
    if(respuestaServidor.error==0){
        // El token es válido, conusltar los datos del usuario
        consultarUsuario(correoUsuario, idEvento);
    }else{
        // El token es invalido o hubo problemas en la conuslta
        mensaje = "El enlace al que está intentando acceder es inválido o ya ha caducado";
        console.log("ERROR - "+mensaje);
        desplegarDialogo(mensaje, 'Error', 300, 110, 3);
    }
}

/***
 * Este método procesa la respuesta del servidor ante una acción de registro y 
 * realiza las opeariones de interfaz gráfica necesarias
 * @param {json} formulario Datos de la solicitud enviada al servidor.
 * @param {json} respuestaServidor Los datos del usuario que se desea procesar enviados por el servidor
 */
function procesarDatosRegistro(formulario, respuestaServidor){
    $('#espera').hide(500);
    if (respuestaServidor.error == 0) {
        desplegarDialogo(respuestaServidor.msg, 'Informaci&oacute;n', 300, 110, 1);
        $('#formulario').each(function () {
            this.reset();
        });
        $("#transaccion").val("C");
        $("#asignado").val("N");
        $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
        if ($("#publico").val() == 1) {
            Recaptcha.reload();
        }
    } else {
        if (respuestaServidor.detalles_error != null) {
            desplegarDialogo(respuestaServidor.msg + "<br/> Detalle: " + respuestaServidor.detalles_error, 'Error', 300, 110, 3);
        } else {
            desplegarDialogo(respuestaServidor.msg, 'Error', 300, 110, 3);
        }
        if ($("#publico").val() == 1) {
            Recaptcha.reload();
        }
    }
}

/***
 * Esta función se encarga de hacer un llamado al servidor para verificar si un
 * token utilizado por un usuario es válido.
 * @param {string} username username del usuario que desea usar el token
 * @param {string} correoUsuario Correo del usuario
 * @param {string} idEvento Identificador del evento
 * @param {string} token token a verificar
 */
function verificarToken(username, correoUsuario, idEvento, token){
    $.ajax({
        type: 'POST',
        url: '../src/ControlRegistroToken.php',
        dataType: 'json',
        data:{
            username: username,
            email:correoUsuario,
            sched_conf_id:idEvento,
            token:token,
            action:1
        },
        success: function (data){
            procesarDatosConsultaToken(correoUsuario, idEvento, data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
            console.log("ERROR - "+mensaje);
            desplegarDialogo(mensaje, 'Error', 300, 110, 3);
        }
    });
}

/***
 * Esta función se encarga de hacer un llamado al servidor para consultar los
 * datos de un usuario en un evento.
 * @param {string} correoUsuario Correo del usuario que se desea consultar
 * @param {string} idEvento Identificador del evento
 * @returns {json} Un objeto json con la respuesta del servidor
 */
function consultarUsuario(correoUsuario, idEvento){
    var url_consulta = '../src/consultar_inscrito_correo.php';
    var userData;
    $.ajax({
        type: 'POST',
        url: url_consulta,
        dataType: 'json',
        data:{
            user_id:correoUsuario,
            sched_conf_id:idEvento,
            version:2
        },
        success: function (data){
            if(actualizacion){
                procesarDatosAct(correoUsuario, idEvento, data);
            }else{
                procesarDatosConsulta(correoUsuario,idEvento, data);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
            console.log("ERROR - "+mensaje);
            desplegarDialogo(mensaje, 'Error', 300, 110, 3);
        }
    });
}

/***
 * Esta función se encarga de hacer un llamado al servidor para crear un registro
 * de usuario nuevo en la base de datos.
 * @param {json} formulario Un objeto con todos los datos de la solicitud a realizar 
 * @returns {json} Un objeto json con la respuesta del servidor
 */
function registrarUsuario(formulario){
    $.ajax({
        type: 'POST',
        url:'../src/crear_inscrito.php',
        dataType:'json',
        data: {
                email: formulario.email,
                nombre: formulario.nombre,
                apellidos: formulario.apellidos,
                telefono: formulario.telefono,
                username: formulario.username,
                codigo_barras: formulario.codigo_barras,
                sched_conf_id: formulario.sched_conf_id,
                transaccion: formulario.transaccion,
                tipo_inscripcion: formulario.tipo_inscripcion,
                asignado: formulario.asignado,
                lugar: formulario.lugar,
                organizacion: formulario.organizacion,
                genero: formulario.genero,
                campo_personalizado_1: formulario.campo_personalizado_1,
                campo_personalizado_2: formulario.campo_personalizado_2,
                campo_personalizado_3: formulario.campo_personalizado_3,
                campo_personalizado_4: formulario.campo_personalizado_4,
                campo_personalizado_5: formulario.campo_personalizado_5,
                publico: formulario.publico,
                recaptcha_response_field: formulario.recaptcha_response_field,
                recaptcha_challenge_field: formulario.recaptcha_challenge_field
            },
            success: function (data) {
                procesarDatosRegistro(formulario, data);
                if (data.error==0){
                    registrarAceptacionPDP(formulario);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('#espera').hide(500);
                mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
                desplegarDialogo(mensaje, 'Error', 300, 110, 3);
                if ($("#publico").val() == 1) {
                    Recaptcha.reload();
                }
            }
    });
}

/***
 * Esta función se encarga de hacer un llamado al servidor para crear un registro
 * de aceptación de protección de datos en la base de datos.
 * @param {json} formulario Un objeto con todos los datos de la solicitud a realizar 
 * @returns {json} Un objeto json con la respuesta del servidor
 */
function registrarAceptacionPDP(formulario){
    $.ajax({
        type: 'POST',
        url: '../src/ControlProteccionDatos.php',
        dataType: 'json',
        data: {
            aceptacion: 'S',
            correo: formulario.email,
            documento: formulario.username,
            //ip: $("#ip_address").val(),
            //ip: getenv('HTTP_CLIENT_IP'),
            sistema: "OCS Eventos - " + formulario.sched_conf_id,
            periodo_acad: "",
            per_consecutivo: "",
            respuesta: "",
            entramite: "",
            lider: "",
            motivo: "Inscripción a evento : "+formulario.sched_conf_id,
            negacion: ""
        },
        success: function (data) {
            if (data.retorno != 1) {
                $('#espera').hide(500);
                mensaje = "Ocurrió un error al guardar la información de protección de datos.<br><br>Acérquese a un encargado del evento para firmar la autorización.";
                desplegarDialogo(mensaje, 'Error', 300, 110, 3);
                if ($("#publico").val() == 1) {
                    Recaptcha.reload();
                }
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $('#espera').hide(500);
            mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
            desplegarDialogo(mensaje, 'Error', 300, 110, 3);
            if ($("#publico").val() == 1) {
                Recaptcha.reload();
            }
        }
    });
}

/***
 * Esta función se encarga de hacer un llamado al servidor realizando una solicitud
 * de actulización de datos.
 * @param {json} respuestaServidor Un objeto con todos los datos de la solicitud a realizar 
 * @returns {json} Un objeto json con la respuesta del servidor
 * @param {int} idEvento Identificador del evento.
 */
function solicitarActualizacionDatos(respuestaServidor, idEvento){
    $.ajax({
        type: 'POST',
        url: '../src/ControlRegistroToken.php',
        dataType: 'json',
        data:{
            username: respuestaServidor.username,
            email:respuestaServidor.email,
            sched_conf_id: idEvento,
            token:"",
            action:0
        },
        success: function (data){
            if(data.error==0){
                mensaje = "Hemos enviado un correo a la dirección "+respuestaServidor.email+" con las instrucciones"+
                "para actualizar sus datos";
                
                desplegarDialogo(mensaje, 'Información', 300, 110, 1);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
            console.log("ERROR - "+mensaje);
            desplegarDialogo(mensaje, 'Error', 300, 110, 3);
        }
    });
    
}

/***
 * Esta función se encarga leer lo campos del formulario de inscripción y enviarlos
 * al controlador para la creación de un nuevo usuario.
 *  
 */
function crearUsuario() {
    if ($("#email").val() != "" && $("#email").val() != null) {
        mensaje = "";
        $("#usuario").removeAttr('disabled');
        $('#espera').show(500);
        $.ajax({
            type: 'POST',
            url: '../src/crear_inscrito.php',
            dataType: 'json',
            data: {
                email: $("#email").val(),
                nombre: $("#nombre").val(),
                apellidos: $("#apellidos").val(),
                telefono: $("#telefono").val(),
                username: $("#usuario").val(),
                codigo_barras: $("#codigo_barras").val(),
                sched_conf_id: $("#sched_conf_id").val(),
                transaccion: $("#transaccion").val(),
                tipo_inscripcion: $("#tipo_inscripcion").val(),
                asignado: $("#asignado").val(),
                lugar: $("#lugar").val(),
                organizacion: $("#organizacion").val(),
                genero: $("#genero").val(),
                campo_personalizado_1: $("#campo_personalizado_1").val(),
                campo_personalizado_2: $("#campo_personalizado_2").val(),
                campo_personalizado_3: $("#campo_personalizado_3").val(),
                campo_personalizado_4: $("#campo_personalizado_4").val(),
                campo_personalizado_5: $("#campo_personalizado_5").val(),
                publico: $("#publico").val(),
                recaptcha_response_field: $("#recaptcha_response_field").val(),
                recaptcha_challenge_field: $("#recaptcha_challenge_field").val()
            },
            success: function (data) {
                $('#espera').hide(500);
                if (data.error == 0) {
                    desplegarDialogo(data.msg, 'Informaci&oacute;n', 300, 110, 1);
                    $('#formulario').each(function () {
                        this.reset();
                    });
                    $("#transaccion").val("C");
                    $("#asignado").val("N");
                    $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
                    if ($("#publico").val() == 1) {
                        Recaptcha.reload();
                    }
                } else {
                    if (data.detalles_error != null) {
                        desplegarDialogo(data.msg + "<br/> Detalle: " + data.detalles_error, 'Error', 300, 110, 3);
                    } else {
                        desplegarDialogo(data.msg, 'Error', 300, 110, 3);
                    }
                    if ($("#publico").val() == 1) {
                        Recaptcha.reload();
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('#espera').hide(500);
                mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
                desplegarDialogo(mensaje, 'Error', 300, 110, 3);
                if ($("#publico").val() == 1) {
                    Recaptcha.reload();
                }
            }
        });
    }
}

/***
 * Esta función se encarga de habilitar el formulario de registro para usuarios
 * que no esten registrados en el sistema de gestión de eventos.
 * @param {string} correoUsuario Correo ingresado en el primer paso de la inscripción
 */
function mostrarFormularioRegistro(correoUsuario){
    // realizar los procesos de llenado antes de mostrar el formulario.
    $('#formulario input[name=email]').val(correoUsuario);
    $('#formulario input[name=email]').attr('disabled', true);
    //$('#verificacion').hide();
    $('#registro-actualizacion-datos').show();
}

/***
 * Esta función 
 * @param string myString
 * @returns string La cadena pasada por parámetro sin espacios en blanco.
 */
function trim(myString)
{
    return myString.replace(/^\s+/g, '').replace(/\s+$/g, '')
}

/**
 * Funcion que muestra un diálogo de confirmación usando JQueryUI con un botón "Si" y otro "No"
 * @param mensaje Texto que se va a mostrar
 * @param titulo Titulo del diálogo
 * @param ancho Ancho en pixeles del dialogo
 * @param alto Alto en pixeles del dialogo
 * @param {json} objeto del servidor
 * @param {int} idEvento Identificador evento
 * @return true si se hace clic en "Si", false si se hace clic en "No"
 */
function confirmacionActDatos(mensaje, titulo, ancho, alto, respuestaServidor, idEvento){
  $("#dialog-message-text").html(mensaje);
  $('#dialog-icon').addClass('ui-icon-alert');
  $( "#dialog-message" ).dialog({
    modal: true,
    buttons: {
      "Si": function() {
        $( this ).dialog( "close" );
        solicitarActualizacionDatos(respuestaServidor, idEvento);
        return true;
      },
      "No": function() {          
        $( this ).dialog( "close" );
        return false;
      }
    },
    title: titulo,
    closeOnEscape: true,
    draggable: false,
    resizable: false,
    show: 'fade',
    hide: 'fade',
    width: ancho,
    minHeight: alto,
    dialogClass: 'ui-state-active'
  });
}
