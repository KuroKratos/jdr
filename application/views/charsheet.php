<?php $c = $character[0] ?? null; ?>
  
<script type="text/javascript">
  global = <?= json_encode($c) ?>;
  console.log(global);
</script>

<div class="row">

  <div class="col-md-7 col-lg-9">
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <span class="pull-right">( <img src="<?= assets_url('images/enter_key.png') ?>" class="img-responsive" style="height: 20px; display: inline"> pour enregistrer )</span>
            <h4 class="panel-title">Vie et Mana</h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="row">
                  <div class="col-xs-6 pull-left">
                    <label>Points de Vie</label>
                  </div>
                  <div class="col-xs-6 pull-right">
                    <input type="text" id="hp_cur" class="input-underline char_val" style="width: 30%; text-align: center;"> /
                    <input type="text" id="hp_max" class="input-underline char_val" style="width: 30%; text-align: center;">
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
                  <div class="col-xs-6 pull-right">
                    <input type="text" id="pp_cur" class="input-underline char_val" style="width: 30%; text-align: center;"> /
                    <input type="text" id="pp_max" class="input-underline char_val" style="width: 30%; text-align: center;">
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
    <div class="row">
      <div class="col-md-12 col-lg-6">
        <div class="panel panel-primary" style="min-height: 194px;">
          <div class="panel-heading">
            <span class="pull-right">( <img src="<?= assets_url('images/enter_key.png') ?>" class="img-responsive" style="height: 20px; display: inline"> pour enregistrer )</span>
            <h4 class="panel-title">Personnage</h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-4"><label class="char">Nom</label><input    type="text" id="name"  class="input-underline char_val"></div>
              <div class="col-sm-4"><label class="char">Race</label><input   type="text" id="race"  class="input-underline char_val"></div>
              <div class="col-sm-4"><label class="char">Classe</label><input type="text" id="class" class="input-underline char_val"></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12"><label>Réputations :    </label><input type="text" id="traits"  class="input-underline char_val" style="width: 100%; margin: 0;"></div>
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

            <div class="row">

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">FORC</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_str_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['strength'] ?>%" style="width: 100%; text-align: center !important;" id="strength">
                </div>
              </div>

              <div class="col-xs-4"></div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CONS</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_con_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['constitution'] ?>%" style="width: 100%; text-align: center !important;" id="constitution">
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">DEXT</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_dex_<?= $c['char_id'] ?>">
                  <input type="text" class="input-underline text-center carac char_val" value="<?= $c['dexterity'] ?>%" style="width: 100%; text-align: center !important;" id="dexterity">
                </div>
              </div>

              <div class="col-xs-4">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">EDUC</div>
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

            <div class="row">

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
                  <input type="text" class="input-underline text-center char_val" value="<?= $c['gold'] ?>" style="width: 65%; text-align: center !important;" id="gold"> <span style="color: black;">PO</span>
                </div>
              </div>

              <div class="col-xs-4"></div>

            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">Dons de <?= $c['name'] ?></h4>
          </div>
          <div class="panel-body">
            <table class='table table-striped table-hover table-condensed' id='skill_table' cellspacing='0' width='100%'>
              <thead>
                <tr>
                  <th>Don</th>
                  <th>Coût</th>
                  <th>Effet</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-5 col-lg-3 pull-right">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary" style="min-height: 194px;">
          <div class="panel-heading">
            <h4 class="panel-title">Histoire</h4>
          </div>
          <div class="panel-body">
            <textarea id="story" class="form-control" style="width: 100%; min-height: 100%; resize: none;" rows="8"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">Inventaire</h4>
          </div>
          <div class="panel-body" style="height: 40vh;">
            <textarea id="inventory" class="form-control" style="width: 100%; min-height: 100%; resize: none;" rows="8"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {

    $('.progress .progress-bar').css("width",
      function() {
        return ( ( parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax")) ) * 100 )  + "%";
      }
    );

    $('.char_val').keyup(function (k) {
      if (k.keyCode == 13) {
        var input = $(this);
        save_char_carac(input);
      }
    });

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

    var tbl_height = $(window).height() - 210;

    console.log("Height : " + tbl_height);

    if( $.fn.DataTable.isDataTable('#skill_table') ) {
      $('#skill_table').dataTable().fnDestroy();
    }
    $("#skill_table").DataTable({
      ajax:           "<?= base_url("/Ajax/getCharSkill/".$c['char_id']) ?>",
      info:           false,
      filter:         false,
      paging:         false,
      scroller:       false,
      scrollCollapse: false,
      columns: [
        {data: "name"},
        {data: "worth"},
        {data: "effect"}
      ]
    });

    $.each(global, function (index, value) {
      console.log("Index : " + index);
      console.log("Value : " + value);
      $('#'+index).val(value);
    });

    $('.carac').each(function (index) {
      if($(this).attr('id') != "gold") {
        $(this).val($(this).val() + '%')
      }
    });

  });

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
    console.log(sign + "5 on " + id);
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
</script>