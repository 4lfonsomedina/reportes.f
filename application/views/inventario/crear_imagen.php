<style type="text/css">
	body{
		font-family: Arial;
		color: #494C56;
	}
	#myProgress {
	  width: 100%;
	  background-color: #ddd;
	}

	#myBar {
	  width: 10%;
	  height: 30px;
	  background-color: #04AA6D;
	  text-align: center;
	  line-height: 30px;
	  color: white;
	}
	.tabla_etiqueta{
		width: 100%;
		background-color: white;
		color: #494C56;
		font-size: 1.5mm;
		border-collapse: collapse;
	}
	.tabla_etiqueta tr td{
		border: solid 1px #494C56;
	}
</style>

<style type="text/css">
	body{
		padding: 0px;
		margin:0px;
		font-family: Arial;
	}
	.tabla_etiqueta{
		width: 100%;
		background-color: white;
		color: #494C56;
		font-size: 1.7mm;
		border-collapse: collapse;
	}
	.tabla_etiqueta tr td{
		border: solid 0.1px #494C56;

	}
	.T2 tr td{
		font-size: 1.8mm;
	}
	table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>

<?php

//largo del rollo
$ancho="3.75";
$largo="4.25";

$path=0;if($num_sellos==3&&$superficie>15){ $path = 1;}
?>

<div style="width: 4.25in; /*border:solid 1px black;*/ padding: 3px;" id="capture">
	<div>
<!-- Descripcion siempre-->
	<div style="min-height: 20mm; width: 42mm;float:left;color: #494C56; text-align: center; font-weight: bold;margin-top: 4px; font-size: 14px; line-height:13px; padding-left: 10px;" id="E1">
		<div id="E1_desc" style="width: 100%"><?= $descripcion ?><br>Cont. neto.: <?= number_format($neto,1).$unidad ?></div>
		<br>
		<span id="E1_sellos"><?= $sellos_add ?></span>
		<br><br>
	</div>

<!--Sellos solo cuando son requeridos -->
	<?php if($sellos!=""&&$exento!=1&&$exento!=3){ ?>
	<div style=" float:left; padding-left: 10px;margin-top: 0px; " id="E2">
			<img style="max-height: 96mm; width: <?php 
			// cuando es un sello o 2
			if($num_sellos==1||$superficie==15){
				if($superficie==15){
					echo "17";
				}else{
					echo "25";
				}
			}
			else{echo "45";}?>mm;" 
			src="<?= $sellos ?>"><br><br>
	</div>
	<?php } ?>


<!-- Tabla Nutrimental y tabla adicional -->
<?php if($exento!=2&&$exento!=3){?>
	<div style="width: 45mm; float:right; margin-left: 0px;margin-top: 0px;" id="E4">
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
		<td colspan="2"><b>Porcentaje del valor de referencia (<?= $origen ?>) </b></td>
	</tr>
	<tr>
		<td colspan="2"><b><?= $adicional ?></b></td>
	</tr>
<?php } ?>
</table>
</div>
<?php } ?>


<!-- Tabla Nutrimental y tabla adicional -->
	<div style="width: 60mm; float:left; margin-left: 0px;margin-top: 0px;padding-left: 4px;padding-top: 4px;" id="E3">
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
</div>
<form id="form_data" method="POST" action="<?= site_url('InventarioController/descargar_svg') ?>">
	<input type="hidden" name="imagen" id="form_imagen">
	<input type="hidden" name="ancho" id="form_ancho">
	<input type="hidden" name="largo" value="4.25">
	<input type="hidden" name="espacio">
	<div id="contenedor_coordenadas">
	<?php foreach($coordenadas as $c){ //1.6,1,5,10 ?>
	<input type="hidden" name="coordenadas[]" value='<?= $c ?>'>
	<?php } ?>
	<input type="hidden" name="espacio">
</form>


<!-- Loading -->
<div style="width: 4.25in;">
<h2>Generando SVG...</h2>
<div id="myProgress">
  <div id="myBar">0%</div>
</div>
</div>


<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/html2canvas.js')?>"></script>
	
