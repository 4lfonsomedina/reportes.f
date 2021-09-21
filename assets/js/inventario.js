$(document).ready(function() {
	$('.cabecera_solicitud').click(function(){
		$(this).parent('div').find('.cuerpo_solicitud').fadeToggle();
	})
	//redireccionar al producto
	$(".tr_producto").click(function(){
		window.open("https://reportes.ferbis.com/index.php/InventarioController/etiquetado?codigo="+$(this).attr('codigo'), '_blank');
	})
	if($("#codigo_prod").val()!=""){
		consulta_producto();
	}
	$('.tabla_reportes').DataTable({
		"initComplete": function() {
		   $(".tabla_reportes").show();
		  }
	});






	/* MODULOS DE SOLICITUD DE ETIQUETAS *///////////////////////////////////////////////////////////////////////////////////////////
	$(".check_solicitud").click(function(){
		var check = 0; if($(this).is(':checked')) { check=1; }
		$.post('/index.php/InventarioController/actualizar_sol_det', {
			check:check,
			id_sol_det:$(this).attr('id_sol_det') 
		}, function(r) {
			r = jQuery.parseJSON(r);
			if(r.full == 1){ $("#full_solicitud_"+r.id_solicitud).show(); }
			else{ $("#full_solicitud_"+r.id_solicitud).hide(); }
		});
	})
	$("#form_sol_imp").on("submit",function(e){
		e.preventDefault();
		consultar_producto();
	})
	$("#form_sol_imp2").on("submit",function(e){
		e.preventDefault();
		ageregar_producto();
		limpiar_campos();
	})
	$("#agregar_producto_btn").click(function(){
		ageregar_producto();
		limpiar_campos();
	})
	$("#guardar_solicitud").click(function(){
		if($("#solicitante").val()==""){
			alert("El campo de solicitante no puede estar vacio!");
			return;
		}
		$.post('/index.php/InventarioController/guardar_solicitud', $("#cuerpo_panel").find('select, input').serialize(), function(r) {
			alert("Solicitud recibida!");
			window.location.href = "https://reportes.ferbis.com/index.php/InventarioController/solicitudes";
		});
		
	})
	$(document).on("click",".borrar_linea",function(){
		if(confirm("Estas seguro de que deseas eliminar este elemento?")){
			$(this).parent('td').parent('tr').remove();
		}
	})
	$("#sol_producto").focusout(function(){
		consultar_producto();
	})
	function ageregar_producto(){
		if($("#sol_producto").val()==""||$("#sol_descripcion").val()==""||$("#sol_cantidad").val()==""){alert('verifica la informacion...');return;}
		var validado = ""; if($("#sol_validado").val()!='1'){ validado = '<i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>'; }
		$('.tbody_productos').append("<tr>"+
			"<td>"+validado+"</td>"+
			"<td><input name='codigo[]' type='text' class='form-control disable' value='"+$("#sol_producto").val()+"'></td>"+
			"<td><input name='descripcion[]' type='text' class='form-control disable' value='"+$("#sol_descripcion").val()+"'></td>"+
			"<td><input name='cantidad[]' type='number' class='form-control' value='"+$("#sol_cantidad").val()+"'></td>"+
			"<td><a href='#' class='borrar_linea' style='color:red'><i class='fa fa-times' aria-hidden='true'></i></a></td>"+
			"</tr>"
		);
	}
	function limpiar_campos(){
		$("#sol_producto").val("");
		$("#sol_descripcion").val("");
		$("#sol_cantidad").val(1);
		$("#sol_producto").select();
	}
	function consultar_producto(){
		if($("#sol_producto").val()==""){return;}
		$.post('/index.php/InventarioController/get_producto', {codigo: $("#sol_producto").val() }, function(r) {
			if(r=="null"){
				alert('Este producto aun no se captura...');
				limpiar_campos();
				return;
			}
			r = jQuery.parseJSON(r);
			$("#sol_descripcion").val(r.descripcion);
			$("#sol_validado").val(r.validado);
			$("#sol_cantidad").val(1);
			$("#sol_cantidad").select();
		});
	}
	/* MODULOS DE SOLICITUD DE ETIQUETAS *////////////////////////////////////////////////////////////////////////////////




	$(".tab_adicionales").click(function(){
		$(this).parent('div').find('.contenedor_adicionales').toggle();
	})
	$(".btn_guartdar_prod").click(function(){
		guardar_producto();
	})
	$("#codigo_prod").keyup(function(event) {
	    if (event.which === 13) {
	        consulta_producto();
	    }
	});
	$("#codigo_prod").focusout(function() {
		consulta_producto();
	});

	function consulta_producto(){
		if($("#codigo_prod").val()==""){
			$.each($(".autollenado"), function(index, val) {
				$(this).val("");
			});
			$("#origen").val("E.U.A.");
			$("#importacion").val(1);
			$("#lote").val(1);
			$("#exento").val(0);
			return false;
		}
		$.post('get_producto', {codigo:$("#codigo_prod").val()} , function(r) {
			if(r!="null"){
				var producto = jQuery.parseJSON(r);
				$.each($(".autollenado"), function(index, val) {
					$(this).val(producto[$(this).attr("name")]);
				});
				$.post('generar_etiquetas', {codigo:$("#codigo_prod").val()} , function(r) {
					$(".div_etiqueta").html(r);
				});
			}else{
				$.each($(".autollenado"), function(index, val) {
					$(this).val("");
				});
				$("#origen").val("E.U.A.");
				$("#importacion").val(1);
				$("#lote").val(1);
				$("#exento").val(0);
			}
		});
	}

	$(".btn_blanco_prod").click(function(){
		if(confirm("estas seguro de que deseas limpiar los campos? no se guardaran los cambios que no hayas guardado")){
			$("#codigo_prod").val("");
			$.each($(".autollenado"), function(index, val) {
					$(this).val("");
			});
			$("#origen").val("E.U.A.");
			$("#importacion").val(1);
			$("#lote").val(1);
			$("#exento").val(0);
			$("#codigo_prod").select();

		}
	})
	$(".btn_eliminar_pro").click(function(){
		if($("#codigo_prod").val()==""){
			alert("No hay producto capturado");
			return false;
		}
		if(!confirm("estas seguro de que deseas eliminar este producto?")){
			return false;
		}
		
		$.post('eliminar_producto', {codigo:$("#codigo_prod").val()} , function(r) {
			alert("producto eliminado");
			window.location.href = "https://reportes.ferbis.com/index.php/InventarioController/productos";
		});
	})
	$(".btn_generar_eti").click(function(){
		generar_etiqueta();
	})
	function generar_etiqueta(){
		if($("#codigo_prod").val()==""||$("#descrip_prod").val()==""){
			alert("No hay producto capturado");
			return false;
		}
		$.post('guardar_producto', $("#formulario_producto").serialize() , function(r) {
			$.post('generar_etiquetas', {codigo:$("#codigo_prod").val()} , function(r) {
				$(".div_etiqueta").html(r);
			});
		});
	}
	function guardar_producto(){
		if($("#codigo_prod").val()==""){
			alert("El codigo del producto no puede estar vacio");
			return false;
		}
		$.post('guardar_producto', $("#formulario_producto").serialize() , function(r) {
			console.log(r);
		});
	}
});