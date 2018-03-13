<style type="text/css">
  .dc_dice_a {
    color: #FF8888; 
  }
  .dc_dice_d {
    color: #00BB00; 
  }
  .dc_number {
    color: #8888FF;
  }
  .dc_operator:before,
  .dc_operator:after {
     content: "\00a0 ";
  }
</style>

<div class="col-lg-4 pull-right">
  <div class="panel panel-primary">
    <div class="panel-heading"><div class="panel-title">Jets de dés</div></div>
    <div class="panel-body" id="roll_result_wrapper" style="font-weight:bold; font-size: 14px; height: 75vh !important; overflow-y: auto; margin:0 !important; padding: 0 !important;">
      <table class="table table-striped table-condensed table-hover">
        <thead>
          <th>Time</th>
          <th style='text-align:center;'>Roll</th>
          <th style='text-align:center;'>Detail</th>
          <th style='text-align:right;'>Result</th>
        </thead>
        <tbody id='roll_result'>
        </tbody>
      </table>
    </div>
    <div class="panel-footer form-inline text-right">
      <!-- COMMON ROLLS -->
      <button class="btn btn-default btn-sm common-dice" id="1d6"  >d6</button>
      <button class="btn btn-default btn-sm common-dice" id="1d10" >d10</button>
      <button class="btn btn-default btn-sm common-dice" id="1d100">d100</button>

      <!-- CUSTOM ROLL -->
      <input type="text" class="form-control input-sm" value="1d8+2" id="txt_custom_dice">
      <button class="btn btn-default btn-sm" id="btn_custom_dice">Roll</button>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
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

</script>