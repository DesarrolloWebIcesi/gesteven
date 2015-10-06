jQuery.validator.addMethod("evaluate", function(value, element, param) {
  return value.match(new RegExp("^" + param + "$"));
});
$(document).ready(function(){
  $('#limpiar').click(function(){
    $("#usuario").removeAttr('disabled');
  });
  $('#usuario').keypress(function(event){
    if (event.keyCode == "13") {
      event.preventDefault();
      consultarUsuario("#usuario");
    }
  });
  $('#email').keypress(function(event){
    if (event.keyCode == "13") {
      event.preventDefault();
      consultarUsuario("#email");
    }
  });
  $('#usuario').blur(function(){
    consultarUsuario("#usuario");
  });
  $('#email').blur(function(){
    consultarUsuario("#email");
  });
  $('#formulario').validate({
    submitHandler: function(form){
      crearUsuario();
    },
    focusInvalid: true,
    rules:{
      nombre:{
        required: true,
        evaluate: "[a-zA-Zñ á-úÁ-ÚÑüÜ.]{1,}"
      },
      usuario:{
        required: true,
        evaluate: "[a-zA-Z0-9-_.]{1,}"
      },
      apellidos:{
        required: true,
        evaluate: "[a-zA-Zñ á-úÁ-ÚÑüÜ.]{1,}"
      },
      telefono:{
        required: true
      },
      email:{
        required: true,
        email: true,
        minlength: 6
      }
    },
    messages:{
      nombre:{
        evaluate: "Sólo se admiten letras en este campo"
      },
      apellidos:{
        evaluate: "Sólo se admiten letras en este campo"
      },
      usuario:{
        evaluate: "Sólo se admiten letras sin tilde, números, guion (-) y guion bajo (_)"
      }
    }
  });
})
function trim (myString)
{
  return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
}
function consultarUsuario(origen){
  mensaje = "";
  url_ajax = '../src/consultar_inscrito_correo.php';
  if(origen == "#usuario"){
    url_ajax = '../src/consultar_inscrito.php';
  }
  if($(origen).val() != null && $(origen).val() != ""){
    if((origen == "#usuario" && $("#nombre").val() == "" && $("#email").val() == "") || (origen == "#email" && $("#nombre").val() == "" && $("#usuario").val() == "")){
      $('#nombre').val('Por favor espere...');
      $('.imagen_espera').show(50);
      $.ajax({
        type : 'POST',
        url : url_ajax,
        dataType : 'json',
        data: {
          user_id : $(origen).val(),
          sched_conf_id : $("#sched_conf_id").val(),
          version: 2
        },
        success : function(data){
          $('#nombre').val('');
          $('.imagen_espera').hide(50);
          if(data.error == 0){
            /*if(data.type_id != null){
              $("#tipo_inscripcion").val(data.type_id);
            }else{              
              $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
            }*/
            if(data.middle_name != null){
              $("#nombre").val(trim(data.first_name + " " + data.middle_name));
            }else{
              $("#nombre").val(trim(data.first_name));
            }
            $("#apellidos").val(data.last_name);
            $("#telefono").val(data.phone);
            $("#usuario").val(data.username);
            if(origen=="#usuario"){
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
            if(data.transaccion == "A" || data.transaccion == "I"){
              $("#usuario").attr('disabled',true);
            }else{
              $("#usuario").removeAttr('disabled');
            }
            if(data.codigo_barras != null && data.codigo_barras != ""){
              //desplegarDialogo(data.msg, 'Información', 300, 110, 1);
              $("#asignado").val("S");
            } else {
              $("#asignado").val("N");
            }
            $('#formulario').validate();            
            $('#nombre').focus();
          }else{
            $('.imagen_espera').hide(50);
            $("#usuario").removeAttr('disabled');
            $("#nombre").val('');
            $("#apellidos").val('');
            $("#telefono").val('');
            if(origen != "#usuario"){
              usuario = $("#email").val().split('@');
              r = usuario[0];
              r = r.toLowerCase();
              r = r.replace(/[.#$%& ]/,"");
              r = r.replace(/[àáâãäå]/g,"a");
              r = r.replace(/æ/g,"ae");
              r = r.replace(/ç/g,"c");
              r = r.replace(/[èéêë]/g,"e");
              r = r.replace(/[ìíîï]/g,"i");
              r = r.replace(/ñ/g,"n");                
              r = r.replace(/[òóôõö]/g,"o");
              r = r.replace(/œ/g,"oe");
              r = r.replace(/[ùúûü]/g,"u");
              r = r.replace(/[ýÿ]/g,"y");
              //r = r.replace(/\W/g,"");          
              $("#usuario").val(r);
            }
            $("#codigo_barras").val('');
            $("#transaccion").val("C");
            $("#asignado").val("N");
            /*$("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());*/
            if(origen=="#email"){
              $("#usuario").focus();
            }else{
              $("#nombre").focus();
            }
          }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
          mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
          $("#transaccion").val("C");
          $("#asignado").val("N");
          $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
          desplegarDialogo(mensaje, 'Error', 300, 110, 3);
        }
      });    
    }
  }else{    
    $("#usuario").removeAttr('disabled');
    $('#formulario').each (function(){
      this.reset();
    });
    $("#transaccion").val("C");
    $("#asignado").val("N");
    $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
  }
}
function crearUsuario(){
  if($("#email").val() != "" && $("#email").val() != null){
    mensaje = "";
    $("#usuario").removeAttr('disabled');
    $('#espera').show(500);
    $.ajax({
      type : 'POST',
      url : '../src/crear_inscrito.php',
      dataType : 'json',
      data: {
        email : $("#email").val(),
        nombre : $("#nombre").val(),
        apellidos : $("#apellidos").val(),
        telefono : $("#telefono").val(),
        username : $("#usuario").val(),
        codigo_barras : $("#codigo_barras").val(),
        sched_conf_id : $("#sched_conf_id").val(),
        transaccion : $("#transaccion").val(),
        tipo_inscripcion : $("#tipo_inscripcion").val(),
        asignado : $("#asignado").val(),
        lugar : $("#lugar").val(),
        organizacion : $("#organizacion").val(),
        genero : $("#genero").val(),
        campo_personalizado_1 : $("#campo_personalizado_1").val(),
        campo_personalizado_2 : $("#campo_personalizado_2").val(),
        campo_personalizado_3 : $("#campo_personalizado_3").val(),
        campo_personalizado_4 : $("#campo_personalizado_4").val(),
        campo_personalizado_5 : $("#campo_personalizado_5").val(),
        publico : $("#publico").val(),
        recaptcha_response_field : $("#recaptcha_response_field").val(),
        recaptcha_challenge_field : $("#recaptcha_challenge_field").val()
      },
      success : function(data){
        $('#espera').hide(500);
        if(data.error == 0){
          desplegarDialogo(data.msg, 'Informaci&oacute;n', 300, 110, 1);
          $('#formulario').each (function(){
            this.reset();
          });
          $("#transaccion").val("C");
          $("#asignado").val("N");
          $("#tipo_inscripcion").val($("#tipo_inscripcion option:first").val());
          if($("#publico").val() == 1){
            Recaptcha.reload ();
          }
        }else{
          if(data.detalles_error != null){
            desplegarDialogo(data.msg + "<br/> Detalle: " + data.detalles_error, 'Error', 300, 110, 3);
          }else{
            desplegarDialogo(data.msg, 'Error', 300, 110, 3);
          }
          if($("#publico").val() == 1){
            Recaptcha.reload ();
          }
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        $('#espera').hide(500);
        mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
        desplegarDialogo(mensaje, 'Error', 300, 110, 3);
        if($("#publico").val() == 1){
          Recaptcha.reload ();
        }
      }
    });
  }
}
