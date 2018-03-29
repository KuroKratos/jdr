<?php $c = $character[0] ?? null; ?>

<script type="text/javascript">
  char = <?= json_encode($c) ?>;
</script>

<!-- CHARACTER SHEET -->
<div class="row mt-2" id="charsheet">
  <div class="col-md-6 col-lg-7 col-xl-9">

  <!-- HEALTH AND MANA -->
    <div class="row mb-4">
      <div class="col-12 char_panel">
        <div class="card z-depth-3 text-white elegant-color md-form mt-0">
          <div class="card-header"> <span class="float-right"><kbd>&crarr;</kbd> pour enregistrer</span>
            <p class=""><a data-toggle="collapse" href="#collapse0" class="float-left"><i class="fa fa-eye"></i></a>&#xA0;&#xA0;Vie et Mana</p>
          </div>
          <div class="panel-collapse collapse show" id="collapse0">
            <div class="card-body p-2">
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <div class="row px-2">
                    <div class="col-8 float-left">Points de Vie</div>
                    <div class="col-4 float-right text-right">
                      <input type="text" id="hp_cur" class="char_val" style="width: 30%; text-align: center; border-right: none !important; padding-top:1px;">
                      <span class="">/</span>
                      <input type="text" id="hp_max" class="char_val" style="border-left: none !important; width: 30%; text-align: center;  padding-top:1px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="progress skill-bar hp-bar" style="margin: 3px; border: 1px solid black; height:25px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="hp_bar"></div> <span class="skill">
                          <span class="lbl">PV</span>
                          <i class="val" id="hp_lbl"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-6">
                  <hr class="d-block d-sm-none d-block d-md-none">
                  <div class="row px-2">
                    <div class="col-8 float-left">Points de Mana</div>
                    <div class="col-4 float-right text-right">
                      <input type="text" id="pp_cur" class="char_val" style="width: 30%; text-align: center; border-right: none !important; padding-top:1px;">
                      <span class="">/</span>
                      <input type="text" id="pp_max" class="char_val"
                             style="width: 30%; text-align: center; border-left: none !important; padding-top:1px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="progress skill-bar pp-bar" style="margin: 3px; border: 1px solid black; height:25px;">
                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="pp_bar"></div> <span class="skill">
                          <span class="lbl">PM</span>
                          <i class="val" id="pp_lbl"></i>
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
  <!-- /HEALTH AND MANA -->

    <div class="row mb-4">

    <!-- SUMMARY -->
      <div class="col-lg-12 col-xl-6 char_panel">
        <div class="card z-depth-3 text-white elegant-color md-form" style="margin-top: 0;">
          <div class="card-header"> <span class="float-right"><kbd>&crarr;</kbd> pour enregistrer</span>
            <p class=""><a data-toggle="collapse" href="#collapse2" class="float-left"><i class="fa fa-eye"></i></a>&#xA0;&#xA0;Personnage</p>
          </div>
          <div class="panel-collapse collapse show" id="collapse2">
            <div class="card-body p-2">
              <div class="row">
                <div class="col-md-6">
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">NOM</div>
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">
                    <input type="text" id="name" class="char_val" style="width: 100%; text-align: center !important;" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">NIVEAU</div>
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">
                    <input type="text" id="level" class="char_val" style="width: 100%; text-align: center !important;" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">RACE</div>
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">
                    <input type="text" id="race" class="char_val" style="width: 100%; text-align: center !important;" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">CLASSE</div>
                  <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">
                    <input type="text" id="class" class="char_val" style="width: 100%; text-align: center !important;" disabled>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top:15px; margin-bottom: 15px;">
                <div class="col-md-12">
                  <div class="col-12 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">RÉPUTATIONS</div>
                  <div class="col-12 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">
                    <input type="text" id="traits" class="char_val" style="width: 100%; text-align: center !important;">
                  </div>
                </div>
              </div>
              <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">PENCHANT OMBRE / LUMIÈRE</div>
              <div class="col-6 pull-left text-center" style="font-weight: bold; font-size: 14px; padding: 5px;">
                <input type="text" id="alignement" class="char_val" style="width: 100%; text-align: center !important;" disabled>
              </div>
                <div class="progress" style="margin: 3px; border: 1px solid black; height:25px;">
                  <div class="progress-bar progress-bar-striped progress-bar-warning" id="bar_light" role="progressbar" style="font-size: large; width:50%; background-color: #eebb33; text-align: center; line-height:33px; text-shadow: 1px 1px 3px black;"> <b>Lumi&#xE8;re</b>
                  </div>
                  <div class="progress-bar progress-bar-striped progress-bar-success" id="bar_dark" role="progressbar" style="font-size: large; width:50%; background-color: #000033; text-align: center; line-height:33px;"> <b>Ombre</b>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <!-- /SUMMARY -->

    <!-- CHARACTERISTICS -->
      <div class="col-lg-12 col-xl-6 char_panel">
        <div class="card z-depth-3 text-white elegant-color md-form" style="margin-top:0;">
          <div class="card-header"> <span class="float-right"><kbd>&crarr;</kbd> pour enregistrer</span>
            <p class="">Caract&#xE9;ristiques</p>
          </div>
          <div class="card-body p-2">
            <div class="row mb-4 mt-3">
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">FORC</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_str">
                  <input type="text" class="carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="strength">
                </div>
              </div>
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">INTEL</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_int">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="intelligence">
                </div>
              </div>
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">ENDU</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_con">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="constitution">
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">DEXT</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_dex">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="dexterity">
                </div>
              </div>
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">CONN</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_edu">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="education">
                </div>
              </div>
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">CHAR</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_cha">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="charisma">
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">CHAN</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_luk">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="luck">
                </div>
              </div>
              <div class="col-4"></div>
              <div class="col-4">
                <div class="col-6 pull-left text-center"           style="font-weight: bold; font-size: 14px; padding: 5px;">PERC</div>
                <div class="col-6 pull-left text-center text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_per">
                  <input type="text" class="text-center carac char_val" value="50%" style="width: 100%; text-align: center !important;" id="perception">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4"></div>
              <div class="col-4">
                <div class="col-12 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_gld">
                  <input type="text" class="text-center char_val" value="0" style="width: 100%; text-align: center !important;" id="gold"> <span class="po_label">PO</span>
                </div>
              </div>
              <div class="col-4"></div>
            </div>
          </div>
        </div>
      </div>
    <!-- /CHARACTERISTICS -->

    </div>
  </div>
  <div class="col-xl-3 float-right mb-4">

  <!-- STORY -->
    <div class="row mb-4">
      <div class="col-lg-12 char_panel">
        <div class="card z-depth-3 text-white elegant-color">
          <div class="card-header"> <span class="float-right"><kbd>Ctrl</kbd> + <kbd>S</kbd> ou cliquer <i class="fa fa-arrow-right"></i> <button class="btn btn-secondary btn-xs" id="save_story"><i class="fa fa-save"></i></button></span>
            <p class=""><a data-toggle="collapse" href="#collapse1" class="float-left"><i class="fa fa-eye"></i></a>&#xA0;&#xA0;Histoire</p>
          </div>
          <div id="collapse1" class="panel-collapse collapse">
            <div class="card-body p-2">
              <textarea id="story" class="form-control" style="width: 100%; min-height: 100%; resize: none;" rows="8"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /STORY -->

  <!-- INVENTORY -->
    <div class="row">
      <div class="col-lg-12 char_panel">
        <div class="card z-depth-3 text-white elegant-color">
          <div class="card-header">
            <button class="btn btn-success btn-xs float-right" onclick="open_modal('add_edit_item')"><i class="fa fa-plus"></i>
            </button>
            <p class="">Inventaire</p>
          </div>
          <div class="card-body scrollbar-black" style="padding: 0; max-height: 313px; overflow-y: auto; overflow-x: hidden;">
            <table class="table table-striped table-hover table-sm" id="inv_table" cellspacing="0" width="100%" style="margin: -1px 0 -1px 0 !important; border-radius: 0 0 3px 3px">
              <thead>
                <tr>
                  <th></th>
                  <th>Nom</th>
                  <th>Desc</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  <!-- /INVENTORY -->

  </div>
  <div class="clearfix"></div>

