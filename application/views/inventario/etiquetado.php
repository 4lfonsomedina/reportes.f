<style type="text/css">
	.panel-body div{
		padding-top: 10px;
	}
	.adicionales select{
		color: black;
	}
</style>
<form id="formulario_producto">
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading"> Producto  

			<a href="#" class="btn btn-success pull-right btn-sm btn_generar_eti" style="margin-top: -5px;"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			<a href="#" class="btn btn-warning pull-right btn-sm btn_guartdar_prod" style="margin-top: -5px; margin-right: 20px;"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
			<a href="#" class="btn btn-info pull-right btn-sm btn_blanco_prod" style="margin-top: -5px; margin-right: 20px;"><i class="fa fa-plus" aria-hidden="true"></i></a>
			<?php if($this->session->userdata('tipo')==1){?>
				<a href="#" class="btn btn-danger pull-right btn-sm btn_eliminar_pro" style="margin-top: -5px; margin-right: 20px;"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
			<?php } ?>

		</div>
		<div class="panel-body">
		<div class="row">
			<div class="col-xs-2">
				<b>Código</b> <input type="text" class="form-control input-sm" name="codigo" autocomplete="off" id="codigo_prod" 
									<?php if(isset($_GET['codigo'])){ echo "value='".$_GET['codigo']."'";}?>>
			</div>
			<div class="col-xs-6">
				<b>Descripción </b><input type="text" class="form-control input-sm autollenado" name="descripcion" autocomplete="off" id="descrip_prod">
			</div>
			<div class="col-xs-2">
				<b>Importación? </b><select class="form-control input-sm autollenado" name="importacion" id="importacion"><option value="1">si</option><option value="0">no</option></select>
			</div>
			<div class="col-xs-2">
				<b>Exento de? </b>
				<select class="form-control input-sm autollenado" name="exento" id="exento">
					<option value="0">NA</option>
					<option value="1">Sellos</option>
					<option value="2">Nutricional</option>
					<option value="3">Ambos</option>
				</select>
			</div>
			<div class="col-xs-3">
				<b>Contenido Neto</b><input type="text" class="form-control input-sm autollenado" name="neto">
			</div>
			<div class="col-xs-1">
				<br><select class="form-control input-sm autollenado" name="g_m"><option value="gr">gr</option><option value="ml">ml</option></select>
			</div>
			<div class="col-xs-1">
				<b>Porción </b><input type="text" class="form-control input-sm autollenado" name="porsion">
			</div>
			<div class="col-xs-3">
				<b>Superficie cm2 </b>
				<select class="form-control input-sm autollenado" name="superficie">
					<option value="15"> menor a 40cm2 </option>
					<option value="22"> 40cm2 a 100cm2 </option>
					<option value="27"> 100cm2 a 200cm2 </option>
					<option value="38"> mayor a 200cm2 </option>
				</select>
			</div>
			<div class="col-xs-2">
				<br><select class="form-control input-sm autollenado" name="s_l"><option value="solido">Solido</option><option value="liquido">Liquido</option></select>
			</div>
			<div class="col-xs-2">
				<b>Origen </b><input type="text" class="form-control input-sm autollenado" name="origen" value='E.U.A.' id='origen'>
			</div>

			<div class="col-xs-12">
				<label class="pull-right" >
					Producto Validado
					<select class="autollenado" style="color: black;" name="validado"><option value="0">NO</option><option value="1">SI</option></select>
				</label>
				<hr>
			</div>
			<div class="col-xs-4">
				<b>Contenigo energetico (kcal)</b> <input type="text" class="form-control input-sm autollenado" name="energia">
			</div>
			<div class="col-xs-4">
				<b>Proteinas (g)</b><input type="text" class="form-control input-sm autollenado" name="proteinas">
			</div>
			<div class="col-xs-4">
				<b>Fibra dietetica (g)</b><input type="text" class="form-control input-sm autollenado" name="fibra">
			</div>
			<div class="col-xs-12"><hr></div>
			<div class="col-xs-4">
				<b>Grasas totales (g)</b><input type="text" class="form-control input-sm autollenado" name="grasas">
			</div>
			<div class="col-xs-4">
				<b>Grasas saturadas (g)</b><input type="text" class="form-control input-sm autollenado" name="grasas_s">
			</div>
			<div class="col-xs-4">
				<b>Grasas trans (mg)</b> <input type="text" class="form-control input-sm autollenado" name="grasas_t">
			</div>
			<div class="col-xs-12"><hr></div>
			<div class="col-xs-4">
				<b>Hidratos de carbono</b> <input type="text" class="form-control input-sm autollenado" name="carbohidratos">
			</div>
			<div class="col-xs-4">
				<b>Total Azucares (g)</b> <input type="text" class="form-control input-sm autollenado" name="azucares">
			</div>
			<div class="col-xs-4">
				<b>Azucares añadidos (g)</b> <input type="text" class="form-control input-sm autollenado" name="azucares_a">
			</div>
			<div class="col-xs-4">
				<b>Sodio (mg)</b> <input type="text" class="form-control input-sm autollenado" name="sodio">
			</div>
			<div class="col-xs-12">
				<b>Ingredientes</b> <textarea class="form-control input-sm autollenado" rows="4" name="ingredientes"></textarea>
			</div>
		</div>
			<div class="row" style=" border: solid 1px; margin-top: 15px; padding-bottom: 15px">
			<div class="col-xs-4 adicionales" >
				<select name="gluten" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				GLUTEN(trigo,centeno,avena,cebada) <br>
				<select name="leche" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				LECHE <br>
				<select name="nueces" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				NUECES <br>
				<select name="sulfito" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				SULFITO <br>
				
								
			</div>		
			<div class="col-xs-4 adicionales" >	
				<select name="cafeina" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				CAFEINA <br>	
				<select name="moluscos" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				MOLUSCOS <br>
				<select name="cacahuate" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				CACAHUATE <br>
				<select name="soya" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				SOYA <br>			
			</div>	
			<div class="col-xs-4 adicionales" >	
				<select name="huevos" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				HUEVOS <br>			
				<select name="pescado" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				PESCADO <br>				
				<select name="crustaceos" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
				CRUSTACEOS <br>
			</div>	
		</div>
			<div class="row" style=" border: solid 1px; margin-top: 15px;  padding-bottom: 15px">
				<div class="col-xs-6 adicionales">
					<select name="abierto" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
					UNA VEZ ABIERTO CONSERVESE REFRIGERADO <br>

					<select name="fresco" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
					CONSERVAR EN LUGAR FRESCO Y SECO <br>

					<select name="refrigerado" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
					CONSERVESE REFRIGERADO <br>

					
				</div>
				<div class="col-xs-6 adicionales">
					<select name="congelar" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
					NO CONGELAR <br>

					<select name="agitese" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select>
					AGITESE ANTES DE ABRIR <br>

					<select name="lote" class="autollenado" id="lote"><option value='1'>si</option><option value='0'>no</option></select>
					INCLUIR LOTE Y VENCIMIENTO <br>
				</div>
			</div>
		<div class="row" style=" border: solid 1px; margin-top: 15px;  padding-bottom: 15px">
			<div class="col-xs-12 adicionales">
				<table class="table">
					<tr>
						<th colspan="6" style='text-align: center;'>EL ENVASE CONTIENE ALGO DE ESTA LISTA? <select name="edulcorantes" class="autollenado"><option value='0'>no</option><option value='1'>si</option></select></th>
					</tr>
					<tr>
						<td>Acelsufamo </td>
						<td>Neotamo </td>
						<td>Tagatosa </td>
						<td>Hidrolizados almidon </td>
						<td>Sorbitol </td>
						<td>Stevia, Splenda</td>
						<td>Azucar mascabado </td>
					</tr>
					<tr>
						<td>Manitol </td>
						<td>Xilitol </td>
						<td>Lactitol </td>
						<td>Isomaltol </td>
						<td>Maltitol </td>
						<td>Eritritol </td>
						<td>Fruta del Monje </td>
					</tr>
					<tr>
						<td>Sacarina </td>
						<td>Aspartame </td>
						<td>Taumatina </td>
						<td>Alitame </td>
						<td>Neotame </td>
						<td>Sucralosa </td>
						<td>Sirope de agabe </td>
					</tr>
					<tr>
						<td>Advantame </td>
						<td>Glucósidos de esteviol</td>
						<td>Jarabe de Poliglicitol</td>
						<td>Neohesperidina</td>
						<td>Ciclamato</td>
						<td>Dehidrochalcona </td>
						<td>Azucar refinada </td>
					</tr>
				</table>
			</div>
		</div>			
			<div class="row">
				<div class="tab_adicionales"> Informacion Adicional</div>
				<div class="contenedor_adicionales" hidden>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Acido Folico µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="af"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="afP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Acido Pantotenico mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="ap"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="apP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Calcio mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="cal"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="calP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Cobre µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="cob"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="cobP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Cromo µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="cro"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="croP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Fluor mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="flu"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="fluP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Fosforo mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="fos"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="fosP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Hierro mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="hie"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="hieP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Iodo µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="iod"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="iodP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Magnesio mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="mag"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="magP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Niacina mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="nia"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="niaP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Potasio mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="pot"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="potP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Selenio µg <span class="pull-right">%</span></b></div> 
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="sel"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="selP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina A µg <span class="pull-right">%</span></b></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="va"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vaP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina B µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vbP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina B1 µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb1"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb1P"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina B2 µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb2"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb2P"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina B3 µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb3"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb3P"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina B6 µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb6"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb6P"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina B12 µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb12"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vb12P"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina C µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vc"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vcP"></div>
					</div>
					
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina D µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vd"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vdP"></div>
					</div>
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina D3 µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vd3"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vd3P"></div>
					</div>
					
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina E µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="ve"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="veP"></div>
					</div>
					
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Vitamina K µg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vk"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="vkP"></div>
					</div>
					
					<div class="col-xs-3">
						<div class="col-xs-12"><b>Zinc mg <span class="pull-right">%</span></b> </div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="zin"></div>
						<div class="col-xs-6"><input type="text" class="form-control input-sm autollenado" name="zinP"></div>
					</div>
					
					
					
				</div>
			</div>
		</div>
	</div>
</div>
</form>

<div class="col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading"> Etiqueta </div>
		<div class="panel-body div_etiqueta" style="background-color: white;">
		</div>
	</div>
</div>