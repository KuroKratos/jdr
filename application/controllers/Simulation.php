<?php
namespace {

  class Simulation extends MY_Controller {

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

    public function battle() {
      $this->params["title"] = "Simulation de combat";
      $this->loadView(["simulation/battle"], $this->params);
    }

    public function test() {
      $this->load->model("m_item");
      $this->params["categories"] = $this->m_item->getCategoryList();
      $this->params["items"]      = $this->m_item->getItemList();
      $this->params["title"]      = "Test";
      $this->loadView(["simulation/test"], $this->params);
    }

  }

}
