$(document).ready(function(){
  //$( "#facturas" ).buttonset();
  $('#concepto').keyup(function(){
    $('#concepto').formatCurrency({
      region: 'es-CO',
      roundToDecimalPlace: 0
    });
    sumarTotales();
  })
  $('#seguro').click(function(){
    $('#valor_seguro').val($('#seguro:checked').val());
    if($('#valor_seguro').val() == '')
      $('#valor_seguro').val('0');
    $('#valor_seguro').formatCurrency({
      region: 'es-CO',
      roundToDecimalPlace: 0
    });
    sumarTotales();
  })
  $('#submit').click(function(e){
    sumarTotales();
    concepto = $('#concepto').asNumber({
      region: 'es-CO',
      parseType: 'int'
    });
    minimo = 0;
    maximo = parseInt($('#concepto_max').val());
    if(concepto >= minimo){
      if(concepto <= maximo){
        $('#pagos').submit();
      }else{
        if(maximo == 0){
          desplegarDialogo('El valor del concepto debe ser $' + maximo, 'Error', 300, 110, 3);
        }else{
          desplegarDialogo('El valor del concepto debe ser menor o igual a $' + maximo, 'Error', 300, 110, 3);
        }
        return false;
      }
    }else{
      desplegarDialogo('El valor del concepto debe ser mayor o igual a $' + minimo, 'Error', 300, 110, 3);
      return false;
    }
  })
})

function sumarTotales(){
  //if(!isNaN($('#concepto').val())){
  //datos_matricula = $("input:radio:checked", '#pagos').val().split('~');
  //datos_matricula = pDatos_matricula;
  total = $('#concepto').asNumber({
    region: 'es-CO',
    parseType: 'int'
  }) + $('#procultura').asNumber({
    region: 'es-CO',
    parseType: 'int'
  }) + $('#valor_seguro').asNumber({
    region: 'es-CO',
    parseType: 'int'
  }) + $('#mora').asNumber({
    region: 'es-CO',
    parseType: 'int'
  }) + $('#extemporaneidad').asNumber({
    region: 'es-CO',
    parseType: 'int'
  });
  $('#total').val(total);
  $('#total').formatCurrency({
    region: 'es-CO',    
    roundToDecimalPlace: 0
  });
  $('#valor_matricula').val(datos_matricula[2]+"-"+$('#total').asNumber({
    region: 'es-CO',
    parseType: 'int'
  }));
  if(datos_matricula[1] == "PRE")
    $('#extra1').val('matricula_' + datos_matricula[1].toLowerCase()+"-"+$('#concepto').asNumber({
      region: 'es-CO',
      parseType: 'int'
    })+"-"+$('#valor_seguro').asNumber({
      region: 'es-CO',
      parseType: 'int'
    })+"-"+datos_matricula[3]+"-"+$('#extemporaneidad').asNumber({
      region: 'es-CO',
      parseType: 'int'
    })+"-"+$('#mora').asNumber({
      region: 'es-CO',
      parseType: 'int'
    }));
  else
    $('#extra1').val('matricula'+"-"+$('#concepto').asNumber({
      region: 'es-CO',
      parseType: 'int'
    })+"-"+$('#valor_seguro').asNumber({
      region: 'es-CO',
      parseType: 'int'
    })+"-"+datos_matricula[3]+"-"+$('#extemporaneidad').asNumber({
      region: 'es-CO',
      parseType: 'int'
    })+"-"+$('#mora').asNumber({
      region: 'es-CO',
      parseType: 'int'
    }));
/*}else{
    $('#total').val('ERROR');
  }*/
}