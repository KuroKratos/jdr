<?php foreach ($characters as $c) { ?>

<div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-0">

  <div class="panel panel-default" style="background-color: <?= $c['color'] ?>; box-shadow: 0 0 5px black; border-color: #888888; border-radius: 10px;">

    <!-- NAME + CLASS & RACE + LEVEL-->
    <div class="panel-heading" style="border-radius: 10px 10px 0 0;">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3">
          <p class="panel-title text-left" style="font-variant: small-caps"><b><?= $c['name'] ?></b></p>
        </div>
        <div class="col-xs-6">
          <p class="panel-title class-race"><?= $c['race'] ?> <?= $c['class'] ?></p>
        </div>
        <div class="col-xs-6 col-lg-3">
          <p class="panel-title text-right" id="c_lvl_<?= $c['char_id'] ?>">Niveau <?= $c['level'] ?></p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>


    <div class="panel-body" style="border-radius: 0 0 10px 10px">

      <!-- HP & PP PROGRESS BARS -->
      <div class="row">
        <div class="col-xs-6">
          <div class="progress progress-striped skill-bar hp-bar">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $c['hp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['hp_max'] ?>" id="c_hp_<?= $c['char_id'] ?>"></div>
            <span class="skill"><span class="lbl">HP</span><i class="val" id="c_hp_txt_<?= $c['char_id'] ?>"><?= ($c['hp_cur'] . "/" . $c['hp_max']) ?></i></span>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="progress progress-striped skill-bar pp-bar">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $c['pp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['pp_max'] ?>" id="c_pp_<?= $c['char_id'] ?>"></div>
            <span class="skill"><span class="lbl">PP</span><i class="val" id="c_pp_txt_<?= $c['char_id'] ?>"><?= ($c['pp_cur'] . "/" . $c['pp_max']) ?></i></span>
          </div>
        </div>
      </div>

      <!-- MAIN STATS, 1 PANEL/EACH -->

      <fieldset class="char-stats">
        <div class="row">
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">FORC</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_str_<?= $c['char_id'] ?>"><?= $c['strength'] ?></div>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">DEXT</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_dex_<?= $c['char_id'] ?>"><?= $c['dexterity'] ?></div>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CHAN</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_luk_<?= $c['char_id'] ?>"><?= $c['luck'] ?></div>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">COUR</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_con_<?= $c['char_id'] ?>"><?= $c['constitution'] ?></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
              <div class="col-xs-3">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">INTEL</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_int_<?= $c['char_id'] ?>"><?= $c['intelligence'] ?></div>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CHAR</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_cha_<?= $c['char_id'] ?>"><?= $c['charisma'] ?></div>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">PERC</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_per_<?= $c['char_id'] ?>"><?= $c['perception'] ?></div>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CONN</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_edu_<?= $c['char_id'] ?>"><?= $c['education'] ?></div>
                  </div>
                </div>
              </div>
        </div>
      </fieldset>

      <!-- COMPETENCES & ABILITIES BTN + Gold -->
      <div class="">
        <div class="col-xs-8 fieldset" style="width:65%;">
          <div class="row">
            <div class="col-xs-12">
              <div class="panel panel-default" style="margin-bottom: 15px;">
                <div class="panel-body" style="padding: 5px; border-radius: 5px;">
                  <div class="col-xs-9 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">PENCHANT LUMIÈRE / OMBRE</div>
                  <div class="col-xs-3 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_ali_<?= $c['char_id'] ?>">
                    <input type="text" class="input-underline text-center carac char_val" value="<?= $c['alignement'] ?>%" style="width: 100%; text-align: center !important;" id="alignement-<?= $c['char_id'] ?>">
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="progress progress-striped" style="/*box-shadow: 0px 0px 10px #000000;*/ margin-top:12px; margin-bottom: 10px; border: 1px solid #888888;">
                        <div class="progress-bar progress-bar-warning" id="bar_light_<?= $c['char_id'] ?>" role="progressbar" style="width:<?= $c['alignement'] ?>%; background-color: #eebb33; text-align: center; line-height:33px; text-shadow: 1px 1px 3px black;">
                          <b>Lumière</b>
                        </div>
                        <div class="progress-bar progress-bar-success" id="bar_dark_<?= $c['char_id'] ?>"  role="progressbar" style="width:<?= (100 - $c['alignement']) ?>%; background-color: #000033; text-align: center; line-height:33px;">
                          <b>Ombre</b>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-4 fieldset pull-right">
          <div class="row">
          <div class="col-xs-12">
            <div class="panel panel-default" style="margin-bottom: 15px;">
              <div class="panel-body" style="padding: 5px; border-radius: 5px;">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">DONS</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;"><a href="#" onclick="get_char_skill(<?= $c['char_id'] ?>,'<?= $c['name'] ?>')">Voir</a></div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="panel panel-default" style="margin-bottom: 15px;">
              <div class="panel-body" style="padding: 5px; border-radius: 5px;">
                <div class="col-xs-5 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">ARGENT</div>
                <div class="col-xs-7 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_gld_<?= $c['char_id'] ?>"><?= $c['gold'] ?> PO</div>
              </div>
            </div>
          </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</div>

<script type="text/javascript">
   $(document).ready(function() {
      $('.progress .progress-bar').css("width",
        function() {
          return ( ( parseInt($(this).attr("aria-valuenow")) / parseInt($(this).attr("aria-valuemax")) ) * 100 )  + "%";
        }
      );
    });
</script>

<?php } ?>

<script type="text/javascript">
   $(document).ready(function() {
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
