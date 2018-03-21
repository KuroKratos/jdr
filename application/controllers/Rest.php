<?php defined("BASEPATH") or exit("No direct script access allowed");

class Rest extends MY_Controller {

  public function getRoll ($param) {
    $param_enc = ($param);
    $service_url = 'https://rolz.org/api/?'.($param_enc);
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    $curl_response = json_decode(curl_exec($curl), true);
    $curl_response['timestamp'] = time();
    curl_close($curl);

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode($curl_response, JSON_PRETTY_PRINT);
  }
}
?>