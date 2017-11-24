<?php defined("BASEPATH") or exit("No direct script access allowed");

class Ajax extends MY_Controller {

  // ======================================================== //
  //  Every functions below are meant to be called with AJAX  //
  // ======================================================== //
  
  // Prints the number of online characters
  public function getAllCharDetail () {
    $this->load->model('m_char');
    $chars = $this->m_char->allCharDetails();
    echo json_encode($chars, JSON_PRETTY_PRINT);
  }

  public function getCharComp ($char_id = null, $need_id = 0) {
    $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
    if(!empty($post['char_id'])) {
      $this->load->model('m_char');
      $comp = $this->m_char->getCharComp($post['char_id'], $need_id);
      echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
    }
  }

  public function getCharSkill ($char_id = null, $need_id = 0) {
    $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
    if(!empty($post['char_id'])) {
      $this->load->model('m_char');
      $comp = $this->m_char->getCharSkill($post['char_id'], $need_id);
      echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
    }
  }

}