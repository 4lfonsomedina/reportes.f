<?php ?>
<style type="text/css">
	.tabla_etiqueta{
		width: 100%;
		background-color: white;
		color: black;
		font-size: 2mm;
	}
	.tabla_etiqueta tr td{
		border: solid 1px;
	}
</style>
<div style="height: 44mm; width: 102mm;">
<?php $exento2=$exento;
if($exento!=2&&$exento!=3){?>
	<!-- Tabla Nutrimental y tabla adicional -->
	<div style="width: 45mm;float:left; padding-left: 10px;">
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
<?php $w="54";$exento2=1;}else{ $exento2=2; $w="51";}
for($i=0;$i<$exento2;$i++){?>
	<div style="width: <?= $w ?>mm;<?php if($i==0){?>float:right;<?php } ?>">
		<table class="tabla_etiqueta T2">
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
					<b>HECHO EN <?= $origen ?></b>
				</td>
			</tr>
			<?php if($lote=='1'){?>
			<tr>
				
				<td>Numero de lote y fecha de caducidad: ver envase (MES-DIA-AÑO)(MES en letra donde JAN es ENERO, FEB es FEBRERO, MARCH es MARZO, APR es ABRIL, MAY es MAYO, JUN es JUNIO, JUL es JULIO,AUG es AGOSTO, SEP es SEPTIEMBRE, OCT es OCTUBRE, NOV es NOVIEMBRE y DEC es DICIEMBRE, DIA en 2 digitos, año en 2 digitos)</td>

			</tr>
			<?php } ?>
		</table>
	</div>
<?php } ?>
</div>
<div class="row">
	<div class="col-xs-12" style="text-align: right;">
		<a class="btn btn-warning" target="_blank" href="<?= site_url('InventarioController/imprimir_etiqueta').'?codigo='.$codigo ?>">IMPRIMIR</a></div>
</div>
<div style="height: 44mm; width: 100mm;">
	<div style="width: 47mm;float:left;color: black; text-align: center; font-weight: bold; font-size: 14px; line-height:13px; padding-left: 10px" >
		<br>
		<br><?= $descripcion ?><br>Cont. neto.: <?= number_format($neto,1).$unidad ?>
		<br><br>
		<?= $sellos_add ?>
	</div>
	<?php if($sellos!=""&&$exento!=1&&$exento!=3){?>
	<div style="width: 48mm;  float:left; text-align: right;<?php if($num_sellos==2||$num_sellos==1){echo "padding-top: 20px;";}?>">
			<img style="max-height: 96mm; width: <?php if($num_sellos==1&&$superficie<=23){echo "20";}else{echo "40";}?>mm;" src="<?= $sellos ?>">
	</div>
<?php }else{?>
	<div style="width: 47mm;float:left;color: black; text-align: center; font-weight: bold; font-size: 14px; line-height:13px; padding-left: 10px" >
		<br>
		<br><?= $descripcion ?><br>Cont. neto.: <?= number_format($neto,1).$unidad ?>
		<br><br>
		<?= $sellos_add ?>
	</div>
<?php }?>
</div>

<div class="row">
	<div class="col-xs-12" style="text-align: right;">
		<a class="btn btn-warning" target="_blank" href="<?= site_url('InventarioController/imprimir_etiqueta2').'?codigo='.$codigo ?>">IMPRIMIR</a>
		<a class="btn btn-success" target="_blank" href="<?= site_url('InventarioController/etiqueta_svg').'?codigo='.$codigo ?>">SVG</a>
	</div>
</div>