<?php
namespace {

  class Welcome extends MY_Controller {

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

    public function index() {
      $post = filter_input_array(INPUT_POST);
      if(!empty($post["ajax"]) && (int)$post["ajax"] === 1) {
        $this->load->view("home.html", $this->params);
      }
      else {
        $this->loadView(["home.html"], $this->params);
      }
    }

    public function dashboard () {
      $this->loadView(["dashboard.html"], $this->params);
    }

    public function charsheet($char=null) {
      if(!empty($char)) {
        $this->params["character"] = $this->m_char->charDetails(urldecode($char));
        $this->params["title"]     = urldecode($char);
        $post                      = filter_input_array(INPUT_POST);
        if(!empty($post["ajax"]) && (int)$post["ajax"] === 1) {
          $this->load->view("charsheet", $this->params);
        }
        else {
          $this->loadView(["charsheet"], $this->params);
        }
      }
    }

    public function charsheetMini($char=null) {
      if(!empty($char)) {
        $this->params["character"] = $this->m_char->charDetails(urldecode($char));
        $this->params["title"]     = urldecode($char);
        $post                      = filter_input_array(INPUT_POST);
        if(!empty($post["ajax"]) && (int)$post["ajax"] === 1) {
          $this->load->view("charsheet_mini", $this->params);
        }
        else {
          $this->loadView(["charsheet_mini"], $this->params);
        }
      }
    }

    public function master() {
      $this->params["characters"] = $this->m_char->allCharDetails();
      $this->params["title"]      = "Panel MJ";
      $post                       = filter_input_array(INPUT_POST);
      if(!empty($post["ajax"]) && (int)$post["ajax"] === 1) {
        $this->load->view("master", $this->params);
      }
      else {
        $this->loadView(["master"], $this->params);
      }
    }

    public function test() {
      $results = [];
      $weight  = [];
      $this->load->model("m_ennemy");

      for($i = 0; $i < 200; $i++) {
        $results[] = $this->m_ennemy->ennemyRandom(1);
      }

      foreach($results as $key => $row) {
        $weight[$key] = $row["FACTEUR"];
      }

      array_multisort($weight, SORT_DESC, $results);

      echo "<table border='1' style='border-collapse: collapse;'>";
      foreach($results as $data) {
        echo "<tr><td>{$data['REGION']}</td><td>{$data['MONSTRE']}</td><td>{$data['FACTEUR']}</td></tr>";
      }

      echo "</table>";
    }

  }

}
