<?php
namespace JDR;

class Ennemy extends MY_Controller {

  public function ennemyList () {
    $this->load->model("m_ennemy");
    $ennemies = $this->m_ennemy->ennemyList();
    echo json_encode($ennemies, JSON_PRETTY_PRINT);
  }

  public function ennemyInfo($ennemy_id=null) {
    $post = filter_input_array(INPUT_POST) ?? [
      "ennemy_id" => $ennemy_id,
      "columns"   => null,
    ];
    if(!empty($post["ennemy_id"])) {
      $this->load->model("m_ennemy");
      $info = $this->m_ennemy->ennemyInfo($post["ennemy_id"], $post["columns"] ?? null);
      echo json_encode($info, JSON_PRETTY_PRINT);
    }
  }

  public function ennemyRandom($region=null) {
    $post = filter_input_array(INPUT_POST) ?? ["region" => $region];
    $this->load->model("m_ennemy");
    $info = $this->m_ennemy->ennemyRandom($post["region"]);
    echo json_encode($info, JSON_PRETTY_PRINT);
  }

}
