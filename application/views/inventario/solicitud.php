<style type="text/css">
	.disable{
		pointer-events:none;
		background:grey;
	}
</style>
<div class="col-sm-2"></div>
<div class=" col-sm-8">
  <div class="panel panel-primary">
    <div class="panel panel-heading">
    	solicitudes de etiquetado 
    	<a class="btn btn-warning btn-xs pull-right" id="guardar_solicitud"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar solicitud</a>
    </div>
    <div class="panel panel-body" id="cuerpo_panel">
      <div class="row">
        <div class="col-sm-4">
          Solicita:
            <input type="text" name="solicitante" class="form-control" id="solicitante">
        </div>
        <div class="col-sm-3">
          Calidad de etiqueta
            <select name="etiqueta" class="form-control">
              <option value="PREMIUM"> PREMIUM </option>
              <option value="ECONOMICO"> ECONOMICA </option>
            </select>
        </div>
        <div class="col-sm-3">
          Sucursal
            <select name="sucursal" class="form-control">
              <option value="1"> Brasil </option>
              <option value="2"> San Marcos </option>
              <option value="3"> GastroShop </option>
            </select>
        </div>
      </div>
      <hr>
      <div class="row">
      	<form id="form_sol_imp">
      		<input type="hidden" disabled="true" class="form-control" id="sol_validado">
	        <div class="col-sm-3">
	          #producto
	            <input type="text" class="form-control" id="sol_producto">
	        </div>
	       </form>
	        <div class="col-sm-6">
	          Descripcion
	            <input type="text" disabled="true" class="form-control" id="sol_descripcion">
	        </div>
	        <form id="form_sol_imp2">
	        <div class="col-sm-2">
	          Cantidad
	            <input type="number" class="form-control" id="sol_cantidad" value="1">
	        </div>
	      	</form>
	        <div class="col-sm-1">
	          <br>
	          <button class="btn btn-primary pull-right" id="agregar_producto_btn">Agregar</button>
	        </div>

      </div>
      <hr>
      <div class="row" style="overflow-y: auto;">
        <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
              	<th></th>
	              <th>#Codigo</th>
	              <th>Descripcion</th>
	              <th>Cantidad</th>
	              <th></th>
            	</tr>
            </thead>
            <tbody class="tbody_productos" style="height: 40vh;">
            	
            </tbody>
            <tfoot>
            	<tr>
            		<td colspan="5">
            			Los productos con este simbolo <i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i> Deben de separarse y enviarse a Brasil para su validación.
            		</td>
            	</tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>  
</div>