<?php foreach ($characters as $c) { ?>

<div class="col-sm-6 col-md-4">

  <div class="panel panel-default" style="background-color: #<?= $c['color'] ?>">

    <!-- NAME + CLASS & RACE + LEVEL-->
    <div class="panel-heading">
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


    <div class="panel-body">

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
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">FORCE</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_str_<?= $c['char_id'] ?>"><?= $c['strength'] ?></div>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">DEXT.</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_dex_<?= $c['char_id'] ?>"><?= $c['dexterity'] ?></div>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CHANCE</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_luk_<?= $c['char_id'] ?>"><?= $c['luck'] ?></div>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CONST.</div>
                <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_con_<?= $c['char_id'] ?>"><?= $c['constitution'] ?></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-9" style="margin: 0 12.5%;">
            <div class="row">
              <div class="col-xs-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">CHAR.</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_cha_<?= $c['char_id'] ?>"><?= $c['charisma'] ?></div>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">PERC.</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_per_<?= $c['char_id'] ?>"><?= $c['perception'] ?></div>
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="col-xs-6 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">EDUC.</div>
                    <div class="col-xs-6 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_edu_<?= $c['char_id'] ?>"><?= $c['education'] ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fieldset>

      <!-- COMPETENCES & ABILITIES BTN + Gold -->
      <div class="">
        <div class="col-xs-7 fieldset">
          <div class="row">
            <div class="col-xs-12">
              <div class="panel panel-default" style="margin-bottom: 15px;">
                <div class="panel-body" style="padding: 5px; border-radius: 5px;">
                  <div class="col-xs-9 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">COMBAT CAC AVEC ARME</div>
                  <div class="col-xs-3 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_wpn_<?= $c['char_id'] ?>"><?= $c['fight_melee'] ?></div>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="panel panel-default" style="margin-bottom: 15px;">
                <div class="panel-body" style="padding: 5px; border-radius: 5px;">
                  <div class="col-xs-9 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">COMBAT CAC SANS ARME</div>
                  <div class="col-xs-3 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_hnd_<?= $c['char_id'] ?>"><?= $c['fight_bare'] ?></div>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="panel panel-default" style="margin-bottom: 10px;">
                <div class="panel-body" style="padding: 5px; border-radius: 5px;">
                  <div class="col-xs-9 text-left"            style="font-weight: bold; font-size: 14px; padding: 5px;">COMBAT ARME A DISTANCE</div>
                  <div class="col-xs-3 text-right text-info" style="font-weight: bold; font-size: 14px; padding: 5px;" id="c_dst_<?= $c['char_id'] ?>"><?= $c['fight_distance'] ?></div>
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
      10000
    );
  });
</script>

<?php
table_modal("comp",  ["Compétence","Valeur"]);
table_modal("skill", ["Don","Effet", "Coût"]);
?>
