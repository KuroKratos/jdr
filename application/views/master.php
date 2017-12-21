<?php foreach ($characters as $c) { ?>
<div class="col-sm-6 col-md-6 col-lg-3 char_summary">
  <div class="panel panel-default" style="background-color: #00000055; box-shadow: 0 0 5px black; border-color: white; border-radius: 0px;">
    <!-- NAME + CLASS & RACE + LEVEL-->
    <div class="panel-heading" style="border-radius: 0; border-color: white; background-color: <?= $c['color'] ?>; padding: 5px;">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <p class="panel-title text-left" style="font-variant: small-caps; font-size: 14px; line-height: 22px;"><b><?= strtoupper($c['name']) ?></b></p>
        </div>
        <div class="col-xs-6 hidden-xs hidden-sm hidden-md hidden-lg">
          <p class="panel-title class-race"><?= $c['race'] ?> <?= $c['class'] ?></p>
        </div>
        <div class="col-xs-6 col-lg-6">
          <p class="panel-title text-right" id="c_lvl_<?= $c['char_id'] ?>" style="font-size: 14px;">Niveau <input type="text" class="input-underline text-center carac char_val" value="<?= $c['level'] ?>" style="width: 30px; border-color: white; text-align: center !important;" id="level-<?= $c['char_id'] ?>"></p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="panel-body" style="padding: 10px 15px 0 15px;; background-color: #00000099;">
      <!-- HP & PP PROGRESS BARS -->
      <div class="row">
        <div class="col-xs-6" style="padding: 0 5px;">
          <div class="progress progress-striped skill-bar hp-bar" style="height:20px; margin-bottom: 10px;">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $c['hp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['hp_max'] ?>" id="c_hp_<?= $c['char_id'] ?>"></div>
            <span class="skill" style="line-height:18px; font-size:12px !important;"><span class="lbl">HP</span><i class="val" id="c_hp_txt_<?= $c['char_id'] ?>"><?= ($c['hp_cur'] . "/" . $c['hp_max']) ?></i></span>
          </div>
        </div>
        <div class="col-xs-6" style="padding: 0 5px;">
          <div class="progress progress-striped skill-bar pp-bar" style="height:20px; margin-bottom: 10px;">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $c['pp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['pp_max'] ?>" id="c_pp_<?= $c['char_id'] ?>"></div>
            <span class="skill" style="line-height:17px; font-size:12px !important;"><span class="lbl">PP</span><i class="val" id="c_pp_txt_<?= $c['char_id'] ?>"><?= ($c['pp_cur'] . "/" . $c['pp_max']) ?></i></span>
          </div>
        </div>
      </div>
      <!-- MAIN STATS, 1 PANEL/EACH -->
      <fieldset class="char-stats" style="padding:0 !important; margin: 0 !important; border: none !important; background: none; box-shadow: none;">
        <div class="row">
          <?php char_stat_block('FORC','c_str_'.$c['char_id'], $c['strength']);  ?>
          <?php char_stat_block('DEXT','c_dex_'.$c['char_id'], $c['dexterity']); ?>
          <?php char_stat_block('CHAN','c_luk_'.$c['char_id'], $c['luck']);      ?>
          <?php char_stat_block('CONN','c_edu_'.$c['char_id'], $c['education']); ?>
        </div>
        <div class="row">
          <?php char_stat_block('INTL','c_int_'.$c['char_id'], $c['intelligence']); ?>
          <?php char_stat_block('CHAR','c_cha_'.$c['char_id'], $c['charisma']);     ?>
          <?php char_stat_block('PERC','c_per_'.$c['char_id'], $c['perception']);   ?>
          <?php char_stat_block('GOLD','c_po_' .$c['char_id'], $c['gold'], true);   ?>
        </div>
      </fieldset>
      <!-- COMPETENCES & ABILITIES BTN + Gold -->
      <fieldset class="char-stats" style="padding:0 !important; margin: 0 !important; border: none !important; background: none; box-shadow: none;">
        <div class="row">
          <div class="col-xs-12 col-md-3 pull-right" style="padding: 0 5px !important; margin: 0 !important; border: none !important; background: none; box-shadow: none;">
            <div class="panel panel-default">
              <div class="panel-body">
                <table style="width: 100%">
                  <tr>
                    <td style='text-align: center; font-weight: bold; width: 50%;'>ALIGN</td>
                    <td style='text-align: center; padding: 5px; font-weight: bold;'>
                      <input type="text" class="input-underline carac char_val text-info" id="alignement-<?= $c['char_id'] ?>" value="<?= $c['alignement'] ?>%" style="border-color: white; width: 100%;">
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-9" style="padding: 0 5px !important; margin: 0 !important; border: none !important; background: none; box-shadow: none;">
            <div class="row">
              <div class="col-xs-12">
                <div class="panel panel-default" style="margin-bottom: 0; height: 29px;">
                  <div class="panel-body" style="padding:5px !important">
                    <div class="progress progress-striped" style="/*box-shadow: 0px 0px 10px #000000;*/ margin: 0; border: 1px solid #888888; height: 18px;">
                      <div class="progress-bar progress-bar-warning" id="bar_light_<?= $c['char_id'] ?>" role="progressbar" style="width:<?= $c['alignement'] ?>%; background-color: #eebb33; text-align: center; line-height:17px; text-shadow: 1px 1px 3px black;">
                        <b>Lumière</b>
                      </div>
                      <div class="progress-bar progress-bar-success" id="bar_dark_<?= $c['char_id'] ?>"  role="progressbar" style="width:<?= (100 - $c['alignement']) ?>%; background-color: #000033; text-align: center; line-height:17px;">
                        <b>Ombre</b>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fieldset>
    </div>
  </div>
</div>
<?php } ?>

<script type="text/javascript">

  $(document).ready(function() {
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
      url: '<?= base_url('/Ajax/updateChar') ?>',
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

<?php
table_modal("comp",  ["Compétence","Valeur"]);
table_modal("skill", ["Don","Effet", "Coût"]);
?>
