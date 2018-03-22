  <body <?php echo (site_instance() === "_test_") ? "style='background: #000530 !important;'" : ""; ?>>
    <nav class="navbar navbar-light bg-light fixed-top navbar-expand-md">
      <a class="navbar-brand" href="#"><?= site_name() ?></a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">&#x2630;</button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="menu">
          <li class="dropdown show-on-hover nav-item"> <a class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"><i class="fa fa-user-circle"></i> Vue joueur</a>
            <ul class="dropdown-menu">
    <?php foreach($char as $k => $c) { ?>
              <li class="dropdown-item"><a href="<?= base_url("charsheet/$c") ?>"><i class="fa fa-caret-right"></i> <?= $c ?></a></li>
    <?php } ?>
            </ul>
          </li>
          <li class="nav-item"><a href="<?= base_url("master") ?>" class="nav-link"><i class="fa fa-user-circle-o"></i> Vue MJ</a></li>
          <li class="dropdown show-on-hover nav-item"> <a class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"><i class="fa fa-user-circle"></i> Simulation</a>
            <ul class="dropdown-menu">
              <li class="dropdown-item"><a href="simulation/battle"><i class="fa fa-caret-right"></i> Combat</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid" style="padding-top: 80px;">
