<?php
namespace {

  class Item extends MY_Controller {

    public function itemCategories () {
      $this->load->model("m_item");
      $cat = $this->m_item->getCategoryList();
      echo json_encode($cat, JSON_PRETTY_PRINT);
    }

    public function itemAddEdit () {
      $postVal = filter_input_array(INPUT_POST);
      $this->load->model("m_item");
      if(!empty($postVal["edit"]) && $postVal["edit"] === "-1") {
        $return = $this->m_item->addNewItem($postVal["data"]);
      }
      else if(!empty($postVal["edit"])) {
        $return = $this->m_item->editItem($postVal["data"], $postVal["edit"]);
      }
      else {
        $return = "ERREUR (1)";
      }

      echo $return;
    }

    public function itemCategory ($category=null) {
      $postVal = filter_input_array(INPUT_POST) ?? ["category" => $category];
      if(!empty($postVal["category"])) {
        $this->load->model("m_item");
        $data = $this->m_item->getItemFromCategory($postVal["category"]);
        echo json_encode($data);
      }
    }

    public function itemInfo($id=null) {
      $postVal = filter_input_array(INPUT_POST) ?? ["id" => $id];
      if(!empty($postVal["id"])) {
        $this->load->model("m_item");
        $data = $this->m_item->getItemDetail($postVal["id"]);
        echo json_encode($data);
      }
    }

    public function itemDelete($id=null) {
      $postVal = filter_input_array(INPUT_POST) ?? ["id" => $id];
      if(!empty($postVal["id"])) {
        $this->load->model("m_item");
        return $this->m_item->deleteItem($postVal["id"]);
      }
    }

  }

}
