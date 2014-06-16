minimo = 5;
error = false;
mensaje = "";
$(document).ready(function(){
  $('#submit').click( function(){
    if($('#usuario').val().length > 0){
      if($('#usuario').val().length >= minimo){
        if($('#password').val().length > 0){
          $.ajax({
            type : 'POST',
            url : 'src/autenticar.php',
            dataType : 'json',
            data: {
              login : $("#usuario").val(),
              password : $("#password").val()
            },
            success : function(data){
              if(data.error == 0){
                if(data.usuario != null){
                  error = false;
                  location.href="gui/formulario.php";
                }else{
                  desplegarDialogo("Nombre de usuario o contrase&ntilde;a incorrectos", 'Error', 300 , 110, 3);
                }
              }else{
                desplegarDialogo(data.msg, 'Error', 300 , 110, 3);
              }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
              mensaje = "Ha ocurrido un error al intentar iniciar sesi&oacute;n.<br />" + textStatus;
              desplegarDialogo(mensaje, 'Error', 300, 110, 3);
            }
          });
        }else{
          mensaje = "El campo contrase&ntilde;a es obligatorio";
          error = true;
        }
      }else{
        mensaje = "El campo identificaci&oacute;n debe tener una longitud m&iacute;nima de " + minimo + " caracteres";
        error = true;
      }
    }else{
      mensaje = "El campo identificaci&oacute;n es obligatorio";
      error = true;
    }
    if(error){
      desplegarDialogo(mensaje, 'Error', 300, 110, 3);
    }
  })
  $('#usuario').keyup( function(event){
    if (event.keyCode == '13') {
      $('#submit').click();
    }
  })
  $('#password').keyup( function(event){
    if (event.keyCode == '13') {
      $('#submit').click();
    }
  })
})