<!-- SKILLS -->
  <div class="col-lg-12 char_panel">
    <div class="card z-depth-3 text-white elegant-color">
      <div class="card-header">
        <button class="btn btn-success btn-xs float-right" onclick="open_modal('add_edit_skill')"><i class="fa fa-plus"></i>
        </button>
        <p class="">Dons de <span class="name">---</span></p>
      </div>
      <div class="card-body scrollbar-black" style="padding:0; overflow-y: auto; max-height: 280px; overflow-x: hidden;">
        <table class="table table-striped table-hover table-sm" id="skill_table" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Don</th>
              <th>Co&#xFB;t</th>
              <th>Effet</th>
              <th style="width:5px;">Modif.</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
<!-- /SKILLS -->

</div>
<!-- /CHARACTER SHEET -->

<!-- SKILL ADD/EDIT MODAL -->
<div class="modal fade" id="add_edit_skill" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Ajouter un don</p>
      </div>
      <div class="modal-body">
        <input type="hidden" id="skill_id" value="-1">
        <div class="row">
          <div class="col-md-8">
            <label>Nom du don</label>
            <input type="text" class="form-control" id="skill_name">
          </div>
          <div class="col-md-4">
            <label>Co&#xFB;t du don</label>
            <input type="text" class="form-control" id="skill_cost">
          </div>
        </div>
        <hr>
        <label>Description du don</label>
        <input type="text" class="form-control" id="skill_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_skill()"><i class="fa fa-save"></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /SKILL ADD/EDIT MODAL -->

