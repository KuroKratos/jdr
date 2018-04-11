<?php
namespace {

  class M_Item extends CI_Model {

    private $db;

    public function __construct() {
      parent::__construct();
      $this->db = $this->load->database("default", true, true);
    }

/*
    ===========================================================
    SELECT FUNCTIONS (NO ACTION ON DATA)
    ===========================================================
*/

    // Returns an array listing all items categories
    public function getCategoryList() {
      return $this->db->get("item_category")->result_array();
    }

    // Returns every item from specified category
    public function getItemFromCategory($category) {
      $this->db->where("category", $category);
      return $this->db->get("item")->result_array();
    }

    // Returns information of an item with specified ID
    public function getItemDetail($id) {
      $this->db->select("c.name cat_name, i.*");
      $this->db->join("item_category c", "c.id = i.category");
      $this->db->where("i.id", $id);
      return $this->db->get("item i")->row_array();
    }

    // Returns every items in table
    public function getItemList() {
      $this->db->select("c.name category, i.id id, i.name name");
      $this->db->join("item_category c", "i.category = c.id");
      $this->db->order_by("i.category");
      return $this->db->get("item i")->result_array();
    }

    public function searchItem($search) {
      $this->db->select("c.name cat_name, i.*");
      $this->db->like("i.name", $search);
      $this->db->or_like("c.name", $search);
      $this->db->or_like("i.id", $search);
      $this->db->or_like("i.description", $search);
      $this->db->or_like("i.bonus_stat", $search);
      $this->db->join("item_category c", "c.id = i.category");
      return $this->db->get("item i")->result_array();
      //return $this->db->get_compiled_select("item i");
    }

/*
    ===========================================================
    INSERT / UPDATE FUNCTIONS (ADD OR ALTER DATA)
    ===========================================================
*/

    // Insert a new item into the table
    public function addNewItem($data) {
      return $this->db->insert("item", $data);
    }

    // Edit an existing item from the table
    public function editItem($data, $id) {
      $this->db->where("id", $id);
      return $this->db->update("item", $data);
    }

/*
    ===========================================================
    DELETE / TRUNCATE / DROP FUNCTIONS (REMOVES DATA)
    ===========================================================
*/

    // Deletes an item from the table
    public function deleteItem($id) {
      $this->db->where("id", $id);
      return $this->db->delete("item");
    }

  }

}
