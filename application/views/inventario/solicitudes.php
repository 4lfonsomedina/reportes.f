<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#Spendientes">Pendientes</a></li>
  <li><a data-toggle="tab" href="#Sfinalizados">Finalizados</a></li>
</ul>



<div class="tab-content">

<div id="Spendientes" class="tab-pane fade in active"><br><br>
<?php foreach($solicitudes as $s)if($s->full==0){ $panel = "primary"; if($s->estatus==1){$panel="default";}?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-<?= $panel ?>">
      <div class="panel-heading cabecera_solicitud">
        <div class="row">
          <div class="col-xs-4">
            <?= dame_fecha($s->fecha) ?>
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <?= folio_solicitud($s->id_solicitud) ?>
          </div>
          <div class="col-xs-4" style="text-align: right; color: green;" id="full_solicitud_<?= $s->id_solicitud ?>" <?php if($s->full==0){ echo "hidden";}?> >
            <i class="fa fa-check" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <div class="panel-body cuerpo_solicitud" hidden>
        <div class="row">
          <div class="col-xs-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>cantidad</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($s->detalles as $d){?>
                <tr>
                  <td><a href="#" class="tr_producto" target="_blank" codigo="<?= $d->codigo ?>"><?= $d->codigo ?></a></td>
                  <td><?= $d->descripcion ?> <?php if($d->validado){ ?><i class="fa fa-star" aria-hidden="true"></i><?php } ?></td>
                  <td><?= $d->cantidad ?></td>
                  <td><input type="checkbox" class="check_solicitud" id_sol_det='<?= $d->id_sol_det ?>' <?php if($d->check==1){echo "checked";} ?>></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col-xs-4">
            <?= $s->solicitante ?>
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <?php $etiqueta = "primary"; if($s->etiqueta=="PREMIUM"){ $etiqueta="warning"; }?>
            <div class="label label-<?= $etiqueta ?>"><?= $s->etiqueta ?></div>
          </div>
          <div class="col-xs-4">
            <span class="pull-right"><?= dame_sucursal($s->sucursal) ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
 </div>



<div id="Sfinalizados" class="tab-pane fade in"><br><br>
<?php foreach($solicitudes as $s)if($s->full==1){ $panel = "primary"; if($s->estatus==1){$panel="default";}?>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-<?= $panel ?>">
      <div class="panel-heading cabecera_solicitud">
        <div class="row">
          <div class="col-xs-4">
            <?= dame_fecha($s->fecha) ?>
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <?= folio_solicitud($s->id_solicitud) ?>
          </div>
          <div class="col-xs-4" style="text-align: right; color: green;" id="full_solicitud_<?= $s->id_solicitud ?>" <?php if($s->full==0){ echo "hidden";}?> >
            <i class="fa fa-check" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <div class="panel-body cuerpo_solicitud" hidden>
        <div class="row">
          <div class="col-xs-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>cantidad</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($s->detalles as $d){?>
                <tr>
                  <td><a href="#" class="tr_producto" target="_blank" codigo="<?= $d->codigo ?>"><?= $d->codigo ?></a></td>
                  <td><?= $d->descripcion ?> <?php if($d->validado){ ?><i class="fa fa-star" aria-hidden="true"></i><?php } ?></td>
                  <td><?= $d->cantidad ?></td>
                  <td><input type="checkbox" class="check_solicitud" id_sol_det='<?= $d->id_sol_det ?>' <?php if($d->check==1){echo "checked";} ?>></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      <div class="panel-footer">
        <div class="row">
          <div class="col-xs-4">
            <?= $s->solicitante ?>
          </div>
          <div class="col-xs-4" style="text-align: center;">
            <?php $etiqueta = "primary"; if($s->etiqueta=="PREMIUM"){ $etiqueta="warning"; }?>
            <div class="label label-<?= $etiqueta ?>"><?= $s->etiqueta ?></div>
          </div>
          <div class="col-xs-4">
            <span class="pull-right"><?= dame_sucursal($s->sucursal) ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
</div>