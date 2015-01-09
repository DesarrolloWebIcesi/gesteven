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
            registrarUsuario(formulario)
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
 * @param {json} respuestaServidor Los datos del usuario que se desea procesar enviados por el servidor
 */
function procesarDatosConsulta(correoUsuario, respuestaServidor){
    // Verificar si hay errores en la respuesta
    if(respuestaServidor.error==0){
        // verificar si el usuario esta inscrito al evento o solo registrado
        
    }else{
        /*
         * El usuario no esta registrado y se debe mostrar el formulario de 
         * registro.
         */ 
        mostrarFormularioRegistro(correoUsuario);
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
            procesarDatos(correoUsuario, data);
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
 * Esta funcion se encarga de llenar el formulario de actualización de datos para
 * un usuario previamente registrado en el sistema de gestión de eventos.
 * @param json data Objeto con información de la respuesta del servidor
 * @param {type} origen Campo que se utilizó para la realizaación de la consulta
 */
function llenarFormulario(data, origen) {
    $('#nombre').val('');
    $('.imagen_espera').hide(50);
    if (data.error == 0) {
        /*if(data.type_id != null){
         $("#tipo_inscripcion").val(data.type_id);
         }else{              
         $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
         }*/
        if (data.middle_name != null) {
            $("#nombre").val(trim(data.first_name + " " + data.middle_name));
        } else {
            $("#nombre").val(trim(data.first_name));
        }
        $("#apellidos").val(data.last_name);
        $("#telefono").val(data.phone);
        $("#usuario").val(data.username);
        if (origen == "#usuario") {
            $("#email").val(data.email);
        }
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
        } else {
            $("#usuario").removeAttr('disabled');
        }
        if (data.codigo_barras != null && data.codigo_barras != "") {
            //desplegarDialogo(data.msg, 'Información', 300, 110, 1);
            $("#asignado").val("S");
        } else {
            $("#asignado").val("N");
        }
        $('#formulario').validate();
        $('#nombre').focus();
    } else {
        $('.imagen_espera').hide(50);
        $("#usuario").removeAttr('disabled');
        $("#nombre").val('');
        $("#apellidos").val('');
        $("#telefono").val('');
        if (origen != "#usuario") {
            usuario = $("#email").val().split('@');
            r = usuario[0];
            r = r.toLowerCase();
            r = r.replace(/[.#$%& ]/, "");
            r = r.replace(/[àáâãäå]/g, "a");
            r = r.replace(/æ/g, "ae");
            r = r.replace(/ç/g, "c");
            r = r.replace(/[èéêë]/g, "e");
            r = r.replace(/[ìíîï]/g, "i");
            r = r.replace(/ñ/g, "n");
            r = r.replace(/[òóôõö]/g, "o");
            r = r.replace(/œ/g, "oe");
            r = r.replace(/[ùúûü]/g, "u");
            r = r.replace(/[ýÿ]/g, "y");
            //r = r.replace(/\W/g,"");          
            $("#usuario").val(r);
        }
        $("#codigo_barras").val('');
        $("#transaccion").val("C");
        $("#asignado").val("N");
        /*$("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());*/
        if (origen == "#email") {
            $("#usuario").focus();
        } else {
            $("#nombre").focus();
        }
    }

}

/***
 * Esta función se encarga de habilitar el formulario de registro para usuarios
 * que no esten registrados en el sistema de gestión de eventos.
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