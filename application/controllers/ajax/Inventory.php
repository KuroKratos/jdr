<?php
namespace {

  class Inventory extends MY_Controller {

    public function inventoryPanel($char_id) {
      $params = ["char_id" => $char_id];
      $this->load->view("panel/inventory", $params);
    }

    public function inventoryChar ($char_id=null, $need_id=0) {
      $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
      if(isset($post["char_id"])) {
        $this->load->model("m_char");
        $comp = $this->m_char->getCharInventory($post["char_id"], $need_id);
        echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
      }
    }

    public function inventoryItem ($item_id=null) {
      $post = filter_input_array(INPUT_POST) ?? ["item_id" => $item_id];
      if(!empty($post["item_id"])) {
        $this->load->model("m_char");
        $item = $this->m_char->getItemInfo($post["item_id"]);
        echo json_encode($item, JSON_PRETTY_PRINT);
      }
    }

    public function inventoryAddEdit() {
      $post = filter_input_array(INPUT_POST);
      if(!empty($post["char_id"]) && !empty($post["name"]) && !empty($post["id"]) && $post["id"] === "-1") {
        echo "NEW ITEM";
        $this->load->model("m_char");
        $this->m_char->addItem($post["char_id"], $post["name"], $post["qty"], $post["desc"]);
      } else {
        echo "UPDATE ITEM";
        $this->load->model("m_char");
        $this->m_char->editItem($post["id"], $post["name"], $post["qty"], $post["desc"]);
      }
    }

    public function inventoryDelete($item_id=null) {
      $post = filter_input_array(INPUT_POST) ?? ["item_id" => $item_id];
      if(!empty($post["item_id"])) {
        $this->load->model("m_char");
        $this->m_char->deleteItem($post["item_id"]);
      }
    }

  }

}
