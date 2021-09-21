<div class="col-xs-12">


	<div class="panel panel-primary">
		<div class="panel-heading">Notificacion PDF</div>
		<div class="panel-body">
			<div class="col-sm-6">
				<textarea class="form-control" placeholder="Mensaje en correo" id="mensaje_masivo"></textarea>
			</div>
			<div class="col-sm-2">
				Adjunto<br>
				<input type="file" class="form-control" accept="application/pdf" name="file" id="file">
			</div>
			<div class="col-sm-3">
				<br>
				<button class="btn btn-warning" id="but_cargar">Cargar <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
			</div>
			<div class="col-sm-1">
				<div class="loader_div" style="text-align: center" hidden>
					<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>
	</div>


	<div class="panel panel-primary panel_validacion" hidden>
		<div class="panel-heading">Valicacion 

			<a class="btn btn-success btn-sm pull-right enviar_todo" style="margin-top: -5px;"><i class="fa fa-envelope" aria-hidden="true"></i> Todo</a>
			<a class="btn btn-default btn-sm pull-right guardar_btn" style="margin-top: -5px; margin-right: 10px;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</a>
		</div>
		<div class="panel-body">
			<form id="form_correos">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
                            <th>Correo</th>
							<th>Enviar</th>
						</tr>
					</thead>
					<tbody id="tabla_masivo">
					</tbody>
				</table>
			</form>
		</div>
	</div>


</div>




<script type="text/javascript">
	$(document).ready(function(){

	//subir documento
    $("#but_cargar").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files[0];
        
        if(typeof files === 'undefined'){ alert('No hay archivo cargado!'); return;}
        $(".loader_div").show();
        $(".panel_validacion").hide();

        fd.append('file',files);
        fd.append('mensaje',$("#mensaje_masivo").val());

        $.ajax({
            url: '<?= site_url('HerramientasController/proveedores') ?>',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    $(".loader_div").hide();
                    $(".panel_validacion").show();
                    $("#tabla_masivo").html(response);

                }else{
                    alert('Error');
                }
            },
        });
    });

    //envio individual
    $(document).on("click",".btn_enviar_correo",function(){
        $(this).attr('correo',$(this).parent("td").parent("tr").find('.td_correo').find('.input_correo').val());
    	$(this).parent("td").find(".loader_enviar").show();
    	$(this).css("display", "none");
    	var temporal_btn = $(this);
    	console.log($(this).attr('mensaje'));

    	$.post('<?= site_url('HerramientasController/enviar_correo_masivo') ?>', {correo: $(this).attr('correo'),mensaje:$(this).attr('mensaje')}, function(r) {
    		if(r!='1'){
    			console.log(r);
    			temporal_btn.parent("td").find(".loader_enviar").hide();
    			temporal_btn.css("display", "block");
    		}else{
    			temporal_btn.removeClass("btn_enviar_correo");
    			temporal_btn.parent("td").find(".loader_enviar").hide();
    			temporal_btn.parent("td").find(".envio_completo").show();
    		}
    	}).fail(function(error) {console.log(error)});
 
    })


    //envio masivo
    $(".enviar_todo").click(function(){
    	var contador=1;
    	$(".btn_enviar_correo").each(function(index, el) {
			setTimeout(function() {el.click();}, contador*1000);
			contador++;
    	});
    })

    //boton de guardado sin envio
    $(".guardar_btn").click(function(){
    	$.post('<?= site_url('HerramientasController/guardar_correos') ?>',$('#form_correos').serialize(), function(r) {
    		alert("Cambios Guardados");
    	});
    })

});
</script>