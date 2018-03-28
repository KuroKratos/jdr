<!-- CHARACTERS SUMMARY COLUMN -->
<div class="col-lg-4 pull-left">
  <?php foreach($characters as $c) { ?>
  <div class="card z-depth-3 mb-3" style="border: 1px solid <?= $c['color'] ?>">
    <div class="card-body text-dark elegant-color-dark p-2" style="background-color: <?= $c['color'] ?> !important;">
      <h5 class="card-title mb-0"><?= $c['name'] ?> (<?= $c['race'] ?> <?= $c['class'] ?>)</h5>
    </div>
    <div class="card-body text-white elegant-color p-1">
      <!-- MAIN STATS, 1 PANEL/EACH -->
      <div class="char-stats col-5 mt-1">
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
          <?php char_stat_block('GOLD','c_po_' .$c['char_id'], $c['gold'], true); ?>
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
  $(document).ready(function () {});

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

</script>