<?php foreach ($characters as $c) { ?>

<div class="col-sm-6 col-md-4">

  <div class="panel panel-default">

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
          <p class="panel-title text-right">Niveau <?= $c['level'] ?></p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>


    <div class="panel-body">

      <!-- MAIN STATS, 1 PANEL/EACH -->
      <div class="row">
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading text-center" style="padding: 5px;">Physique</div>
            <div class="panel-body text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><?= $c['physic'] ?></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading text-center" style="padding: 5px;">Mental</div>
            <div class="panel-body text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><?= $c['mental'] ?></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading text-center" style="padding: 5px;">Social</div>
            <div class="panel-body text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><?= $c['social'] ?></div>
          </div>
        </div>
      </div>

      <hr style="margin:0 0 20px 0">

      <!-- HP & PP, 1 PANEL/EACH -->
      <div class="row">
        <div class="col-xs-6">
<!--          <div class="panel panel-success">
            <div class="panel-heading text-center" style="padding: 5px;">P.V.</div>
            <div class="panel-body text-center text-success" style="font-weight: bold; font-size: 18px; padding: 5px;"><?= $c['hp_cur'] ?> / <?= $c['hp_max'] ?></div>
          </div>-->
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $c['hp_cur'] ?>"
            aria-valuemin="0" aria-valuemax="<?= $c['hp_max'] ?>" style="width:<?= ($c['hp_cur']/$c['hp_max'])*100 ?>%">
              <?= ($c['hp_cur'] . " / " . $c['hp_max']) ?>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
<!--          <div class="panel panel-info">
            <div class="panel-heading text-center" style="padding: 5px;">P.P.</div>
            <div class="panel-body text-center text-info" style="font-weight: bold; font-size: 18px; padding: 5px;"><?= $c['pp_cur'] ?> / <?= $c['pp_max'] ?></div>
          </div>-->
          <div class="progress">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $c['pp_cur'] ?>"
            aria-valuemin="0" aria-valuemax="<?= $c['pp_max'] ?>" style="width:<?= ($c['pp_cur']/$c['pp_max'])*100 ?>%">
              <?= ($c['pp_cur'] . " / " . $c['pp_max']) ?>
            </div>
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
          <div class="panel panel-default">
            <div class="panel-heading text-center">Compétences</div>
            <div class="panel-body text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><a href="#">Voir</a></div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-warning">
            <div class="panel-heading text-center">Gold</div>
            <div class="panel-body text-warning text-center" style="font-weight: bold; font-size: 18px; padding: 5px;"><?= $c['gold'] ?></div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<?php } ?>