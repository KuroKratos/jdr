<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_Char extends CI_Model {

  private $db;

  public function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE, TRUE);
  }

  public function charList() {
    $query = $this->db->select('name')->get('jdr_chars')->result_array();
    $list = array_column($query, 'name');
    return $list;
  }

  // Returns character details
  public function charDetails($char) {
    return $this->db->where("name",$char)->get("jdr_chars")->result_array();
  }
}