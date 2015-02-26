/**
 * Funcion que muestra un diálogo modal usando JQueryUI con un botón "Aceptar"
 * @param mensaje Texto que se va a mostrar
 * @param titulo Titulo del diálogo
 * @param ancho Ancho en pixeles del dialogo
 * @param alto Alto en pixeles del dialogo
 * @param tipo tipo de mensaje 1 (Información), 2 (Advertencia), 3 (Error), 4 (Confirmación)
 */
function desplegarDialogo(mensaje, titulo, ancho, alto, tipo){
  $("#dialog-message-text").html(mensaje);
  $('#dialog-icon').removeClass();
  $('#dialog-icon').addClass('ui-icon');
  switch(tipo){
    case 1:
      clase = 'ui-state-default';
      $('#dialog-icon').addClass('ui-icon-info');
      break;
    case 2:
      clase = 'ui-state-active';
      $('#dialog-icon').addClass('ui-icon-alert');
      break;
    case 3:
      clase = 'ui-state-error';
      $('#dialog-icon').addClass('ui-icon-circle-close');
      break;
    case 4:
      clase = 'ui-state-default';
      $('#dialog-icon').addClass('ui-icon-circle-check');
      break;
    default:
      clase = 'ui-state-default';
      $('#dialog-icon').addClass('ui-icon-notice');
      break;
  }
  $( "#dialog-message" ).dialog({
    modal: true,
    buttons: {
      "Aceptar": function() {
        $( this ).dialog( "close" );
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
    dialogClass: clase
  })
}
/**
 * Funcion que muestra un diálogo de confirmación usando JQueryUI con un botón "Si" y otro "No"
 * @param mensaje Texto que se va a mostrar
 * @param titulo Titulo del diálogo
 * @param ancho Ancho en pixeles del dialogo
 * @param alto Alto en pixeles del dialogo
 * @return true si se hace clic en "Si", false si se hace clic en "No"
 */
function desplegarConfirmacion(mensaje, titulo, ancho, alto){
  $("#dialog-message-text").html(mensaje);
  $('#dialog-icon').addClass('ui-icon-alert');
  $( "#dialog-message" ).dialog({
    modal: true,
    buttons: {
      "Si": function() {
        $( this ).dialog( "close" );
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
  })
}

