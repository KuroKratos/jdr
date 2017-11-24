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
  foreach ($headers as $h) { echo "<th>$h</th>"; }
  echo "          </thead>";
  echo "          <tbody>";
  echo "          </tbody>";
  echo "        </table>";
  echo "      </div>";
  echo "      <div class='modal-footer'>";
  echo "        <button class='btn btn-danger' data-dismiss='modal'>Fermer</button>";
  echo "      </div>";
  echo "    </div>";
  echo "  </div>";
  echo "</div>";
}