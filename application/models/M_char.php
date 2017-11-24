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

  public function charDetails($char) {
    return $this->db->where("name",$char)->get("jdr_chars")->result_array();
  }

  public function allCharDetails() {
    return $this->db->join('wow_class cl','(ch.class = cl.name_m OR ch.class = cl.name_f)','left')->get("jdr_chars ch")->result_array();
  }

  public function getCharComp ($char_id, $need_id = 0) {
    $fields = ["cp.name", "concat((cp.val_base + coalesce(cc.val,0)),'%') as val"];
    if($need_id == 1) {

      $btn_left = "'<button class=''btn btn-default btn-xs btn-xxs''><i class=''fa fa-minus''></i></button> '";
      $btn_right = "' <button class=''btn btn-default btn-xs btn-xxs''><i class=''fa fa-plus''></i></button>'";

      $fields = [
          "cp.name",
          "concat( '<button class=''btn btn-default btn-xs btn-xxs change_comp'' onclick=''change_comp(', cp.comp_id, ', \"-\") '' ><i class=''fa fa-minus''></i></button> ' ,"
               . " '<span id=''comp_val_', cp.comp_id, '''>', (cp.val_base + coalesce(cc.val,0)), '</span>%', "
               . "' <button class=''btn btn-default btn-xs btn-xxs change_comp'' onclick=''change_comp(', cp.comp_id, ', \"+\") '' ><i class=''fa fa-plus''></i></button>' "
          . ") as val",
          "cp.comp_id"];
    }
    $this->db->select($fields);
    $this->db->join("char_comp cc", "(cc.comp_id = cp.comp_id and cc.char_id = {$this->db->escape($char_id)})", "left");
    $this->db->join("jdr_chars ch", "(cc.char_id = ch.char_id and ch.char_id = {$this->db->escape($char_id)})", "left");
    $this->db->order_by("cp.name");
    return $this->db->get("competence cp")->result_array();
  }

  public function getCharSkill ($char_id, $need_id = 0) {
    $fields = ["name", "effect", "worth"];
    if($need_id == 1) {
      $fields[] = "skill_id";
    }
    $this->db->select($fields);
    $this->db->where("char_id",$char_id);
    $this->db->order_by("name");
    return $this->db->get("skill")->result_array();
  }

  public function updateComp ($char_id, $comp_id, $sign) {
    if ($this->db->select("count(*) as count")->where('char_id',$char_id)->where('comp_id', $comp_id)->get('char_comp')->row()->count > 0) {
      $this->db->where('char_id', $char_id);
      $this->db->where('comp_id', $comp_id);
      $this->db->set('val', 'val'.$sign.'5', false);
      //echo $this->db->get_compiled_update("char_comp");
      $this->db->update('char_comp');
    }
    else {
      $this->db->set('char_id',$char_id);
      $this->db->set('comp_id',$comp_id);
      $this->db->set('val', '5');
      $this->db->insert('char_comp');
    }
  }
}