<?php defined("BASEPATH") or exit("No direct script access allowed");

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Simulation extends MY_Controller {

  private $params;

  public function __construct() {
    parent::__construct();
    $this->load->model("m_char");
    $this->params = [
                      "title" => "Accueil",
                      "css"   => [
                                   ["url" => assets_url("bootstrap/css/bootstrap.min.css"),                         "media" => "screen"],
                                   ["url" => assets_url("font-awesome/css/font-awesome.min.css"),                   "media" => "screen"],
                                   ["url" => assets_url("datatables/datatables.min.css"),                           "media" => "screen"],
                                   ["url" => assets_url("datatables/responsive/css/responsive.dataTables.min.css"), "media" => "screen"],
                                   ["url" => assets_url("jspanel/dist/jspanel.css"),                                "media" => "screen"],
                                   ["url" => assets_url("datatables/responsive/css/responsive.bootstrap.min.css"),  "media" => "screen"],
                                   ["url" => assets_url("style.css"),                                               "media" => "screen"],
                                 ],
                      "js"  =>   [
                                   ["url" => assets_url("jquery/jquery-3.2.1.min.js")],
                                   ["url" => assets_url("bootstrap/js/bootstrap.min.js")],
                                   ["url" => assets_url("datatables/datatables.min.js")],
                                   ["url" => assets_url("datatables/responsive/js/dataTables.responsive.min.js")],
                                   ["url" => assets_url("datatables/responsive/js/responsive.bootstrap.min.js")],
                                   ["url" => assets_url("jspanel/dist/jspanel.js")],
                                   ["url" => assets_url("jspanel/dist/extensions/contextmenu/jspanel.contextmenu.js")],
                                   ["url" => assets_url("jspanel/dist/extensions/hint/jspanel.hint.js")],
                                   ["url" => assets_url("jspanel/dist/extensions/modal/jspanel.modal.js")],
                                   ["url" => assets_url("jspanel/dist/extensions/tooltip/jspanel.tooltip.js")],
                                   ["url" => assets_url("js/main.js")],
                                   ["url" => assets_url("js/register.js")],
                                 ],
                      "char"  => $this->m_char->charList(),
              ];
  }

  public function battle() {
      $this->params["title"] = "Simulation de combat";
      $this->loadView(["simulation/battle"], $this->params);
    }

}