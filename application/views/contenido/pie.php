</body>
<footer>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<!-- <?= uri_string(); ?> -->
	<?php 
		if(	uri_string()=="InventarioController"||
			uri_string()=="InventarioController/productos"||
			uri_string()=="InventarioController/etiquetado"||
			uri_string()=="InventarioController/solicitud"||
			uri_string()=="InventarioController/solicitudes"
		){
	?>

		<script type="text/javascript" src="<?= base_url('assets/js/inventario.js')?>?version=1"></script>
		
		</script>
	<?php } ?>
</footer>
</html>