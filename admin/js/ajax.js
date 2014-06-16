$(document).ready(function(){
  $('.enlace_menu').click(function() {
    $.ajax({
      type : 'POST',
      url : '../src/ControlRolUsuario.php',
      dataType : 'json',
      data: {
        sched_conf_id : this.getAttribute("id")
      },
      success : function(data){
        if(data.error == 0){
          location.href = "panel_evento.php";
        }else{
          location.href = "../src/salir.php";
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        
      }
    });

    //return false;
  });
  $('#genviar').button();
  $('#genviar').click(function() {
    $.ajax({
      type : 'POST',
      url : '../src/ControlEnviarCertificado.php',
      dataType : 'json',
      data: {
        gen_confir : true
      },
      success : function(data){
        if(data.error == 0){
          alert('Certificados enviados satisfactoriamente');
          location.href = "envio_certificados.php?from=genr";
        }else{
          //location.href = "../src/salir.php";
          desplegarDialogo(data.msg, 'Error', 300, 110, 3);
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
        desplegarDialogo(mensaje, 'Error', 300, 110, 3);
      }
    });

    //return false;
  });
});