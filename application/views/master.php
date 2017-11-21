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
        <div class="col-xs-12">
          <div class="progress progress-striped skill-bar hp-bar">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $c['hp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['hp_max'] ?>" id="c_hp_<?= $c['char_id'] ?>"></div>
            <span class="skill"><span class="lbl">HP</span><i class="val" id="c_hp_txt_<?= $c['char_id'] ?>"><?= ($c['hp_cur'] . "/" . $c['hp_max']) ?></i></span>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="progress progress-striped skill-bar pp-bar">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $c['pp_cur'] ?>" aria-valuemin="0" aria-valuemax="<?= $c['pp_max'] ?>" id="c_pp_<?= $c['char_id'] ?>"></div>
            <span class="skill"><span class="lbl">PP</span><i class="val" id="c_pp_txt_<?= $c['char_id'] ?>"><?= ($c['pp_cur'] . "/" . $c['pp_max']) ?></i></span>
          </div>
        </div>
      </div>

      <hr style="margin:0 0 20px 0">

      <!-- MAIN STATS, 1 PANEL/EACH -->
      <div class="row">
        <div class="col-xs-4">
          <div class="panel panel-info">
            <div class="panel-heading text-center" style="padding: 5px;">Physique</div>
            <div class="panel-body text-center text-info" style="font-weight: bold; font-size: 18px; padding: 5px;" id="c_phy_<?= $c['char_id'] ?>"><?= $c['physic'] ?></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-info">
            <div class="panel-heading text-center" style="padding: 5px;">Mental</div>
            <div class="panel-body text-center text-info" style="font-weight: bold; font-size: 18px; padding: 5px;" id="c_men_<?= $c['char_id'] ?>"><?= $c['mental'] ?></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-info">
            <div class="panel-heading text-center" style="padding: 5px;">Social</div>
            <div class="panel-body text-center text-info" style="font-weight: bold; font-size: 18px; padding: 5px;" id="c_soc_<?= $c['char_id'] ?>"><?= $c['social'] ?></div>
          </div>
        </div>
      </div>

      <hr style="margin:0 0 20px 0">

      <!-- COMPETENCES & ABILITIES BTN + Gold -->
      <div class="row">
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading text-center">Dons</div>
            <div class="panel-body text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><a href="#">Voir</a></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-warning">
            <div class="panel-heading text-center">Gold</div>
            <div class="panel-body text-warning text-center" style="font-weight: bold; font-size: 18px; padding: 5px;" id="c_gld_<?= $c['char_id'] ?>"><?= $c['gold'] ?></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading text-center">Comp.</div>
            <div class="panel-body text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><a href="#">Voir</a></div>
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