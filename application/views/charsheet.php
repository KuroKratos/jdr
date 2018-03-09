<?php $c = $character[0] ?? null; ?>
  
<script type="text/javascript">
  global = <?= json_encode($c) ?>;
</script>

<div class="row" id="charsheet">

  <div class="col-sm-6 col-md-7 col-lg-9">
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="pull-right">( <img src="<?= assets_url('images/enter_key.png') ?>" class="img-responsive" style="height: 20px; display: inline"> pour enregistrer )</span>
            <h4 class="panel-title"><a data-toggle="collapse" href="#collapse0" class="pull-left"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;Vie et Mana</h4>
          </div>
          <div class="panel-collapse collapse in" id="collapse0">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="row">
                    <div class="col-xs-6 pull-left">
                      <label>Points de Vie</label>
                    </div>
                    <div class="col-xs-6 pull-right text-right">
                      <input type="text" id="hp_cur" class="input-underline char_val" style="width: 30%; text-align: center; border-right: none !important; padding-top:1px;"><span class="hp_pp_slash">/</span><input type="text" id="hp_max" class="input-underline char_val" style="border-left: none !important; width: 30%; text-align: center;  padding-top:1px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="progress progress-striped skill-bar hp-bar" style="margin-bottom: 0; margin-top: 10px;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $c['hp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['hp_max'] ?>" id="hp_bar"></div>
                        <span class="skill">
                          <span class="lbl">PV</span>
                          <i class="val" id="hp_lbl"><?= ($c['hp_cur'] . "/" . $c['hp_max']) ?></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <hr class="visible-xs visible-sm">
                  <div class="row">
                    <div class="col-xs-6 pull-left">
                      <label>Points de Mana</label>
                    </div>
                    <div class="col-xs-6 pull-right text-right">
                      <input type="text" id="pp_cur" class="input-underline char_val" style="width: 30%; text-align: center; border-right: none !important; padding-top:1px;"><span class="hp_pp_slash">/</span><input type="text" id="pp_max" class="input-underline char_val" style="width: 30%; text-align: center; border-left: none !important; padding-top:1px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="progress progress-striped skill-bar pp-bar" style="margin-bottom: 0; margin-top: 10px;">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $c['pp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['pp_max'] ?>" id="pp_bar"></div>
                        <span class="skill">
                          <span class="lbl">PM</span>
                          <i class="val" id="pp_lbl"><?= ($c['pp_cur'] . "/" . $c['pp_max']) ?></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="pull-right">( <img src="<?= assets_url('images/enter_key.png') ?>" class="img-responsive" style="height: 20px; display: inline"> pour enregistrer )</span>
            <h4 class="panel-title"><a data-toggle="collapse" href="#collapse2" class="pull-left"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;Personnage</h4>
          </div>
          <div class="panel-collapse collapse in" id="collapse2">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6"><label class="char">Nom</label><input    type="text" id="name"  class="input-underline char_val" disabled></div>
                <div class="col-sm-6"><label class="char">Niveau</label><input type="text" id="level" class="input-underline char_val" disabled></div>
              </div>
              <div class="row">
                <div class="col-sm-6"><label class="char">Race</label><input   type="text" id="race"  class="input-underline char_val" disabled></div>
                <div class="col-sm-6"><label class="char">Classe</label><input type="text" id="class" class="input-underline char_val" disabled></div>
              </div>
              <div class="row" style="margin-top:15px; margin-bottom: 15px;">
                <div class="col-sm-12"><label>Réputations :    </label><input type="text" id="traits"  class="input-underline char_val" style="width: 100%; margin: 0;"></div>
              </div>
              <div class="col-xs-9 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">PENCHANT LUMIÈRE / OMBRE</div>
              <div class="col-xs-3 text-righto" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_ali_<?= $c['char_id'] ?>">
                <input type="text" class="input-underline text-center carac char_val" value="<?= $c['alignement'] ?>" style="width: 100%; text-align: center !important;" id="alignement" disabled>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="progress progress-striped" style="/*box-shadow: 0px 0px 10px #000000;*/ margin-top:12px; margin-bottom: 10px; border: 1px solid #888888;">
                    <div class="progress-bar progress-bar-warning" id="bar_light" role="progressbar" style="font-size: large; width:<?= $c['alignement'] ?>%; background-color: #eebb33; text-align: center; line-height:33px; text-shadow: 1px 1px 3px black;">
                      <b>Lumière</b>
                    </div>
                    <div class="progress-bar progress-bar-success" id="bar_dark"  role="progressbar" style="font-size: large; width:<?= (100 - $c['alignement']) ?>%; background-color: #000033; text-align: center; line-height:33px;">
                      <b>Ombre</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="pull-right">( <img src="<?= assets_url('images/enter_key.png') ?>" class="img-responsive" style="height: 20px; display: inline"> pour enregistrer )</span>
            <h4 class="panel-title">Caractéristiques</h4>
          </div>
          <div class="panel-body">

            <div class="row" style="margin-bottom: 10px;">

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">FORC</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_str_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['strength'] ?>%" style="width: 100%; text-align: center !important;" id="strength">
                </div>
              </div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">INTEL</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_int_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['intelligence'] ?>%" style="width: 100%; text-align: center !important;" id="intelligence">
                </div>
              </div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">ENDU</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_con_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['constitution'] ?>%" style="width: 100%; text-align: center !important;" id="constitution">
                </div>
              </div>

            </div>

            <div class="row" style="margin-bottom: 10px;">

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">DEXT</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_dex_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['dexterity'] ?>%" style="width: 100%; text-align: center !important;" id="dexterity">
                </div>
              </div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CONN</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_edu_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['education'] ?>%" style="width: 100%; text-align: center !important;" id="education">
                </div>
              </div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CHAR</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_cha_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['charisma'] ?>%" style="width: 100%; text-align: center !important;" id="charisma">
                </div>
              </div>

            </div>

            <div class="row" style="margin-bottom: 10px;">

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CHAN</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_luk_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['luck'] ?>%" style="width: 100%; text-align: center !important;" id="luck">
                </div>
              </div>

              <div class="col-xs-4"></div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">PERC</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_per_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['perception'] ?>%" style="width: 100%; text-align: center !important;" id="perception">
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xs-4"></div>

              <div class="col-xs-4">
                <div class="col-xs-12 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_gld_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center char_val" value="<?= $c['gold'] ?>" style="width: 100%; text-align: center !important;" id="gold"> <span class="po_label">PO</span>
                </div>
              </div>

              <div class="col-xs-4"></div>

            </div>

          </div>
        </div>
      </div>
    </div>

    
  </div>

  <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 pull-right">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class='pull-right'><kbd>Ctrl</kbd> + <kbd>S</kbd> ou cliquer <i class="fa fa-arrow-right"></i> <button class='btn btn-default btn-xs' id="save_story"><i class="fa fa-save"></i></button></span>
            <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1" class="pull-left"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;Histoire</h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
              <textarea id="story" class="form-control" style="width: 100%; min-height: 100%; resize: none;" rows="8"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <button class="btn btn-success btn-xs pull-right" onclick="open_modal('add_edit_item')"><i class="fa fa-plus"></i></button>
            <h4 class="panel-title">Inventaire</h4>
          </div>
          <div class="panel-body" style="padding: 0; max-height: 346px; overflow-y: scroll; overflow-x: hidden;">
            <!--<textarea id="inventory" class="form-control" style="width: 100%; min-height: 100%; resize: none;" rows="8"></textarea>-->
            <table class='table table-striped table-hover table-condensed table-bordered' id='inv_table' cellspacing='0' width='100%' style="margin: -1px 0 -1px 0 !important; border-radius: 0 0 3px 3px">
              <thead>
                <tr>
                  <th></th>
                  <th>Nom</th>
                  <th>Desc.</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="clearfix"></div>
  
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <button class="btn btn-success btn-xs pull-right" onclick="open_modal('add_edit_skill')"><i class="fa fa-plus"></i></button>
          <h4 class="panel-title">Dons de <?= $c['name'] ?></h4>
        </div>
        <div class="panel-body" style="padding:0;">
          <table class='table table-striped table-hover table-condensed' id='skill_table' cellspacing='0' width='100%'>
            <thead>
              <tr>
                <th>Don</th>
                <th>Coût</th>
                <th>Effet</th>
                <th style="width:5px;">Modif.</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="add_edit_skill" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Ajouter un don</h4></div>
      <div class="modal-body">
        <input type="hidden" id="skill_id" value="-1">
        <div class="row">
          <div class="col-sm-8"><label>Nom du don</label><input type="text" class="form-control"  id="skill_name"></div>
          <div class="col-sm-4"><label>Coût du don</label><input type="text" class="form-control" id="skill_cost"></div>
        </div>
        <hr>
        <label>Description du don</label><input type="text" class="form-control" id="skill_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_skill()"                        ><i class="fa fa-save"  ></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_edit_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Ajouter / Modifier un objet</h4></div>
      <div class="modal-body">
        <input type="hidden" id="item_id" value="-1">
        <div class="row">
          <div class="col-sm-8"><label>Nom de l'objet</label><input type="text" class="form-control"  id="item_name"></div>
          <div class="col-sm-4"><label>Quantité</label><input type="text" class="form-control" id="item_qty"></div>
        </div>
        <hr>
        <label>Description / Effets</label><input type="text" class="form-control" id="item_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_item_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_item()"                        ><i class="fa fa-save"  ></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_skill" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Supprimer un don</h4></div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer le don <i id="delete_skill_name"></i> ?</p>
        <input type="hidden" value="" id="delete_skill_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_skill()"                         ><i class="fa fa-check"  ></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Supprimer un objet</h4></div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer l'objet <b><i id="delete_item_name"></i></b> ?</p>
        <input type="hidden" value="" id="delete_item_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_item()"                          ><i class="fa fa-check"  ></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var skill_table;
  var item_table;

  $(document).ready(function () {

    // Progress bars animation
    $('.progress .progress-bar').css("width",
      function() {
        return ( ( parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax")) ) * 100 )  + "%";
      }
    );

    // Catch ENTER pressed in caracteristics inputs
    $('.char_val').keyup(function (k) {
      if (k.keyCode == 13) {
        var input = $(this);
        save_char_carac(input);
      }
    });

    // Prevents the deletion of the '%' character in stats inputs
    $('.carac').keydown(function () {
      var field = $(this);
      var oldval   = field.val();
      setTimeout( function () {
        var true_val = field.val().substring(0, field.val().length - 1);
        if(field.val().slice(-1) != '%' || isNaN(true_val) || parseInt(true_val) < 0 || parseInt(true_val) > 100) {
          field.val(oldval);
          field[0].setSelectionRange(oldval.length-1, oldval.length-1);
        }
      }, 1);
    });

    // Destroys any datatable, just in case
    if( $.fn.DataTable.isDataTable('#skill_table') ) {
      $('#skill_table').dataTable().fnDestroy();
    }
    if( $.fn.DataTable.isDataTable('#inv_table') ) {
      $('#inv_table').dataTable().fnDestroy();
    }

    // Generates skills datatable
    skill_table = $("#skill_table").DataTable({
      ajax:           "<?= base_url("/Ajax/getCharSkill/".$c['char_id']) ?>",
      info:           false,
      filter:         false,
      paging:         false,
      scroller:       false,
      scrollCollapse: false,
      sort:           false,
      autoWidth:      false,
      responsive: {
        details:    {
                      display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                          var data = row.data();
                          return 'Details for '+data[0]+' '+data[1];
                        }
                      }),
                      renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                      })
                    }
                  },
      columns:  [
                  {data: "name"},
                  {data: "worth"},
                  {data: "effect"},
                  {data: "edit"}
                ]
    });

    // Generates inventory datatable
    item_table = $("#inv_table").DataTable({
      ajax:           "<?= base_url("/Ajax/getCharInventory/".$c['char_id']) ?>",
      info:           false,
      filter:         false,
      paging:         false,
      scroller:       false,
      scrollCollapse: false,
      sort:           true,
      autoWidth:      false,
      responsive: {
        details:    {
                      display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                          var data = row.data();
                          return 'Details for '+data[0]+' '+data[1];
                        }
                      }),
                      renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                      })
                    }
                  },
      columns:  [
                  {data: "quantity"},
                  {data: "name"},
                  {data: "description"},
                  {data: "edit"}
                ]
    });

    // Set stats values into inputs
    $.each(global, function (index, value) {
      $('#'+index).val(value);
    });

    // Set '%' character at the end of stats inputs
    $('.carac').each(function (index) {
      if($(this).attr('id') != "gold") {
        $(this).val($(this).val() + '%');
      }
    });

    // Refresh GM-set stats every 3 seconds (currently Level and Light/Dark bar)
    refresh_stats();
    setInterval(
      function () { refresh_stats(); },
      3000
    );

  });

  // Update skill (id, name, description, cost)
  function edit_skill (id) {
    $.ajax({
      data: {
        skill_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: "<?= base_url("/Ajax/getSkillInfo") ?>",
      success: function(data){
        $('#skill_id').val(data.skill_id);
        $('#skill_name').val(data.name);
        $('#skill_cost').val(data.worth);
        $('#skill_desc').val(data.effect);
        open_modal('add_edit_skill');
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  // Update item (id, name, description, quantity)
  function edit_item (id) {
    $.ajax({
      data: {
        item_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: "<?= base_url("/Ajax/getItemInfo") ?>",
      success: function(data){
        $('#item_id').val(data.item_id);
        $('#item_name').val(data.name);
        $('#item_qty').val(data.quantity);
        $('#item_desc').val(data.description);
        open_modal('add_edit_item');
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  // Open any modal and closes any other
  function open_modal(id) {
    $('.modal').modal('hide');
    $('#'+id).modal('show');
  }

  // Clear inputs of add_edit_skill modal
  function reset_skill_modal () {
    $('#skill_id').val('-1');
    $('#skill_name').val('');
    $('#skill_cost').val('');
    $('#skill_desc').val('');
    close_modal("add_edit_skill");
  }

  // Clear inputs of add_edit_item modal
  function reset_item_modal () {
    $('#item_id').val('-1');
    $('#item_name').val('');
    $('#item_qty').val('');
    $('#item_desc').val('');
    close_modal("add_edit_item");
  }

  function close_modal(id = null) {
    if(id == null) {
      $('.modal').modal('hide');
    }
    else {
      $("#"+id).modal('hide');
    }
  }

  function prompt_delete_skill (id) {
    $.ajax({
      data: {
        skill_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: "<?= base_url("/Ajax/getSkillInfo") ?>",
      success: function(data){
        console.log(data);
        $('#delete_skill_name').html(data.name);
        $('#delete_skill_confirm').val(id);
        open_modal("delete_skill");
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  function prompt_delete_item (id) {
    $.ajax({
      data: {
        item_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: "<?= base_url("/Ajax/getItemInfo") ?>",
      success: function(data){
        console.log(data);
        $('#delete_item_name').html(data.name);
        $('#delete_item_confirm').val(id);
        open_modal("delete_item");
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  function delete_skill () {
    $.ajax({
      data: {
        skill_id: $('#delete_skill_confirm').val()
      },
      type: "POST",
      async: false,
      url: "<?= base_url("/Ajax/deleteSkill") ?>",
      success: function(data){
        close_modal();
        skill_table.ajax.reload();
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  function delete_item () {
    $.ajax({
      data: {
        item_id: $('#delete_item_confirm').val()
      },
      type: "POST",
      async: false,
      url: "<?= base_url("/Ajax/deleteItem") ?>",
      success: function(data){
        close_modal();
        item_table.ajax.reload();
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  function add_edit_skill() {
    if($('#skill_name').val() != '' && $('#skill_desc').val() != '' && $('#skill_cost').val() != '') {
      $.ajax({
        data: {
          char_id: global.char_id,
          id:      $('#skill_id').val(),
          name:    $('#skill_name').val(),
          desc:    $('#skill_desc').val(),
          cost:    $('#skill_cost').val()
        },
        type: "POST",
        async: false,
        url: "<?= base_url("/Ajax/addEditSkill") ?>",
        success: function(data){
          skill_table.ajax.reload();
          reset_skill_modal();
        },
        error: function(e, d, l){
          console.log(e);
        }
      });
    }
  }

  function add_edit_item() {
  if($('#item_name').val() != '' && $('#item_desc').val() != '' && $('#item_qty').val() != '') {
      $.ajax({
        data: {
          char_id: global.char_id,
          id:      $('#item_id').val(),
          name:    $('#item_name').val(),
          desc:    $('#item_desc').val(),
          qty:     $('#item_qty').val()
        },
        type: "POST",
        async: false,
        url: "<?= base_url("/Ajax/addEditItem") ?>",
        success: function(data){
          item_table.ajax.reload();
          reset_item_modal();
        },
        error: function(e, d, l){
          console.log(e);
        }
      });
    }
  }

  function refresh_stats() {
    $.ajax({
      data: {
        char_id: '<?= $c['char_id'] ?>',
        columns: ['alignement','level']
      },
      type: "POST",
      dataType: "json",
      async: false,
      url: "<?= base_url("/Ajax/getCharInfo") ?>",
      success: function(data){
        $('#alignement').val(data.alignement + '%');
        $('#level').val(data.level);
        $('#bar_light').css('width',data.alignement + '%');
        $('#bar_dark' ).css('width',(100-data.alignement) + '%');
      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }

  function change_bar_val(cur, max, which) {
    $('#'+which+'_bar').attr('aria-valuenow', cur);
    $('#'+which+'_bar').attr('aria-valuemax', max);
    $('#'+which+'_lbl').html(cur + '/' + max);

    $('.progress .progress-bar').css("width",
      function() {
        return ( ( parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax")) ) * 100 )  + "%";
      }
    );
  }

  function change_comp (id, sign) {
    var field = $('#comp_val_'+id);
    var newval;

    if(sign == "+") {
      newval = parseInt(field.html()) + 5;
    }
    else {
      newval = parseInt(field.html()) - 5;
    }

    var send_sign = sign == "+" ? "plus" : "minus";

    $.post('<?= base_url("/Ajax/changeCompVal/") ?>' + global.char_id + '/' + id + '/' + send_sign);

    field.html(newval);
  }

function save_char_carac (input) {
  var old_bg = input.css('background-color');

  $.ajax({
    data: {
      char_id: global.char_id,
      column:  input.attr('id'),
      value:   input.val().replace('%','')
    },
    type: "POST",
    async: false,
    url: '<?= base_url('/Ajax/updateChar') ?>',
    success: function(data){
      input.css('background-color',"lightgreen");
      setTimeout( function () {
        input.css('background-color', old_bg);
      }, 500);
      input.blur();

      if(input.attr('id').match('hp')) {
        change_bar_val( $('#hp_cur').val() , $('#hp_max').val() , 'hp' );
      }

      if(input.attr('id').match('pp')) {
        change_bar_val( $('#pp_cur').val() , $('#pp_max').val() , 'pp' );
      }

    },
    error: function(e, d, l){
      console.log(e);
    }
  });
}

$('#save_story').click(function () {
	var input = $('#story');
	save_char_carac (input);
});

$('#save_inventory').click(function () {
	var input = $('#inventory');
	save_char_carac (input);
});

$('#inventory').bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
	var input = $('#inventory');
	save_char_carac (input);
    return false;
  }
  
});

$('#story').bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
	var input = $('#story');
	save_char_carac (input);
    return false;
  }
});  

$(document).bind('keydown', function(e) {
  if(e.ctrlKey && (e.which == 83)) {
    e.preventDefault();
    return false;
  }
});
</script>