<?php foreach ($characters as $c) { ?>

<div class="col-sm-6 col-md-4">

  <div class="panel panel-default">

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
    </div>

  </div>

</div>

<?php } ?>