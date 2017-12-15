<?php (defined("BASEPATH")) or exit("No direct script access allowed");

if(!function_exists("assets_url")) {

  function assets_url($complement = null) {
    $assetsURL = base_url()."assets/".($complement ?? "");
    return $assetsURL;
  }

}

if(!function_exists("controller_url")) {

  function controller_url($complement = null) {
    $ci            = &get_instance();
    $subDirectory  = basename($ci->router->fetch_directory());
    $controller    = $ci->router->fetch_class();
    $controllerURL = base_url();

    if(!empty($subDirectory) && $subDirectory !== "controllers") {
      $controllerURL .= "$subDirectory/";
    }
    
    $controllerURL .= $controller."/".($complement ?? "");
    return $controllerURL;
  }

}

if(!function_exists("site_name")) {

  function site_name() {
    $ci       = &get_instance();
    $siteName = $ci->config->item("site_name");
    return $siteName;
  }

}

if(!function_exists("site_instance")) {

  function site_instance() {
    $ci       = &get_instance();
    $siteInstance = $ci->config->item("site_instance");
    return $siteInstance;
  }

}

if(!function_exists("method_url")) {

  function method_url() {
    $ci        = &get_instance();
    $method    = $ci->router->fetch_method();
    $methodURL = controller_url().(!empty($method) ? "/".$method : "")."/";
    return $methodURL;
  }

}

function recursive_array_values($arr) {
  $arr2=[];
  foreach ($arr as $value) {
    if(is_array($value)) {
      $arr2[] = recursive_array_values($value);
    }
    else {
      $arr2[] =  $value;
    }
  }
  return $arr2;
}

function table_modal ($ident, $headers) {
  echo "<div id='{$ident}_modal' class='modal fade' role='dialog'>";
  echo "  <div class='modal-dialog' id='{$ident}_modal_dlg'>";
  echo "    <div class='modal-content'>";
  echo "      <div class='modal-header'><h4 class='modal-title' id='{$ident}_modal_title'></h4></div>";
  echo "      <div class='modal-body' id='{$ident}_modal_body'>";
  echo "        <table class='table table-striped table-hover table-condensed' id='{$ident}_modal_table' cellspacing='0' width='100%'>";
  echo "          <thead>";
  echo "            <tr>";
  foreach ($headers as $h) { echo "<th>$h</th>"; }
  echo "            </tr>";
  echo "          </thead>";
  echo "          <tbody>";
  echo "          </tbody>";
  echo "        </table>";
  echo "      </div>";
  echo "      <div class='modal-footer text-right'>";
  echo "        <button class='btn btn-danger' data-dismiss='modal'>Fermer</button>";
  echo "      </div>";
  echo "    </div>";
  echo "  </div>";
  echo "</div>";
}

function modal($name, $title = null, $size = null, $body = null) {
  $modal_size = (!empty($size) && in_array($size, ['lg','sm'])) ? "modal-$size" : "";

  echo "<div id='{$name}_modal' class='modal fade' role='dialog'>";
  echo "  <div class='modal-dialog $modal_size' id='{$name}_modal_dlg '>";
  echo "    <div class='modal-content'>";
  echo "      <div class='modal-header'><h4 class='modal-title' id='{$name}_modal_title'>" . ($title ?? '') . "</h4></div>";
  echo "      <div class='modal-body' id='{$name}_modal_body'>";
  if(!empty($body)) {
  echo "        $body";
  }
  echo "      </div>";
  echo "      <div class='modal-footer text-right'>";
  echo "        <button class='btn btn-danger' data-dismiss='modal'>Fermer</button>";
  echo "      </div>";
  echo "    </div>";
  echo "  </div>";
  echo "</div>";
}

function panel($name, $class = "primary", $body_html = null, $header_html = null, $footer_html = null) {

  if(!in_array($class, ['default','primary','success','warning','danger'])) {
    $class = "primary";
  }

  // PANEL INIT
  echo "<div class='panel panel-$class'>";

  // HEADER
  if (!empty($header_html)) {
    echo "<div class='panel-heading'>";
    echo $header_html;
    echo "</div>";
  }

  // BODY
  echo "<div class='panel-body' id='{$name}_panel_body'>";
  if (!empty($body_html)) {
    echo $body_html;
  }
  echo "</div>";

  // FOOTER
  if (!empty($footer_html)) {
    echo "<div class='panel-footer'>";
    echo $footer_html;
    echo "</div>";
  }

  // PANEL END
  echo "</div>";
}

function char_stat_block ($label, $id, $value, $gold = null) {

  $text_class = $gold ? "text-warning" : "text-info";

  echo "<div class='col-xs-3'>";
  echo "  <div class='panel panel-default'>";
  echo "    <div class='panel-body'>";
  echo "      <table style='width: 100%;'>";
  echo "        <tr>";
  echo "          <td style='text-align: center; font-weight: bold; width: 50%;'>$label</td>";
  echo "          <td style='text-align: center; padding: 5px;'>";
  echo "            <span class='text-right $text_class char_stat_val' style='font-weight: bold; font-size: 14px;' id='$id'>$value</span>";
  echo "          </td>";
  echo "        </tr>";
  echo "      </table>";
  echo "    </div>";
  echo "  </div>";
  echo "</div>";
}