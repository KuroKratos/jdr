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
    echo "\t<link rel='stylesheet' type='text/css' href='$sheet' media='screen'/>\r\n";
  }
}
?>
    <link rel='stylesheet' type='text/css' href='<?= assets_url("style.css") ?>' media='screen'/>

    <script type='text/javascript' src='<?= assets_url("jquery/jquery-3.2.1.min.js") ?>'></script>

    <script type="text/javascript">
      var base_url = "<?= base_url(); ?>";
    </script>

    <title><?php echo !empty($title) ? "$title - " : ""; ?><?= site_name() ?></title>
  </head>
