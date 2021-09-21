<div class="col-md-4"></div>
<div class="col-md-4" style="margin-top: 10%">
	<div class="panel panel-default">
	  <div class="panel-body" style="padding-top: 30px; padding-bottom: 50px">
	  	<h3 style="text-align: center">Herramientas y sistemas ferbis</h3>
	  	<div class="col-xs-2"></div>
			<div class="col-xs-8">
			  	<br><br>
			  	<form method="post" action="<?= site_url('Welcome/validar');?>">
			  		<center><i class="fa fa-rocket fa-4x" aria-hidden="true"></i></center><br><br>
			  	<input type="text" name="correo" class="form-control" placeholder="Correo"><br>
			  	<input type="password" name="clave" class="form-control" placeholder="Clave"><br><br>
			  	<button class="btn btn-warning" style="width: 100%">Entrar</button><br>
			</div>
	  </div>
	</div>
</div>

<?php if(isset($_GET['e'])&&$_GET['e']='1'){ ?>
<div class="col-xs-12" id="error_usuario">
	<div class="col-xs-4"></div>	
	<div class="col-xs-4">
		
		<div class="alert alert-dismissible alert-warning">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <h4>Error!</h4>
		  <p>Usuario o constraseña invalidos</a>.</p>
		</div>	
	</div>
</div>

<script type="text/javascript">
	setTimeout(function() {$("#error_usuario").hide();}, 5000);
</script>

<?php } ?>