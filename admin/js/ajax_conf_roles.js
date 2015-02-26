$(document).ready(function(){
  $('#usuario').keypress(function(event){
    if (event.keyCode == "13" | event.keyCode == "9") {
      consultarUsuario();
    }
  });
  $('#submit').click(function(event){
    event.preventDefault();
    actualizarUsuario();
  });
})
function consultarUsuario(){
  mensaje = "";
  $.ajax({
    type : 'POST',
    url : '../src/consultar_usuario.php',
    dataType : 'json',
    data: {
      user_id : $("#usuario").val(),
      sched_conf_id : $("#sched_conf_id").val()
    },
    success : function(data){
      if(data.error == 0){
        $("#nombre").html(data.first_name);
        $("#segundo_nombre").html(data.middle_name);
        $("#apellidos").html(data.last_name);
        $("#email").html(data.email);
        $("#telefono").html(data.phone);
        $("#rol").html(data.rol_texto);
        $("#user_id").val(data.user_id);
      }else{
        desplegarDialogo(data.msg, 'Error', 300, 110, 3);
        $("#nombre").html(' ');
        $("#segundo_nombre").html(' ');
        $("#apellidos").html(' ');
        $("#email").html(' ');
        $("#telefono").html(' ');
        $("#rol").html(' ');
        $("#usuario").val('');
        $("#user_id").val('');
        $("#usuario").focus();
      }
    },
    error : function(XMLHttpRequest, textStatus, errorThrown) {
      mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
      desplegarDialogo(mensaje, 'Error', 300, 110, 3);
    }
  });
}
function actualizarUsuario(){
  if($("#usuario").val() != ""){
    if($("#rol").html() != "Monitor" && $("#rol").html() != "Director" && $("#rol").html() != "Gestor del evento" && $("#rol").html() != "Administrador del sitio"){
      mensaje = "";
      $.ajax({
        type : 'POST',
        url : '../src/actualizar_rol_usuario.php',
        dataType : 'json',
        data: {
          username : $("#user_id").val(),
          sched_conf_id: $("#sched_conf_id").val()
        },
        success : function(data){
          if(data.error == 0){
            desplegarDialogo(data.msg, 'Informaci&oacute;n', 300, 110, 1);
            $("#nombre").html(' ');
            $("#segundo_nombre").html(' ');
            $("#apellidos").html(' ');
            $("#email").html(' ');
            $("#telefono").html(' ');
            $("#rol").html(' ');
            $("#usuario").val('');
            $("#user_id").val('');
          }else{
            desplegarDialogo(data.msg, 'Error', 300, 110, 3);
          }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
          mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
          desplegarDialogo(mensaje, 'Error', 300, 110, 3);
        }
      });
    }else{
      mensaje = "Este usuario ya tiene permisos suficientes.";
      desplegarDialogo(mensaje, 'Información', 300, 110, 1);
    }
  }else{
    mensaje = "Debe especificar un nombre de usuario";
    desplegarDialogo(mensaje, 'Información', 300, 110, 1);
  }
}