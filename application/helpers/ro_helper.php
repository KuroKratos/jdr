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