<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_Site extends CI_Model {

  private $db;

  public function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE, TRUE);
  }

  public function getMenuItems() {
    return $this->db->select("*")->from("menu")->order_by("men_order")->get()->result_array();
  }

  public function getNews($all = false, $limit = 5, $offset = 0) {
    $this->db->select("title, author, content, image, release_date");
    if(!$all) {
      $this->db->where("active = TRUE AND release_date <= NOW()");
    }
    $this->db->order_by('release_date DESC');
    if($limit != 0) {
      $this->db->limit($limit, $offset);
    }
    return $this->db->get("news")->result_array();
  }
}
