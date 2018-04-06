<?php
namespace {

  class M_Item extends CI_Model {

    private $db;

    public function __construct() {
      parent::__construct();
      $this->db = $this->load->database("default", true, true);
    }

    // Returns an array listing every item category
    public function getCategoryList() {
      return $this->db->get("item_category")->result_array();
    }

  }

}
