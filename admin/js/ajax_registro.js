$(document).ready(function(){
  $('#formulario').validate({
    errorLabelContainer: $("#error_formulario"),
    submitHandler: function(form){
      registro($('#tipo_operacion').val());
    },
    focusInvalid: true,
    rules:{
      codigo_barras:{
        required: true
      }
    },
    messages:{
      codigo_barras: "El c&oacute;digo de barras es obligatorio"
    }
  });
  $('#submit_salida_masiva').click(function(event){
    event.preventDefault();
    registro('salida_masiva');
  });
  $('#submit_cambio_masivo').click(function(event){
    event.preventDefault();
    registro('cambio_masivo');
  });
/*$('#confirmacion_salida_masiva').click(function(){
    registro('confirmacion_salida_masiva');
  });
  $('#confirmacion_cambio_masivo').click(function(){
    registro('confirmacion_cambio_masivo');
  });*/
})
function desplegarMensaje(mensaje, duracion, tipo){
  $('#mensaje').html(mensaje);
  $('#mensaje').removeClass();
  $('#mensaje').addClass(tipo);
  $('#mensaje').show(500);
  setTimeout("$('#mensaje').hide(500);", duracion);
}
function registro(pOperacion){
  paper_id = $("#paper").val();
  codigo_barras = $("#codigo_barras").val();
  sched_conf_id = $("#id_conferencia").val();
  paper_id_siguiente = $("#paper_siguiente").val();

  if(pOperacion == "confirmacion_salida_masiva" || pOperacion == "confirmacion_cambio_masivo"){
    paper_id = $("#id_paper_masivo").val();
    if(pOperacion == "confirmacion_cambio_masivo"){
      paper_id_siguiente =  $("#id_paper_masivo_siguiente").val();
    }
  }
  if(paper_id != paper_id_siguiente || pOperacion != 'cambio_masivo'){
    $('#espera').show(500);
    $.ajax({
      type : 'POST',
      url : '../src/registro.php',
      dataType : 'json',
      data: {
        paper_id : paper_id,
        paper_id_siguiente : paper_id_siguiente,
        codigo_barras : codigo_barras,
        operacion : pOperacion,
        sched_conf_id :  sched_conf_id
      },
      success : function(data){
        $('#espera').hide(500);
        tipo = 'confirmacion';
        duracion = 2000;
        switch(data.error){
          case -1:
            tipo = 'error';
            break;
          case 1:
            tipo = 'advertencia';
            break;
          case 2:
            tipo = 'error';
            break;
          case 3:
            tipo = 'error';
            break;
          case 4:
            tipo = 'advertencia';
            break;
          case 5:
            tipo = 'advertencia';
            duracion = 20000;
            data.msg += data.confirmacion;
            break;
        }
        $("#codigo_barras").val('');
        $("#codigo_barras").focus();
        desplegarMensaje(data.msg, duracion, tipo);
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        $('#espera').hide(500);
        mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
        desplegarMensaje(mensaje, 2000, 'error');
      }
    });
  }else{
    desplegarMensaje('Debe seleccionar eventos distintos', 2000, 'error');
  }
}