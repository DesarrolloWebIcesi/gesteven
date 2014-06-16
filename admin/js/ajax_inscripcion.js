$(document).ready(function(){
  /*$('#usuario').blur(function(){
    consultarUsuario();
  });*/
  $('#usuario').keypress(function(event){
    if (event.keyCode == "13") {
      event.preventDefault();
      consultarUsuario();
    }
  });
  $('#usuario').blur(function(){
    consultarUsuario();
  });
  $('#formulario').validate({
    submitHandler: function(form){
      actualizarUsuario();
    },
    //errorLabelContainer: $("#error"),
    focusInvalid: true,
    rules:{
      nombre:{
        required: true
      },
      usuario:{
        required: true
      },
      apellidos:{
        required: true
      },
      telefono:{
        required: true
      },
      email:{
        required: true,
        email: true,
        minlength: 9
      }
    }
  });
})
function consultarUsuario(){
  mensaje = "";
  if($("#usuario").val() != null && $("#usuario").val() != ""){
    $.ajax({
      type : 'POST',
      url : '../src/consultar_inscrito.php',
      dataType : 'json',
      data: {
        user_id : $("#usuario").val(),
        sched_conf_id : $("#sched_conf_id").val(),
        version: 1
      },
      success : function(data){
        if(data.error == 0){
          $("#nombre").val(data.first_name);
          $("#segundo_nombre").val(data.middle_name);
          $("#apellidos").val(data.last_name);
          $("#email").val(data.email);
          $("#telefono").val(data.phone);
          $("#fecha_inscripcion").html(data.fecha_registro);
          $("#codigo_barras").val(data.codigo_barras);
          if(data.codigo_barras != null && data.codigo_barras != ""){
            $("#asignado").val("S");
          }
          $('#formulario').validate();
          $('#nombre').focus();
        }else{
          desplegarDialogo(data.msg, 'Error', 300, 110, 3);
          $("#nombre").val('');
          $("#segundo_nombre").val('');
          $("#apellidos").val('');
          $("#email").val('');
          $("#telefono").val('');
          $("#fecha_inscripcion").html('');
          $("#codigo_barras").val('');
          $("#usuario").val('');
          $("#asignado").val("N");
          $("#usuario").focus();
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
        desplegarDialogo(mensaje, 'Error', 300, 110, 3);
      }
    });
  }else{    
    $("#nombre").val('');
    $("#segundo_nombre").val('');
    $("#apellidos").val('');
    $("#email").val('');
    $("#telefono").val('');
    $("#fecha_inscripcion").html('');
    $("#codigo_barras").val('');
    $("#usuario").val('');
    $("#asignado").val("N");
  }
}
function actualizarUsuario(){
  if($("#usuario").val() != "" && $("#usuario").val() != null){
    mensaje = "";
    $.ajax({
      type : 'POST',
      url : '../src/actualizar_inscrito.php',
      dataType : 'json',
      data: {
        username : $("#usuario").val(),
        nombre : $("#nombre").val(),
        segundo_nombre : $("#segundo_nombre").val(),
        apellidos : $("#apellidos").val(),
        email : $("#email").val(),
        telefono : $("#telefono").val(),
        codigo_barras : $("#codigo_barras").val(),
        sched_conf_id : $("#sched_conf_id").val(),
        asignado : $("#asignado").val()
      },
      success : function(data){
        if(data.error == 0){
          desplegarDialogo(data.msg, 'Informaci&oacute;n', 300, 110, 1);
          $("#nombre").val('');
          $("#segundo_nombre").val('');
          $("#apellidos").val('');
          $("#email").val('');
          $("#telefono").val('');
          $("#fecha_inscripcion").html('');
          $("#codigo_barras").val('');
          $("#usuario").val('');
          $("#asignado").val("N");
        }else{
          desplegarDialogo(data.msg, 'Error', 300, 110, 3);
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
        desplegarDialogo(mensaje, 'Error', 300, 110, 3);
      }
    });
  }
}