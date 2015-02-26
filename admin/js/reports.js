/**
 * En este documento se maneja todo el javascript relacionado con la funcionalidad del listado
 * de elementos multimedia
 *
 * @author David Andrés Manzano - damanzano
 * @since 11/02/11
 *
 **/


jQuery(document).ready(function(){
	jQuery("#report-results").hide();
	if(!hayParametros){
		loadPonencias();
		selectPonencia();
	}else{	
		jQuery( "#dialog:ui-dialog" ).dialog( "destroy" );
		asisxPonencia(sched_conf_id, paper_id);
		jQuery("#selected-ponencia").html(titulo_ponencia)
		jQuery("#report-results").show();
		jQuery("#select-ponencia").button();
		jQuery("#select-ponencia").click(function(e){       
			loadPonencias();      
		});
	}
});


/**
 *Esta función se encarga de hacer un llamado asincróico al servidor para
 *cargar las ponencias de un evento.
 *
 *@author damanzano
 *@since 24/08/11

 **/
function loadPonencias(){
    jQuery( "#dialog:ui-dialog" ).dialog( "destroy" );
	
    jQuery( "#ponencias-dialog" ).dialog({        
        closeOnEscape: false,
        open: function(event, ui) {$(".ui-dialog-titlebar-close").hide();},
        width:'60%',
        position:'top',
        modal: true,        
        close: function(event, ui) {     
            
            jQuery("#report-results").show();
            
        },
        buttons:{
            "seleccionar":function(){
                if(jQuery('#selector-ponencia').val()!=null && jQuery('#selector-ponencia').val()!=''){
                    jQuery("#selected-ponencia").html(jQuery('#selector-ponencia option:selected').text());
                    jQuery( this ).dialog( "close" );
                    asisxPonencia(jQuery("#sched_conf_id").val(),jQuery('#selector-ponencia').val());
                    return true;
                }
                return false;
            }
        }
    });
    
    jQuery("#ponencias-dialog").html("<div class=\"loader\"><img src=\"../images/loader.gif\"/><div>");
    //Carga los resultados
    jQuery.ajax({
        type: "POST",
        url: "../src/ControlListados.php",
        dataType : 'json',
        data: {
            list:'ponencias',
            sched_conf_id:jQuery("#sched_conf_id").val()
        },        
        success: function(data){
          if(data.error===false){
              jQuery("#ponencias-dialog").append('<form id="form-ponencias"></form>')
              jQuery("#form-ponencias").append('<select id=\"selector-ponencia\" name=\"selector-ponencia\" style="width:60%;"></select>');                
              for(i=0;i<data.list.length;i++){
                  jQuery("#selector-ponencia").append('<option value="'+data.list[i]['paper_id']+'">'+data.list[i]['setting_value']+'</option>');
              }              
          }            
        }
    });    
}


/**
 *Este método permite desplegar el dialogo para seleccionar otra ponencia
 *
 *@author damanzano
 *@since 24/08/11
 **/
function selectPonencia(){
    jQuery("#select-ponencia").button();    
    jQuery("#select-ponencia").click(function(e){       
        jQuery("#report-results").hide();
        jQuery( "#ponencias-dialog" ).dialog( "open" );        
    });
}

/**
 *Esta función se encarga de hacer un llamado asincróico al servidor para
 *consultar el listado de asistentes a una ponencia.
 *
 *@param int event_id identificador del evento en el sistema
 *@param int paper_id identificador de la ponencia en el sistema
 *
 *@author damanzano
 *@since 24/08/11

 **/
function asisxPonencia(event_id,paper_id){
    jQuery("#report-results").html('');
    $('#espera').show(500);
    jQuery.ajax({
        type: "POST",
        url: "../src/ControlAsisxPonencia.php",
        dataType : 'json',
        data: {
            event_id:event_id,
            paper_id:paper_id
        },        
        success: function(data){
            $('#espera').hide(500);
            if(data.error===false){                
                jQuery("#report-results").html('<table id="results-table" width="100% "></table>');
                var table=jQuery("#results-table");
                table.append('<tr align="left"><th>#</th><th>Nombre de usuario</th><th>Nombre</th><th>Apellidos</th><th>Correo electr&oacute;nico</th><th>Entrada</th><th>Salida</th></tr>');
                for(i=0;i<data.assistants.length;i++){
                    tr='<tr align="left" class="tablerow'+(i % 2)+'">';
                    tr+='<td>'+(i+1)+'</td>';
                    tr+='<td><a href="../src/ControlAsisPersona.php?sched_conf_id='+event_id+'&amp;per='+data.assistants[i]['username']+'">'+data.assistants[i]['username']+'</a></td>';
                    tr+='<td>'+data.assistants[i]['nombre']+'</td>';
                    tr+='<td>'+data.assistants[i]['apellido']+'</td>';
                    tr+='<td>'+data.assistants[i]['correo']+'</td>';
                    tr+='<td>'+data.assistants[i]['entrada']+'</td>';
                    tr+='<td>'+data.assistants[i]['salida']+'</td>';
                    tr+='</tr>';
                    table.append(tr);
                }
            }            
        }
    });     
}