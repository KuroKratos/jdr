<?php
namespace JDR;

class Skill extends MY_Controller {

  public function skillChar ($char_id = null, $need_id = 0) {
    $post = filter_input_array(INPUT_POST) ?? ["char_id" => $char_id];
    if(!empty($post['char_id'])) {
      $this->load->model('m_char');
      $comp = $this->m_char->getCharSkill($post['char_id'], $need_id);
      echo json_encode(["data" => $comp], JSON_PRETTY_PRINT);
    }
  }

  public function skillInfo ($skill_id = null) {
    $post = filter_input_array(INPUT_POST) ?? ["skill_id" => $skill_id];
    if(!empty($post['skill_id'])) {
      $this->load->model('m_char');
      $skill = $this->m_char->getSkillInfo($post['skill_id']);
      echo json_encode($skill, JSON_PRETTY_PRINT);
    }
  }

  public function skillAddEdit() {
    $post = filter_input_array(INPUT_POST);
    if(!empty($post['char_id']) && !empty($post['name']) && !empty($post['id']) && $post['id'] == '-1') {
      echo "NEW SKILL";
      $this->load->model('m_char');
      $this->m_char->addSkill($post['char_id'], $post['name'], $post['cost'], $post['desc']);
    } else {
      echo "UPDATE SKILL";
      $this->load->model('m_char');
      $this->m_char->editSkill($post['id'], $post['name'], $post['cost'], $post['desc']);
    }
  }

  public function skillDelete($skill_id = null) {
    $post = filter_input_array(INPUT_POST) ?? ["skill_id" => $skill_id];
    if(!empty($post['skill_id'])) {
      $this->load->model('m_char');
      $this->m_char->deleteSkill($post['skill_id']);
    }
  }
}

?>