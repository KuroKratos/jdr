<?php
namespace {

  class M_Ennemy extends CI_Model {

    private $db;

    public function __construct() {
      parent::__construct();
      $this->db = $this->load->database("default", true, true);
    }

    public function ennemyList () {
      return $this->db->select(["id", "name"])->get("bestiary")->result_array();
    }

    public function ennemyInfo ($id) {
      return $this->db->where("id", $id)->get("bestiary")->row_array();
    }

    public function ennemyRandom ($region=null) {
      $this->db->select("r.name as region, b.name as name, rb.weight as rarity, b.*");
      $this->db->join("region r", "r.id = rb.region_id");
      $this->db->join("bestiary b", "rb.bestiary_id = b.id");
      $this->db->where("rb.weight >", 0);
      if(!empty($region)) {
        $this->db->where("rb.region_id =", $region);
      }

      $this->db->order_by(" LOG(1 - RAND()) / rb.weight desc");
      $this->db->limit(1);
      return $this->db->get("region_bestiary rb")->row_array();
    }

    public function regionList () {
      return $this->db->get("region")->result_array();
    }

  }

}
