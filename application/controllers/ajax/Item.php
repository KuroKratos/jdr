<?php
namespace {

  class Item extends MY_Controller {

    public function itemCategories () {
      $this->load->model("m_item");
      $cat = $this->m_item->getCategoryList();
      echo json_encode($cat, JSON_PRETTY_PRINT);
    }

  }

}
