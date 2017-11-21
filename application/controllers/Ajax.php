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

}