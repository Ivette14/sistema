
<div class="row">
<div class="col-lg-12"> 
<br><br>
<ol class="breadcrumb">


<li class="active"></li><center><h4>Gestor de Roles</h4></center></li> 

</ol>
</div>
</div> 
<div class="container-fluid"> 
 
	<button type="button" onclick="prepara_form( 'Nuevo', 0 )" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar Roles</button> 
 <button type="button" onClick=location="<?php echo base_url().'usuarios'; ?>" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i>&nbsp;Administrador de Usarios</button> 
 
 
	<!-- TABLA DE USUARIOS --> 
	<table class="completa table"> 
		<thead> 
			<tr> 
				<th>Rol</th> 
			
				<th></th> 
			</tr> 
		</thead> 
		<tbody id="lista"></tbody> 
	</table> 
 
</div><!-- FIN CONTAINER --> 
 
<!-- FORMULARIO --> 
<div class="hide_" id="div_form"> 
	<div class="red" id="msj_form"></div> 
	<?php echo form_open('', array('id'=>'my_form')) ?> 
		<!-- HIDDEN --> 
		<input type="hidden" name="id_rol" id="id_rol"> 

		<table class="completa"> 
		<tr> 
				<td><label for="nombre">Nombre Rol: *</label></td> 
				<td>
			
					<input type="text"  class="form-control" name="rol" id="rol"  > 
				</td> 
			</tr>
			
		</table> 
	<?php echo form_close() ?> 
</div> 

<div class="hide_" id="div_form_opcion"> 
	<div class="red" id="msj_form"></div> 
	<?php echo form_open('', array('id'=>'my_form_opcion')) ?> 
		<!-- HIDDEN --> 
		<input type="hidden" name="id_rol" id="id_rol"> 

		<table class="completa"> 
		<tr> 
				<td><label for="nombre">Nombre Rol: *</label></td> 
				<td>
			
					<input type="text"  class="form-control" name="rol" id="rol"  > 
				</td> 
			</tr>
			
		</table> 
	<?php echo form_close() ?> 
