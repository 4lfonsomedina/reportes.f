<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading"> CATALOGO DE PRODUCTOS </div>
		<div class="panel-body" style="background-color: white; color: black">
			<table class="tabla_reportes tabla_seccion" hidden>
				<thead>
					<tr>
						<th style="background-color: white; ">Codigo</th>
						<th style="background-color: white; ">Producto</th>
						<th style="background-color: white; ">Neto</th>
						<th style="background-color: white; ">Tipo</th>
						<th style="background-color: white; ">Validado</th>
						<th style="background-color: white; ">Exento</th>
					</tr>
				</thead>
				<tbody>
					<? foreach($productos as $p){ ?>
						<tr class="tr_producto" codigo="<?= $p->codigo ?>">
							<th><?= $p->codigo ?></th>
							<th><?= $p->descripcion ?></th>
							<th><?= number_format($p->neto,1).$p->g_m ?></th>
							<th><?= $p->s_l ?></th>
							<th><?= $p->validado ?></th>
							<th><?= $p->exento ?></th>
						</tr>
					<? } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>