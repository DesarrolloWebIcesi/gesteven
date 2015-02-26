jQuery.validator.addMethod("contains", function(value, element, param) {
  return value.indexOf(param) == -1;
});
$(document).ready(function(){
  $('#configform').validate({
      rules:{
          margencert:{
              min: 50,
              max:620
          }
      },
      messages:{
          margencert:{
              min: "El valor debe ser mayor o igual a 50",
              max: "El valor debe ser menor  o igual a 620"
          }
      }
  });

  $('#configsisform').validate({
      rules:{
          porc_asistencia:{
							min:0
          },
          n_presentaciones:{
              min:0
          },
          lapsopaper:{
              required: true,
              min:0
          },
          lapsoevento:{
              min:0
          },
          valor_campo_personalizado_1:{
              contains: ";"
          },
          valor_campo_personalizado_2:{
              contains: ";"
          },
          valor_campo_personalizado_3:{
              contains: ";"
          },
          valor_campo_personalizado_4:{
              contains: ";"
          },
          valor_campo_personalizado_5:{
              contains: ";"
          }
      },
      messages:{
          porc_asistencia:{
              min:"El valor debe ser mayor o igual a 0"
          },
          n_presentaciones:{
              min:"El valor debe ser mayor o igual a 1"
          },
          lapsopaper:{
						required: "Este campo es obligatorio",
              min:"El valor debe ser mayor o igual a 0"
          },
          lapsoevento:{
              min:"El valor debe ser mayor o igual a 0"
          },
          valor_campo_personalizado_1:{
              contains: "No se admite el caracter punto y coma (;)"
          },
          valor_campo_personalizado_2:{
              contains: "No se admite el caracter punto y coma (;)"
          },
          valor_campo_personalizado_3:{
              contains: "No se admite el caracter punto y coma (;)"
          },
          valor_campo_personalizado_4:{
              contains: "No se admite el caracter punto y coma (;)"
          },
          valor_campo_personalizado_5:{
              contains: "No se admite el caracter punto y coma (;)"
          }
      }
  });

  habilitarCamposOpcionales();
})
function guardarConfiguracion(){
  mensaje = "";
  $('#espera').show(500);
  $.ajax({
    type : 'POST',
    url : '../src/ControlConfCertificado.php',
    dataType : 'json',
    data: {
      
    },
    success : function(data){
      $('#espera').hide(500);
      if(data.error == 0){
        desplegarDialogo("Se han guardado los cambios", 'Informaci&oacute;n', 300, 110, 1);
      }else{
        desplegarDialogo(data.msg, 'Error', 300, 110, 3);
      }
    },
    error : function(XMLHttpRequest, textStatus, errorThrown) {
      $('#espera').hide(500);
      mensaje = "Estado: " + XMLHttpRequest.status + "<br/>" + textStatus + "<br/>Error: " + errorThrown;
      desplegarDialogo(mensaje, 'Error', 300, 110, 3);
    }
  });
}

function habilitarCamposOpcionales(){
    $('#configsisform #fcmc').change(function(){
        var seleccionado = $(this).val();
        if(seleccionado=='porc'){
            $('#porc_asistencia').attr("disabled","");
            $('#n_presentaciones').attr("disabled","disabled");
        }else{
            $('#n_presentaciones').attr("disabled","");
            $('#porc_asistencia').attr("disabled","disabled");
        }
    });
    
}
