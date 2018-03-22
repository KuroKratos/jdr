<?php
namespace {

  class Ajax extends MY_Controller {

    // ======================================================== //
    //  Every functions below are meant to be called with AJAX  //
    // ======================================================== //

    // Prints the number of online characters
    public function getAllCharDetail () {
      $this->load->model("m_char");
      $chars = $this->m_char->allCharDetails();
      echo json_encode($chars, JSON_PRETTY_PRINT);
    }

    public function getCharComp ($char_id=null, $need_id=0) {
      $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
      if(!empty($post["char_id"])) {
        $this->load->model("m_char");
        $comp = $this->m_char->getCharComp($post["char_id"], $need_id);
        echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
      }
    }

    public function getCharSkill ($char_id=null, $need_id=0) {
      $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
      if(!empty($post["char_id"])) {
        $this->load->model("m_char");
        $comp = $this->m_char->getCharSkill($post["char_id"], $need_id);
        echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
      }
    }

    public function inventoryPanel($char_id) {
      $params = ["char_id" => $char_id];
      $this->load->view("panel/inventory", $params);
    }

    public function getCharInventory ($char_id=null, $need_id=0) {
      $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
      if(isset($post["char_id"])) {
        $this->load->model("m_char");
        $comp = $this->m_char->getCharInventory($post["char_id"], $need_id);
        echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
      }
    }

    public function getSkillInfo ($skill_id=null) {
      $post = filter_input_array(INPUT_POST) ?? ["skill_id" => $skill_id];
      if(!empty($post["skill_id"])) {
        $this->load->model("m_char");
        $skill = $this->m_char->getSkillInfo($post["skill_id"]);
        echo json_encode($skill, JSON_PRETTY_PRINT);
      }
    }

    public function getItemInfo ($item_id=null) {
      $post = filter_input_array(INPUT_POST) ?? ["item_id" => $item_id];
      if(!empty($post["item_id"])) {
        $this->load->model("m_char");
        $item = $this->m_char->getItemInfo($post["item_id"]);
        echo json_encode($item, JSON_PRETTY_PRINT);
      }
    }

    public function changeCompVal ($char_id=null, $comp_id=null, $sign=null) {
      if(!empty($char_id) && !empty($comp_id) && !empty($sign)) {
        $this->load->model("m_char");
        $send_sign = ($sign === "plus") ? "+" : "-";
        $this->m_char->updateComp($char_id, $comp_id, $send_sign);
      }
    }

    public function getCharInfo($char_id=null) {
      $post = filter_input_array(INPUT_POST) ?? [
        "char_id" => $char_id,
        "columns" => null,
      ];
      if(!empty($post["char_id"])) {
        $this->load->model("m_char");
        $info = $this->m_char->getCharInfo($post["char_id"], $post["columns"] ?? null);
        echo json_encode($info, JSON_PRETTY_PRINT);
      }
    }

    public function addEditSkill() {
      $post = filter_input_array(INPUT_POST);
      if(!empty($post["char_id"]) && !empty($post["name"]) && !empty($post["id"]) && $post["id"] === -1) {
        echo "NEW SKILL";
        $this->load->model("m_char");
        $this->m_char->addSkill($post["char_id"], $post["name"], $post["cost"], $post["desc"]);
      } else {
        echo "UPDATE SKILL";
        $this->load->model("m_char");
        $this->m_char->editSkill($post["id"], $post["name"], $post["cost"], $post["desc"]);
      }
    }

    public function addEditItem() {
      $post = filter_input_array(INPUT_POST);
      if(!empty($post["char_id"]) && !empty($post["name"]) && !empty($post["id"]) && $post["id"] === -1) {
        echo "NEW ITEM";
        $this->load->model("m_char");
        $this->m_char->addItem($post["char_id"], $post["name"], $post["qty"], $post["desc"]);
      } else {
        echo "UPDATE ITEM";
        $this->load->model("m_char");
        $this->m_char->editItem($post["id"], $post["name"], $post["qty"], $post["desc"]);
      }
    }

    public function deleteSkill($skill_id=null) {
      $post = filter_input_array(INPUT_POST) ?? ["skill_id" => $skill_id];
      if(!empty($post["skill_id"])) {
        $this->load->model("m_char");
        $this->m_char->deleteSkill($post["skill_id"]);
      }
    }

    public function deleteItem($item_id=null) {
      $post = filter_input_array(INPUT_POST) ?? ["item_id" => $item_id];
      if(!empty($post["item_id"])) {
        $this->load->model("m_char");
        $this->m_char->deleteItem($post["item_id"]);
      }
    }

    public function updateChar() {
      $post = filter_input_array(INPUT_POST);
      if(!empty($post["char_id"]) && !empty($post["column"]) && isset($post["value"])) {
        $this->load->model("m_char");
        $this->m_char->updateChar($post["char_id"], $post["column"], $post["value"]);
      }
    }

    public function getEnnemyList () {
      $this->load->model("m_ennemy");
      $ennemies = $this->m_ennemy->ennemyList();
      echo json_encode($ennemies, JSON_PRETTY_PRINT);
    }

    public function getEnnemyInfo($ennemy_id=null) {
      $post = filter_input_array(INPUT_POST) ?? [
        "ennemy_id" => $ennemy_id,
        "columns"   => null,
      ];
      if(!empty($post["ennemy_id"])) {
        $this->load->model("m_ennemy");
        $info = $this->m_ennemy->ennemyInfo($post["ennemy_id"], $post["columns"] ?? null);
        echo json_encode($info, JSON_PRETTY_PRINT);
      }
    }

  }

}
