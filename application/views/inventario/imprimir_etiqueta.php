<style type="text/css">
	body{
		font-family: Arial;
	}
	.tabla_etiqueta{
		width: 100%;
		background-color: white;
		color: black;
		font-size: 1.7mm;
		border-collapse: collapse;
	}
	.tabla_etiqueta tr td{
		border: solid 0.5px;

	}
	.T2 tr td{
		font-size: 1.8mm;
	}
	table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<div style="height: 55mm; width: 52mm;">
<?php if($exento!=2&&$exento!=3){?>
	<!-- Tabla Nutrimental y tabla adicional -->
	<div style="width: 45mm; height: 55mm; float:left; padding-left: 10px; page-break-after: always;">
	<table class="tabla_etiqueta">
	<tr>
		<td><b>Contenido energético Total</b></td>
		<td><b><?= number_format($energia_total,2) ?>kcal (<?= number_format($energia_total_kj,2) ?>kJ)</b></td>
	</tr>
	<tr>
		<td><center><b>Declaración nutrimental</b></center></td>
		<td><center><b>Por 100 g o 100 ml</b></center></td>
	</tr>
	<tr>
		<td><b>Contenido energético</b></td>
		<td><b><?= number_format($energia_100,2) ?>kcal (<?= number_format($energia_100_kj,2) ?>kJ)</b></td>
	</tr>
	<tr>
		<td>Grasas totales</td>
		<td><?= number_format($grasas,1)."g" ?></td>
	</tr>
	<tr>
		<td><b>Grasas saturadas</b></td>
		<td><b><?= number_format($grasas_s,1)."g" ?></b></td>
	</tr>
	<tr>
		<td><b>Grasas trans</b></td>
		<td><b><?= number_format($grasas_t,1)."mg" ?></b></td>
	</tr>
	<tr>
		<td>Hidratos de carbono</td>
		<td><?= number_format($carbohidratos,1)."g" ?></td>
	</tr>
	<tr>
		<td>Azúcares</td>
		<td><?= number_format($azucares,1)."g" ?></td>
	</tr>
	<tr>
		<td><b>Azúcares añadidos</b></td>
		<td><b><?= number_format($azucares_a,1)."g" ?></b></td>
	</tr>
	<tr>
		<td>Fibra dietética </td>
		<td><?= number_format($fibra,1)."g" ?></td>
	</tr>
	<tr>
		<td><b>Sodio</b></td>
		<td><b><?= number_format($sodio,1)."mg" ?></b></td>
	</tr>
	<tr>
		<td><b>Proteinas</b></td>
		<td><b><?= number_format($proteinas,1)."mg" ?></b></td>
	</tr>
	<?php if($adicional!=""){?>
	<tr>
		<td colspan="2"><b>Porcentaje del valor de
referencia (<?= $origen ?>) </b></td>
	</tr>
	<tr>
		<td colspan="2"><b><?= $adicional ?></b></td>
	</tr>
<?php } ?>
</table>
	</div>
<?php $w="54";$exento=1;}else{ $exento=2; $w="51";}?>
	<div style="width: <?= $w ?>mm; margin-left: 4px;">
		<table class="tabla_etiqueta T2" style="page-break-after: always;">
			<?php if($ingredientes!=""){?>
			<tr>
				<td><b>Ingredientes</b></td>
			</tr>
			<tr>
				<td><?= $ingredientes ?></td>
			</tr>
			<?php } ?>
			<?php if($ingredientes_h!=""){?>
			<tr>
				<td><b>CONTIENE:<?= $ingredientes_h ?></b></td>
			</tr>
			<?php } ?>
			<?php if($conservado!=""){?>
			<tr>
				<td><?= $conservado ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<?php if($importacion=='1'){?>
						<b>IMPORTADO POR:</b> DELI MARKET POR FERBIS SA DE CV, DMF0306309E7, AV. BRASIL 750 B CUAUHTEMOC NORTE MEXICALI BAJA CALIFORNIA, MEXICO C.P. 21200. TEL. (686)565-36-23,
					<?php } ?>
					<b>HECHO EN <?= $origen ?> </b>
				</td>
			</tr>
			<?php if($lote=='1'){?>
			<tr>
				<td>Numero de lote y fecha de caducidad: ver envase (MES-DIA-AÑO)(MES en letra donde JAN es ENERO, FEB es FEBRERO, MARCH es MARZO, APR es ABRIL, MAY es MAYO, JUN es JUNIO, JUL es JULIO,AUG es AGOSTO, SEP es SEPTIEMBRE, OCT es OCTUBRE, NOV es NOVIEMBRE y DEC es DICIEMBRE, DIA en 2 digitos, año en 2 digitos)</td>
			</tr>
			<?php } ?>
		</table>
	</div>

</div>
<script type="text/javascript">
	setTimeout(function() {
		window.print();
		window.close();
	}, 1000);
</script>