<!-- ITEM ADD/EDIT MODAL -->
<div class="modal fade" id="add_edit_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Ajouter / Modifier un objet</p>
      </div>
      <div class="modal-body">
        <input type="hidden" id="item_id" value="-1">
        <div class="row">
          <div class="col-md-8">
            <label>Nom de l&apos;objet</label>
            <input type="text" class="form-control" id="item_name">
          </div>
          <div class="col-md-4">
            <label>Quantit&#xE9;</label>
            <input type="text" class="form-control" id="item_qty">
          </div>
        </div>
        <hr>
        <label>Description / Effets</label>
        <input type="text" class="form-control" id="item_desc">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_item_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> Annuler</a>
          <a href="#" class="btn btn-success btn-lg" onclick="add_edit_item()"><i class="fa fa-save"></i> Valider</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /ITEM ADD/EDIT MODAL -->

<!-- SKILL DELETE MODAL -->
<div class="modal fade" id="delete_skill" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Supprimer un don</p>
      </div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer le don <i id="delete_skill_name"></i> ?</p>
        <input type="hidden" value="" id="delete_skill_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_skill()"><i class="fa fa-check"></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /SKILL DELETE MODAL -->

<!-- ITEM DELETE MODAL -->
<div class="modal fade" id="delete_item" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title">Supprimer un objet</p>
      </div>
      <div class="modal-body nowrap">
        <p class="nowrap">Supprimer l&apos;objet <b><i id="delete_item_name"></i></b> ?</p>
        <input type="hidden" value="" id="delete_item_confirm">
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-danger  btn-lg" onclick="reset_skill_modal()" data-dismiss="modal"><i class="fa fa-remove"></i> NON</a>
          <a href="#" class="btn btn-success btn-lg" onclick="delete_item()"><i class="fa fa-check"></i> OUI</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /ITEM DELETE MODAL -->

