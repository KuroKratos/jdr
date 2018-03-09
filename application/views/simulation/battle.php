<style type="text/css">
  input {
    text-align: right;
  }
</style>

<?php for ($id = 1; $id <= 5; $id++) { ?>
<div class="col-sm-2">
  <div class="panel panel-default" style="background-color: #00000055; box-shadow: 0 0 5px black; border-color: white; border-radius: 0px;">
    <div class="panel-heading"><p class="panel-title">Personnage <?=$id?> <input type="checkbox" id="active_<?=$id?>" class="pull-right"></p></div>
    <div class="panel-body form-horizontal" style="color: white;">

      <!-- CHARACTER PERCENTILE STAT -->
      <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Points de Vie  </label><div class="col-sm-5"><input type="text" class="form-control" id="hp_<?=$id?>"      value="200"></div></div>
      <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Stat de toucher</label><div class="col-sm-5"><input type="text" class="form-control" id="percent_<?=$id?>" value="80" ></div></div>
      <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Dé d'attaque   </label><div class="col-sm-5"><input type="text" class="form-control" id="dice_<?=$id?>"    value="8"  ></div></div>
      <div class="form-group"><label class="control-label col-sm-7" for="percent" style="text-align: left;">Mod d'attaque  </label><div class="col-sm-5"><input type="text" class="form-control" id="mod_<?=$id?>"     value="2"  ></div></div>

    </div>
  </div>
</div>
<?php } ?>

<div class="col-sm-2">
  <div class="col-sm-12" style="margin-bottom: 20px"><button class="btn btn-default" id="" style="width: 100%"><div class="col-xs-2"><i class="fa fa-check-square"></i></div><div class="col-xs-10">Cocher tous       </div></button></div>
  <div class="col-sm-12"><button class="btn btn-default" id="" style="width: 100%"><div class="col-xs-2"><i class="fa fa-square"      ></i></div><div class="col-xs-10">Décocher tous     </div></button></div>
  <div class="col-sm-12"><button class="btn btn-default" id="" style="width: 100%"><div class="col-xs-2"><i class="fa fa-refresh"     ></i></div><div class="col-xs-10">Réinitialiser tout</div></button></div>
  <div class="col-sm-12"><button class="btn btn-default" id="" style="width: 100%"><div class="col-xs-2"><i class="fa fa-arrow-right" ></i></div><div class="col-xs-10">Lancer            </div></button></div>
</div>

<div class="col-sm-12">
  <div class="well well-sm" style="height: 450px;"></div>
</div>