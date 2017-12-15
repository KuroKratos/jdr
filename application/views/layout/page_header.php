<body <?= site_instance() === "test2" ? "style='background: none !important;'" : "" ?>>
<nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?= site_name() ?></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="menu">
        <li class="dropdown show-on-hover">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-user-circle"></i> Vue joueur <i class="fa fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <?php foreach($char as $k => $c) { ?>
            <li><a href="<?= base_url("charsheet/$c") ?>"><i class="fa fa-caret-right"></i> <?= $c ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li><a href="<?= base_url("master") ?>"><i class="fa fa-user-circle-o"></i> Vue MJ</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid" style="padding-top: 80px;">
