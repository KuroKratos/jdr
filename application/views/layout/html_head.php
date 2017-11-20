<!DOCTYPE html>
<html lang="fr">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="<?= base_url("assets/images/favicon.png") ?>">

    <?php
    // LOADING CSS FILES
    if(!empty($css)) {
      foreach($css as $sheet) {
        echo "<link rel='stylesheet' type='text/css' href='".$sheet['url']."' media='".($sheet['media'] ?? "screen")."'/>\r\n";
      }
    }

    // LOADING JAVASCRIPT FILES
    if(!empty($js)) {
      foreach($js as $script) {
        echo "<script type='text/javascript' src='".$script['url']."'></script>\r\n";
      }
    }
    ?>
    
    <title><?= !empty($title) ? "$title - " : "" ?><?= site_name() ?></title>
  </head>