<?php
namespace JDR;

class Character extends MY_Controller {

  public function characterAll () {
    $this->load->model("m_char");
    $chars = $this->m_char->allCharDetails();
    echo json_encode($chars, JSON_PRETTY_PRINT);
  }

  public function characterInfo($char_id=null) {
    $post = filter_input_array(INPUT_POST) ?? [
      "char_id" => $char_id,
      "columns" => null,
    ];
    if(!empty($post["char_id"])) {
      $this->load->model("m_char");
      $info = $this->m_char->getCharInfo($post["char_id"], $post["columns"] ?? null);
      echo json_encode($info, JSON_PRETTY_PRINT);
    }
  }

  public function characterUpdate() {
    $post = filter_input_array(INPUT_POST);
    if(!empty($post["char_id"]) && !empty($post["column"]) && isset($post["value"])) {
      $this->load->model("m_char");
      $this->m_char->updateChar($post["char_id"], $post["column"], $post["value"]);
    }
  }

}