<script type="text/javascript">
  var skill_table;
  var item_table;

  $(document).ready(function () {

    // Progress bars animation
    $('.progress .progress-bar').css("width",
      function () {
        return ((parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax"))) * 100) + "%";
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
      var oldval = field.val();
      setTimeout(function () {
        var true_val = field.val().substring(0, field.val().length - 1);
        if (field.val().slice(-1) != '%' || isNaN(true_val) || parseInt(true_val) < 0 || parseInt(true_val) > 100) {
          field.val(oldval);
          field[0].setSelectionRange(oldval.length - 1, oldval.length - 1);
        }
      }, 1);
    });

    // Destroys any datatable, just in case
    if ($.fn.DataTable.isDataTable('#skill_table')) {
      $('#skill_table').dataTable().fnDestroy();
    }
    if ($.fn.DataTable.isDataTable('#inv_table')) {
      $('#inv_table').dataTable().fnDestroy();
    }

    // Generates skills datatable
    skill_table = $("#skill_table").DataTable({
      ajax: base_url + "/skill/char/" + char.char_id,
      info: false,
      filter: false,
      paging: false,
      scroller: false,
      scrollCollapse: false,
      sort: false,
      autoWidth: false,
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details for ' + data[0] + ' ' + data[1];
            }
          }),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: 'table'
          })
        }
      },
      columns: [
        {data: "name"},
        {data: "worth"},
        {data: "effect"},
        {data: "edit"}
      ]
    });

    // Generates inventory datatable
    item_table = $("#inv_table").DataTable({
      ajax: base_url + "/inventory/char/" + char.char_id,
      info: false,
      filter: false,
      paging: false,
      scroller: false,
      scrollCollapse: false,
      sort: true,
      autoWidth: false,
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details for ' + data[0] + ' ' + data[1];
            }
          }),
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: 'table'
          })
        }
      },
      columns: [
        {data: "quantity"},
        {data: "name"},
        {data: "description"},
        {data: "edit"}
      ]
    });

    // Set stats values into inputs
    $.each(char, function (index, value) {
      $('#' + index).val(value);
    });
    
    // Set HP & MP bars
    change_bar_val(char.hp_cur, char.hp_max, 'hp');
    change_bar_val(char.pp_cur, char.pp_max, 'pp');

    // Set '%' character at the end of stats inputs
    $('.carac').each(function (index) {
      if ($(this).attr('id') != "gold") {
        $(this).val($(this).val() + '%');
      }
    });

    // Refresh GM-set stats every 3 seconds (currently Level and Light/Dark bar)
    refresh_stats();
    setInterval(
            function () {
              refresh_stats();
            },
            3000
            );

  });

  // Update skill (id, name, description, cost)
  function edit_skill(id) {
    $.ajax({
      data: {
        skill_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: base_url + "/skill/info",
      success: function (data) {
        $('#skill_id').val(data.skill_id);
        $('#skill_name').val(data.name);
        $('#skill_cost').val(data.worth);
        $('#skill_desc').val(data.effect);
        open_modal('add_edit_skill');
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  // Update item (id, name, description, quantity)
  function edit_item(id) {
    $.ajax({
      data: {
        item_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: base_url + "/inventory/info",
      success: function (data) {
        $('#item_id').val(data.item_id);
        $('#item_name').val(data.name);
        $('#item_qty').val(data.quantity);
        $('#item_desc').val(data.description);
        open_modal('add_edit_item');
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  // Open any modal and closes any other
  function open_modal(id) {
    $('.modal').modal('hide');
    $('#' + id).modal('show');
  }

  // Clear inputs of add_edit_skill modal
  function reset_skill_modal() {
    $('#skill_id').val('-1');
    $('#skill_name').val('');
    $('#skill_cost').val('');
    $('#skill_desc').val('');
    close_modal("add_edit_skill");
  }

  // Clear inputs of add_edit_item modal
  function reset_item_modal() {
    $('#item_id').val('-1');
    $('#item_name').val('');
    $('#item_qty').val('');
    $('#item_desc').val('');
    close_modal("add_edit_item");
  }

  function close_modal(id = null) {
    if (id == null) {
      $('.modal').modal('hide');
    } else {
      $("#" + id).modal('hide');
  }
  }

  function prompt_delete_skill(id) {
    $.ajax({
      data: {
        skill_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: base_url + "/skill/info",
      success: function (data) {
        console.log(data);
        $('#delete_skill_name').html(data.name);
        $('#delete_skill_confirm').val(id);
        open_modal("delete_skill");
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  function prompt_delete_item(id) {
    $.ajax({
      data: {
        item_id: id
      },
      type: "POST",
      dataType: "JSON",
      async: false,
      url: base_url + "/inventory/item",
      success: function (data) {
        console.log(data);
        $('#delete_item_name').html(data.name);
        $('#delete_item_confirm').val(id);
        open_modal("delete_item");
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  function delete_skill() {
    $.ajax({
      data: {
        skill_id: $('#delete_skill_confirm').val()
      },
      type: "POST",
      async: false,
      url: base_url + "/skill/delete",
      success: function (data) {
        close_modal();
        skill_table.ajax.reload();
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  function delete_item() {
    $.ajax({
      data: {
        item_id: $('#delete_item_confirm').val()
      },
      type: "POST",
      async: false,
      url: base_url + "/inventory/delete",
      success: function (data) {
        close_modal();
        item_table.ajax.reload();
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  function add_edit_skill() {
    if ($('#skill_name').val() != '' && $('#skill_desc').val() != '' && $('#skill_cost').val() != '') {
      $.ajax({
        data: {
          char_id: char.char_id,
          id: $('#skill_id').val(),
          name: $('#skill_name').val(),
          desc: $('#skill_desc').val(),
          cost: $('#skill_cost').val()
        },
        type: "POST",
        async: false,
        url: base_url + "/skill/addEdit",
        success: function (data) {
          skill_table.ajax.reload();
          reset_skill_modal();
        },
        error: function (e, d, l) {
          console.log(e);
        }
      });
    }
  }

  function add_edit_item() {
    if ($('#item_name').val() != '' && $('#item_desc').val() != '' && $('#item_qty').val() != '') {
      $.ajax({
        data: {
          char_id: char.char_id,
          id: $('#item_id').val(),
          name: $('#item_name').val(),
          desc: $('#item_desc').val(),
          qty: $('#item_qty').val()
        },
        type: "POST",
        async: false,
        url: base_url + "/inventory/AddEdit",
        success: function (data) {
          item_table.ajax.reload();
          reset_item_modal();
        },
        error: function (e, d, l) {
          console.log(e);
        }
      });
    }
  }

  function refresh_stats() {
    $.ajax({
      data: {
        char_id: char.char_id,
        columns: ['alignement', 'level']
      },
      type: "POST",
      dataType: "json",
      async: false,
      url: base_url + "character/info",
      success: function (data) {
        $('#alignement').val(data.alignement + '%');
        $('#level').val(data.level);
        $('#bar_light').css('width', data.alignement + '%');
        $('#bar_dark').css('width', (100 - data.alignement) + '%');
      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  function change_bar_val(cur, max, which) {
    $('#' + which + '_bar').attr('aria-valuenow', cur);
    $('#' + which + '_bar').attr('aria-valuemax', max);
    $('#' + which + '_lbl').html(cur + '/' + max);

    $('.progress .progress-bar').css("width",
      function () {
        return ((parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax"))) * 100) + "%";
      }
    );
  }

  function change_comp(id, sign) {
    var field = $('#comp_val_' + id);
    var newval;

    if (sign == "+") {
      newval = parseInt(field.html()) + 5;
    } else {
      newval = parseInt(field.html()) - 5;
    }

    var send_sign = sign == "+" ? "plus" : "minus";

    $.post(base_url + "/Ajax/changeCompVal/" + char.char_id + '/' + id + '/' + send_sign);

    field.html(newval);
  }

  function save_char_carac(input) {
    var old_bg = input.css('background-color');

    $.ajax({
      data: {
        char_id: char.char_id,
        column: input.attr('id'),
        value: input.val().replace('%', '')
      },
      type: "POST",
      async: false,
      url: base_url + "/character/update",
      success: function (data) {
        input.css('background-color', "lightgreen");
        setTimeout(function () {
          input.css('background-color', old_bg);
        }, 500);
        input.blur();

        if (input.attr('id').match('hp')) {
          change_bar_val($('#hp_cur').val(), $('#hp_max').val(), 'hp');
        }

        if (input.attr('id').match('pp')) {
          change_bar_val($('#pp_cur').val(), $('#pp_max').val(), 'pp');
        }

      },
      error: function (e, d, l) {
        console.log(e);
      }
    });
  }

  $('#save_story').click(function () {
    var input = $('#story');
    save_char_carac(input);
  });

  $('#save_inventory').click(function () {
    var input = $('#inventory');
    save_char_carac(input);
  });

  $('#inventory').bind('keydown', function (e) {
    if (e.ctrlKey && (e.which == 83)) {
      e.preventDefault();
      var input = $('#inventory');
      save_char_carac(input);
      return false;
    }

  });

  $('#story').bind('keydown', function (e) {
    if (e.ctrlKey && (e.which == 83)) {
      e.preventDefault();
      var input = $('#story');
      save_char_carac(input);
      return false;
    }
  });

  $(document).bind('keydown', function (e) {
    if (e.ctrlKey && (e.which == 83)) {
      e.preventDefault();
      return false;
    }
  });
</script>
