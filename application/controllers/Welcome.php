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
                                   ["url" => assets_url("bootstrap/css/bootstrap.min.css"),       "media" => "screen"],
                                   ["url" => assets_url("font-awesome/css/font-awesome.min.css"), "media" => "screen"],
                                   ["url" =>            "https://cdn.datatables.net/v/bs/jszip"
                                                       ."-2.5.0/dt-1.10.16/b-1.4.2/b-colvis-1."
                                                       ."4.2/b-flash-1.4.2/b-html5-1.4.2/b-pri"
                                                       ."nt-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/k"
                                                       ."t-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-"
                                                       ."1.4.3/sl-1.2.3/datatables.min.css",     "media" => "screen"],
                                   ["url" => assets_url("style.css"),                             "media" => "screen"],
                                 ],
                      "js"  =>   [
                                   ["url" => assets_url("jquery/jquery-3.2.1.min.js")],
                                   ["url" => assets_url("bootstrap/js/bootstrap.min.js")],
                                   ["url" =>            "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"],
                                   ["url" =>            "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"],
                                   ["url" =>            "https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/b-1.4.2/"
                                                       ."b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4"
                                                       .".1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4."
                                                       ."3/sl-1.2.3/datatables.min.js"],
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