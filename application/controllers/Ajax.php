<?php defined("BASEPATH") or exit("No direct script access allowed");

class Ajax extends MY_Controller {

  // ======================================================== //
  //  Every functions below are meant to be called with AJAX  //
  // ======================================================== //
  
  // Prints the number of online characters
  public function getOnlineCharCount () {
    $this->load->model('m_char');
    $online = $this->m_char->onlineCharCount();
    echo json_encode($online, JSON_PRETTY_PRINT);
  }

  // Prints the number of @autotrade merchants
  public function getAtCharCount () {
    $this->load->model('m_char');
    $online = $this->m_char->atCharCount();
    echo json_encode($online, JSON_PRETTY_PRINT);
  }

  // Returns JSON object of all accounts except the login server one
  public function getAccountsList () {
    $this->load->model('m_account');
    $acc_list = $this->m_account->accountsList();
    echo json_encode(['data' => $acc_list], JSON_PRETTY_PRINT);
  }
}