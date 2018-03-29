<!-- CHARACTERS SUMMARY COLUMN -->
<div class="col-lg-4 pull-left">
  <?php foreach($characters as $c) { ?>
  <div class="card z-depth-3 mb-3" style="border: 1px solid <?= $c["color"] ?>">
    <div class="card-body text-dark elegant-color-dark p-2" style="background-color: <?= $c["color"] ?> !important;">
      <h5 class="card-title mb-0"><?= $c["name"] ?> (<?= $c["race"] ?> <?= $c["class"] ?>) <span class="pull-right col-4 text-right">Niveau : <input type="text" class="input-underline carac char_val col-2" value="<?= $c["level"] ?>" id="level-<?= $c["char_id"] ?>"></span></h5>
    </div>
    <div class="card-body text-white elegant-color p-1">
      <!-- MAIN STATS, 1 PANEL/EACH -->
      <div class="row mx-0">
        <div class="char-stats col-6 mt-1">
          <div class="row">
            <?php char_stat_block("FORC", "c_str_".$c["char_id"], $c["strength"]); ?>
            <?php char_stat_block("DEXT", "c_dex_".$c["char_id"], $c["dexterity"]); ?>
            <?php char_stat_block("INTL", "c_int_".$c["char_id"], $c["intelligence"]); ?>
          </div>
          <div class="row">
            <?php char_stat_block("CONS", "c_con_".$c["char_id"], $c["constitution"]); ?>
            <?php char_stat_block("CHAN", "c_luk_".$c["char_id"], $c["luck"]); ?>
            <?php char_stat_block("CONN", "c_edu_".$c["char_id"], $c["education"]); ?>
          </div>
          <div class="row">
            <?php char_stat_block("CHAR", "c_cha_".$c["char_id"], $c["charisma"]); ?>
            <?php char_stat_block("PERC", "c_per_".$c["char_id"], $c["perception"]); ?>
            <?php char_stat_block("GOLD", "c_po_".$c["char_id"], $c["gold"], true); ?>
          </div>
        </div>
        <div class="col-6 mt-1">
          <!-- HP BAR -->
          <div class="progress skill-bar border border-light hp-bar mb-2 z-depth-1" style="height:17px;">
            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="<?= $c["hp_cur"] ?>" aria-valuemin="0" aria-valuemax="<?= $c["hp_max"] ?>" id="c_hp_<?= $c["char_id"] ?>"></div>
            <span class="skill" style="line-height:16px; font-size:12px !important;"><span class="lbl">PV</span><i class="val" id="c_hp_txt_<?= $c["char_id"] ?>"><?= ($c["hp_cur"]."/".$c["hp_max"]) ?></i></span>
          </div>
          <!-- MP BAR -->
          <div class="progress skill-bar border border-light pp-bar z-depth-1 mb-2" style="height:17px;">
            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="<?= $c["pp_cur"] ?>" aria-valuemin="0" aria-valuemax="<?= $c["pp_max"] ?>" id="c_pp_<?= $c["char_id"] ?>"></div>
            <span class="skill" style="line-height:16px; font-size:12px !important;"><span class="lbl">PM</span><i class="val" id="c_pp_txt_<?= $c["char_id"] ?>"><?= ($c["pp_cur"]."/".$c["pp_max"]) ?></i></span>
          </div>
          <!-- ALIGNMENT BAR -->
          <div class="progress z-depth-1 border border-light mb-1" style="height: 17px;">
            <div class="progress-bar progress-bar-warning progress-bar-striped" id="bar_light_<?= $c["char_id"] ?>" role="progressbar" style="width:<?= $c["alignement"] ?>%; background-color: #eebb33; text-align: center; line-height:16px; text-shadow: 1px 1px 3px black;">
              <b>Lumière</b>
            </div>
            <div class="progress-bar progress-bar-success progress-bar-striped" id="bar_dark_<?= $c["char_id"] ?>"  role="progressbar" style="width:<?= (100 - $c["alignement"]) ?>%; background-color: #000033; text-align: center; line-height:16px;">
              <b>Ombre</b>
            </div>
          </div>
          <!-- ALIGNMENT INPUT -->
          <table style="width: 100%">
            <tr>
              <td class="text-center" style='width: 50%; font-family: monospace; font-weight: bold;'>ALIGNEMENT</td>
              <td style='text-align: center; padding: 5px; font-weight: bold;'>
                <input type="text" class="input-underline carac char_val text-info" id="alignement-<?= $c["char_id"] ?>" value="<?= $c["alignement"] ?>%" style="border-color: white; width: 100%;">
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

<!-- DICE ROLLER COLUMN -->
<div class="col-lg-3 pull-right">
  <div class="card z-depth-3" style="border: 1px solid rgba(255,255,255,0.1);">
    <div class="card-body bg-dark p-0" id="roll_result_wrapper" style="height: 75vh !important; overflow-y: auto;">
      <table class="table table-dark table-striped table-sm table-hover">
        <thead>
          <th>Time</th>
          <th style='text-align:center;'>Roll</th>
          <th style='text-align:center;'>Detail</th>
          <th style='text-align:right;' >Result</th>
        </thead>
        <tbody id='roll_result'>
        </tbody>
      </table>
    </div>
    <div class="card-body form-inline text-right p-0">
      <!-- COMMON ROLLS -->
      <button class="btn btn-elegant btn-sm common-dice" id="1d6"  ><b>d6</b></button>
      <button class="btn btn-elegant btn-sm common-dice" id="1d10" ><b>d10</b></button>
      <button class="btn btn-elegant btn-sm common-dice" id="1d100"><b>d100</b></button>

      <!-- CUSTOM ROLL -->
      <div style="position: absolute; right: 0;">
        <input type="text" class="input-sm" value="1d8+2" id="txt_custom_dice" style="width:100px;">
        <button class="btn btn-elegant btn-sm" id="btn_custom_dice">Roll</button>
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

    get_all_char_info();
    setInterval(
      function () { get_all_char_info(); },
      3000
    );
  });

  $('#btn_custom_dice').click(function () {
    var RollStr, RollResult;

    RollStr = $('#txt_custom_dice').val().trim();
    RollResult = diceRoll(RollStr);

    appendRollToTable(RollResult,"roll_result");

  });

  $('.common-dice').click(function () {
    var RollStr, RollResult;

    RollStr = $(this).attr('id').trim();
    RollResult = diceRoll(RollStr);

    appendRollToTable(RollResult,"roll_result");

  });

  $('.char_val').keyup(function (k) {
    if (k.keyCode == 13) {
      var input = $(this);
      save_char_carac(input);
    }
  });

  function save_char_carac (input) {
    var old_bg = input.css('background-color');
    var char   = input.attr('id').split('-')[1];
    var val    = input.val().replace('%','');

    $.ajax({
      data: {
        char_id: char,
        column:  input.attr('id').split('-')[0],
        value:   val
      },
      type: "POST",
      async: false,
      url: '<?= base_url("/character/update") ?>',
      success: function(data){
        input.css('background-color',"lightgreen");
        setTimeout( function () {
          input.css('background-color', old_bg);
        }, 500);
        input.blur();

        if(input.attr('id').match('align')) {
          $('#bar_light_' + char).css('width',val+'%');
          $('#bar_dark_'  + char).css('width',(100 - val)+'%');
        }

      },
      error: function(e, d, l){
        console.log(e);
      }
    });
  }
</script>
