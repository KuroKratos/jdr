<?php $c = $character[0] ?? null; ?>

<script type="text/javascript">
  global = {};
  global.char_id = <?= $c['char_id'] ?>;
</script>

<div class="row">

  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">Statistiques de <?= $c['name'] ?></h4>
          </div>
          <div class="panel-body">
            <pre>
              <?php print_r($c) ?>
            </pre>
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

  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">Compétences de <?= $c['name'] ?></h4>
      </div>
      <div class="panel-body">
        <table class='table table-striped table-hover table-condensed' id='comp_table' cellspacing='0' width='100%'>
          <thead>
            <tr>
              <th>Compétence</th>
              <th>Chances</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function () {

    var tbl_height = $(window).height() - 210;

    console.log("Height : " + tbl_height);

    if( $.fn.DataTable.isDataTable('#comp_table') ) {
      $('#comp_table').dataTable().fnDestroy();
    }
    $("#comp_table").DataTable({
      ajax:           "<?= base_url("/Ajax/getCharComp/".$c['char_id'])."/1" ?>",
      info:           false,
      filter:         false,
      paging:         true,
      scroller:       true,
      scrollCollapse: true,
      scrollY:        tbl_height,
      columns: [
        {data: "name"},
        {data: "val"}
      ]
    });

    if( $.fn.DataTable.isDataTable('#skill_table') ) {
      $('#skill_table').dataTable().fnDestroy();
    }
    $("#skill_table").DataTable({
      ajax:           "<?= base_url("/Ajax/getCharSkill/".$c['char_id']) ?>",
      info:           false,
      filter:         false,
      paging:         true,
      scroller:       true,
      scrollCollapse: true,
      scrollY:        tbl_height,
      columns: [
        {data: "name"},
        {data: "worth"},
        {data: "effect"}
      ]
    });
  });

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
</script>