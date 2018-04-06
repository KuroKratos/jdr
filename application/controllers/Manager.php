<?php
namespace {

  class Manager extends MY_Controller {

    private $params;

    public function __construct() {
      parent::__construct();
      $this->load->model("m_char");
      $this->params = [
        "title"  => "Accueil",
        "char"   => $this->m_char->charList(),
        "assets" => ["Bootstrap4", "font-awesome", "dataTables"],
      ];
    }

    public function item () {
      $this->params["characters"] = $this->m_char->allCharDetails();
      $this->params["title"]      = "Item Manager";
      $this->params["js"][]       = assets_url("js/item.js");
      $this->loadView(["manager/item"], $this->params);
    }

  }

}