</div> 


 
<script> 
	var img='<i class="glyphicon glyphicon-dashboard"></i>'; 
 
	setTimeout(function(){ traer_lista(); }, 500); 
 
	function traer_lista(){ 
		$.ajax({ 
			url      : 'rol/traer_lista', 
			type     : 'post', 
			dataType : 'json', 
			beforeSend : function(){ 
				alerta( img + ' Espere...' ); 
			}, 
			success : function(data){ 
				alerta(); $('#lista').empty(); 
				if( data.type==false){ 
					alerta( data.message, false ); 
				}else{ 
					
					var fila=''; 
					$.each(data.lista, function( k, v ){ 
						fila  ='<tr tabindex="2014'+v.id_rol+'" >'; 
						fila +='<td>'+v.rol+'</td>'; 
						fila +='<td>'; 
						fila += '<i class="glyphicon glyphicon-pencil" onclick="prepara_form_opcion(\'Editar\', '+v.id_rol+')" title="EDITAR"></i>'; 
						fila += '<i class="glyphicon glyphicon-remove" onclick="confirm_delete( '+v.id_rol+' )" title="ELIMINAR"></i>'; 
						fila +='</td>'; 
						fila +='</tr>'; 
						$('#lista').append(fila); 
					}); 
				} 
			}, 
			error : function(){ 
				alerta(); dialogo( 'Error', 'Error en la función usuarios/traer_lista.' ); 
			} 
		}); 
	}; 
 
	function prepara_form( accion, id_rol, id_opcion ){ 
		$('#my_form')[0].reset(); 

		$('#id_rol', '#id_opcion').val( id_rol, id_opcion ); 
		if( accion=='Editar' ){ 
			$.ajax({ 
				url      : 'rol/traer_rol	', 
				type     : 'post', 
				dataType : 'json', 
				data     : { id_rol : id_rol }, 
				beforeSend : function(){ 
					alerta( img + ' Espere...' ); 
				}, 
				success : function(data){ 
					alerta(); 
					if( data.type==false ){ 
						dialogo('Notificación', data.message); 
					}else{ 
						var v=data.rol[0]; 
						$('#rol').val( v.rol ); 
						$('#opcion').val( v.opcion );
						load_form( accion ); 
					} 
				}, 
				error : function(){ 
					alerta(); dialogo( 'Error', 'Error en la función rol/traer_rol.' ); 
				} 
			}); 
		}else{ 
			load_form( accion ); 
		} 
	};// ----------------------- 
	function prepara_form_opcion( accion, id_rol ){ 
		$('#my_form_opcion')[0].reset(); 

		$('#id_rol').val( id_rol); 
		if( accion=='Editar' ){ 
			$.ajax({ 
				url      : 'rol/traer_rol', 
				type     : 'post', 
				dataType : 'json', 
				data     : { id_rol : id_rol }, 
				beforeSend : function(){ 
					alerta( img + ' Espere...' ); 
				}, 
				success : function(data){ 
					alerta(); 
					if( data.type==false ){ 
						dialogo('Notificación', data.message); 
					}else{ 
						var v=data.rol[0]; 
						$('#id_rol').val( v.id_rol ); 
						$('#rol').val( v.rol ); 
						
						load_form_opcion( accion ); 
					} 
				}, 
				error : function(){ 
					alerta(); dialogo( 'Error', 'Error en la función rol/traer_rol.' ); 
				} 
			}); 
		}else{ 
			load_form_opcion( accion ); 
		} 
	};// -----------------------
	function load_form_opcion( accion ){ 
		$( "#div_form_opcion" ).dialog({ 
		    autoOpen  : true, 
		    width     : 600, 
		    title     : accion + 'rol', 
		    "position": ['middle',30], 
		    modal     : true, 
		    resizable : false, 
		    buttons   : { 
		        "Cancelar": function() { 
		            $( "#div_form_opcion" ).dialog( "close" ); 
		        }, 
		        "Guardar": function(){ 
		    		save_form(); 
		    	} 
		    }, 
		    open: function(){}, 
		    close: function(){} 
		}); 
	}; 
	function load_form( accion ){ 
		$( "#div_form" ).dialog({ 
		    autoOpen  : true, 
		    width     : 600, 
		    title     : accion + 'rol', 
		    "position": ['middle',30], 
		    modal     : true, 
		    resizable : false, 
		    buttons   : { 
		        "Cancelar": function() { 
		            $( "#div_form" ).dialog( "close" ); 
		        }, 
		        "Guardar": function(){ 
		    		save_form(); 
		    	} 
		    }, 
		    open: function(){}, 
		    close: function(){} 
		}); 
	};// --------------- 
	function save_form(){ 
		$.ajax({ 
			url      : 'rol/save_form', 
			type     : 'post', 
			dataType : 'json', 
			data     : $('#my_form').serialize(), 
			beforeSend : function(){ 
				$('#msj_form').html( img + ' Espere...' ); 
			}, 
			success : function(data){ 
				$('#msj_form').empty(); 
				if( data.type==false ){ 
					dialogo( 'Notificación', data.message ); 
				}else{ 
					$('#div_form').dialog('close'); 
					traer_lista(); 
					setTimeout(function(){  
						alerta(data.message, true);  
						$('tr[tabindex="2014'+data.id_rol+'"]').focus(); 
						$('tr[tabindex="2014'+data.id_opcion+'"]').focus();
					}, 1000); 
				} 
			}, 
			error : function(){ 
				$('#msj_form').empty(); dialogo( 'Error', 'Error en la función rol/save_form.' ); 
			} 
		}); 
	}; 
 
	function confirm_delete( id_rol ){ 
		$('.notify').html( '¿Confirma que desea eliminar este Rol?' ); 
		$( "#dialogo" ).dialog({ 
		    autoOpen  : true, 
		    width     : 400, 
		    title     : 'Confirmación', 
		    "position": ['middle',30], 
		    modal     : true, 
		    resizable : false, 
		    buttons   : { 
		        "Cancelar": function() { 
		            $( "#dialogo" ).dialog( "close" ); 
		        }, 
		        "Eliminar": function(){ 
		        	$( "#dialogo" ).dialog( "close" ); 
		        	delete_( id_rol ); 
		        } 
		    }, 
		    open: function(){}, 
		    close: function(){} 
		}); 
	};// -------------------------- 
	function delete_( id_rol ){ 
		$.ajax({ 
			url      : 'rol/delete_', 
			type     : 'post', 
			dataType : 'json', 
			data     : { id_rol : id_rol }, 
			beforeSend : function(){ 
				alerta( img + ' Espere...' ); 
			}, 
			success : function( data ){ 
				alerta(); 
				if( data.type==false ){ 
					dialogo( 'Notificación', data.message ); 
				}else{ 
					$( "#dialogo" ).dialog( "close" ); 
					setTimeout(function(){ alerta( data.message, true ); }, 1000); 
					traer_lista(); 
				} 
			}, 
			error : function(){ 
				alerta(); dialogo( 'Error', 'Error en la función rol/delete_' ); 
			} 
		}); 
	} 
</script> 
 
<style> 
	.red { color: red; min-height: 30px } 
	.completa { width: 100% } 
	.hide_ { display: none } 
	table td { padding: 5px } 
	table td i { margin: 5px } 
</style>
<script type="text/javascript">

// PickList II script (aka Menu Swapper)- By Phil Webb (http://www.philwebb.com)
// Visit JavaScript Kit (http://www.javascriptkit.com) for this JavaScript and 100s more
// Please keep this notice intact

function move(fbox, tbox) {
     var arrFbox = new Array();
     var arrTbox = new Array();
     var arrLookup = new Array();
     var i;
     for(i=0; i<tbox.options.length; i++) {
          arrLookup[tbox.options[i].text] = tbox.options[i].value;
          arrTbox[i] = tbox.options[i].text;
     }
     var fLength = 0;
     var tLength = arrTbox.length
     for(i=0; i<fbox.options.length; i++) {
          arrLookup[fbox.options[i].text] = fbox.options[i].value;
          if(fbox.options[i].selected && fbox.options[i].value != "") {
               arrTbox[tLength] = fbox.options[i].text;
               tLength++;
          } else {
               arrFbox[fLength] = fbox.options[i].text;
               fLength++;
          }
     }
     arrFbox.sort();
     arrTbox.sort();
     fbox.length = 0;
     tbox.length = 0;
     var c;
     for(c=0; c<arrFbox.length; c++) {
          var no = new Option();
          no.value = arrLookup[arrFbox[c]];
          no.text = arrFbox[c];
          fbox[c] = no;
     }
     for(c=0; c<arrTbox.length; c++) {
        var no = new Option();
        no.value = arrLookup[arrTbox[c]];
        no.text = arrTbox[c];
        tbox[c] = no;
     }
}

function selectAll(box) {
     for(var i=0; i<box.length; i++) {
     box[i].selected = true;
     }
}
</script>