<script type="text/javascript">
	var i = 0;
	move();
	function move() {
	  if (i == 0) {
	    i = 1;
	    var elem = document.getElementById("myBar");
	    var width = 1;
	    var id = setInterval(frame, 10);
	    function frame() {
	      if (width >= 100) {
	        clearInterval(id);
	        i = 0;
	      } else {
	        width++;
	        elem.style.width = width + "%";
	        width++;
	        elem.innerHTML = width-1  + "%";
	      }
	    }
	  }
	}
	setTimeout(function() {
		//window.location.href=image;
		var E1 = $("#E1").height();
		var E2 = $("#E2").height();
		var E3 = $("#E3").height();
		var E4 = $("#E4").height();

		//caso 1 estan todos
		if(typeof E2 !== "undefined" && typeof E4 !== "undefined"){
			if(E3+$("#E3").position().top>=E4+$("#E4").position().top){
				$("#capture").height(E3+$("#E3").position().top);
			}else{
				$("#capture").height(E4+$("#E4").position().top);
			}
		}
		//caso 2 solo falta E2
		if(typeof E2 === "undefined" && typeof E4 !== "undefined"){
			console.log((E1+E3)+" vs "+(E4));
			if(E3+$("#E3").position().top>=E4){
				$("#capture").height(E3+$("#E3").position().top);
			}else{
				$("#capture").height(E4+10);
			}
		}
		//caso 3 solo falta E4
		if(typeof E2 !== "undefined" && typeof E4 === "undefined"){
			console.log(((E3+$("#E3").position().top))+" vs "+(E2));
			if((E3+$("#E3").position().top)>=E2){
				$("#capture").height((E3+$("#E3").position().top));
			}else{
				$("#capture").height(E2+10);
			}
		}
		//caso 4 faltan E2 y E4
		if(typeof E2 === "undefined" && typeof E4 === "undefined"){
			console.log((E1)+" vs "+(E3));
			if(E1>=E3){
				$("#capture").height(E1+10);
			}else{
				$("#capture").height(E3+10);
			}
		}
		$('#form_ancho').val((($("#capture").height()+10)*0.01042).toFixed(0));

		//recortes
		//1
		var x1 = (($("#E1_desc").width()*0.01042)+.05).toFixed(2);
		var y1 = (($("#E1_desc").height()*0.01042)+.07).toFixed(2);
		var x2 = 0.10;
		var y2 = 0.12;
		$("#contenedor_coordenadas").append("<input type='hidden' name='coordenadas[]' value='"+x1+","+y1+","+x2+","+y2+",0'>");
		x2 = 0.1;
		if($("#E1_sellos").width()>.5){
			y2 = (parseFloat(y2)+parseFloat(y1)+.05).toFixed(2);
			//y2 = (parseFloat(y2)+0.1).toFixed(2);
			x1 = (($("#E1_sellos").width()*0.01042)+0.03).toFixed(2);
			y1 = (($("#E1_sellos").height()*0.01042)+.16).toFixed(2);
			$("#contenedor_coordenadas").append("<input type='hidden' name='coordenadas[]' value='"+x1+","+y1+","+x2+","+y2+",0'>");
		}
		
		if(typeof E2 !== "undefined"){
			x2 = (($("#E2").position().left*0.01042)-0.03).toFixed(2);
			y2 = (($("#E2").position().top*0.01042)-0.00).toFixed(2);
			y2 = (parseFloat(y2)+0.1).toFixed(2);
			x1 = (($("#E2").width()*0.01042)+0.04).toFixed(2);
			y1 = (($("#E2").height()*0.01042)-0.15).toFixed(2);

			$("#contenedor_coordenadas").append("<input type='hidden' name='coordenadas[]' value='"+x1+","+y1+","+x2+","+y2+",<?= $path ?>'>");
		}
		if(typeof E3 !== "undefined"){
			x2 = (($("#E3").position().left*0.01042)+0.03-($("#E3").position().left*0.01042)*0.05).toFixed(2);
			y2 = (($("#E3").position().top*0.01042)-($("#E3").position().top*0.01042)*0.08).toFixed(2);
			y2 = (parseFloat(y2)+0.1).toFixed(2);
			x1 = (($("#E3").width()*0.01042)+0.00).toFixed(2);
			y1 = (($("#E3").height()*0.01042)+0.05).toFixed(2);
			$("#contenedor_coordenadas").append("<input type='hidden' name='coordenadas[]' value='"+x1+","+y1+","+x2+","+y2+",0'>");
		}
		if(typeof E4 !== "undefined"){
			x2 = (($("#E4").position().left*0.01042)-0.17).toFixed(2);
			y2 = (($("#E4").position().top*0.01042)-($("#E4").position().top*0.01042)*0.08).toFixed(2);
			y2 = (parseFloat(y2)+0.1).toFixed(2);
			x1 = (($("#E4").width()*0.01042)+0.00).toFixed(2);
			y1 = (($("#E4").height()*0.01042)+0.00).toFixed(2);
			$("#contenedor_coordenadas").append("<input type='hidden' name='coordenadas[]' value='"+x1+","+y1+","+x2+","+y2+",0'>");
		}
		console.log($("#E1").position());
		console.log($("#E2").position());
		console.log($("#E3").position());
		console.log($("#E4").position());

		//$("#capture").height($("#div_desc").height()+$("#div_desc").next('div').next('div').height()+10);
		window.scrollTo(0, 0);
		html2canvas(document.querySelector("#capture"),{scale:5}).then(canvas => {
			var image = canvas.toDataURL("image/png").replace("image/png","image/octet-stream");
			var base64 = canvas.toDataURL("image/png");
			$("#form_imagen").val(base64);
			$("#form_data").submit();
			$("#form_data").submit();
			setTimeout(function() { window.close();}, 6000);
    	});
	}, 100);
</script>