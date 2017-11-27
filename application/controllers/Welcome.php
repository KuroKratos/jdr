<?php defined("BASEPATH") or exit("No direct script access allowed");

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Welcome extends MY_Controller {
  
  private $params;

  public function __construct() {
    parent::__construct();
    $this->load->model("m_char");
    $this->params = [
                      "title" => "Accueil",
                      "css"   => [
                                   ["url" => assets_url("bootstrap/css/bootstrap.min.css"),                                       "media" => "screen"],
                                   ["url" => assets_url("font-awesome/css/font-awesome.min.css"),                                 "media" => "screen"],
                                   ["url" => assets_url("datatables/datatables.min.css"),                                         "media" => "screen"],
                                   ["url" => assets_url("style.css"),                                                             "media" => "screen"],
                                 ],
                      "js"  =>   [
                                   ["url" => assets_url("jquery/jquery-3.2.1.min.js")],
                                   ["url" => assets_url("bootstrap/js/bootstrap.min.js")],
                                   ["url" => assets_url("datatables/datatables.min.js")],
                                   ["url" => assets_url("js/main.js")],
                                   ["url" => assets_url("js/register.js")],
                                 ],
                      "char"  => $this->m_char->charList(),
              ];
  }

  public function index() {
    $post = filter_input_array(INPUT_POST);
    if(!empty($post['ajax']) && $post['ajax'] == 1) {
      $this->load->view("home", $this->params);
    }
    else {
      $this->loadView(["home"], $this->params);
    }
  }

  public function charsheet($char = null) {
    if(!empty($char)) {
      $this->params["character"] = $this->m_char->charDetails($char);
      $this->params["title"]     = $char;
      $post = filter_input_array(INPUT_POST);
      if(!empty($post['ajax']) && $post['ajax'] == 1) {
        $this->load->view("charsheet", $this->params);
      }
      else {
        $this->loadView(["charsheet"], $this->params);
      }
    }
  }

  public function master() {
    $this->params["characters"] = $this->m_char->allCharDetails();
    $this->params["title"]     = "Panel MJ";
    $post = filter_input_array(INPUT_POST);
    if(!empty($post['ajax']) && $post['ajax'] == 1) {
      $this->load->view("master", $this->params);
    }
    else {
      $this->loadView(["master"], $this->params);
    }
  }
}