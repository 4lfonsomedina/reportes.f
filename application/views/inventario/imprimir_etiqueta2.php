<style type="text/css">
	body{
		font-family: Arial;
	}
	.tabla_etiqueta{
		width: 100%;
		background-color: white;
		color: black;
		font-size: 1.5mm;
		border-collapse: collapse;
	}
	.tabla_etiqueta tr td{
		border: solid 1px;
	}
</style>

<div style="height: 44mm; width: 50mm;">
<?php if($sellos!=""&&$exento!=1&&$exento!=3){ ?>
	<div style="width: 48mm;  float:left; text-align: right;<?php if($num_sellos==2&&$num_sellos==1){echo "padding-top: 20px;";}?>">
			<img style="max-height: 96mm; width: <?php if($num_sellos==1&&$superficie<=28||$superficie==15){echo "20";}else{echo "40";}?>mm;" src="<?= $sellos ?>">
	</div>
<?php } ?>
	<div style="width: 47mm;float:left;color: black; text-align: center; font-weight: bold; font-size: 14px; line-height:13px; padding-left: 10px" >
		<br>
		<br><?= $descripcion ?><br>Cont. neto.: <?= number_format($neto,1).$unidad ?>
		<br><br>
		<?= $sellos_add ?>
	</div>

</div>
<script type="text/javascript">
	setTimeout(function() {
		window.print();
		window.close();
	}, 1000);
</script>