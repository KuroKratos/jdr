<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_Char extends CI_Model {

  private $db;

  public function __construct() {
    parent::__construct();
    $this->db = $this->load->database('default', TRUE, TRUE);
  }

  // Returns an array listing every character's name
  public function charList() {
    $query = $this->db->select('name')->get('jdr_chars')->result_array();
    $list = array_column($query, 'name');
    return $list;
  }

  // Returns an array of unique character's stats
  public function charDetails($char) {
    return $this->db->where("name",$char)->get("jdr_chars")->result_array();
  }

  // Almost same as above but you can set columns you want
  public function getCharInfo($char_id, $columns = null) {
    if(!empty($columns) && is_array($columns)) {
      $this->db->select($columns);
    }
    return $this->db->where("char_id",$char_id)->get("jdr_chars")->row_array();
  }

  // Returns nested array of every character's stats
  public function allCharDetails() {
    return $this->db->join('wow_class cl','(ch.class = cl.name_m OR ch.class = cl.name_f)','left')->get("jdr_chars ch")->result_array();
  }

  // Returns an array of character competences (with pre-built +/- button to edit the stat)
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

  // Returns an array of an unique character's skills (with pre-built <<edit>> and <<delete>> buttons)
  public function getCharSkill ($char_id, $need_id = 0) {
    $btn_edit = "concat('<div class=\"btn-group\"><button class=\"btn btn-primary btn-xs\" onclick=\"edit_skill(',skill_id,')\"><i class=\"fa fa-edit\"></i></button><button class=\"btn btn-danger btn-xs\" onclick=\"prompt_delete_skill(',skill_id,')\"><i class=\"fa fa-remove\"></i></button></div>') as edit";
    $fields = [$btn_edit,"name", "effect", "worth"];
    if($need_id == 1) {
      $fields[] = "skill_id";
    }
    $this->db->select($fields);
    $this->db->where("char_id",$char_id);
    $this->db->order_by("name");
    return $this->db->get("skill")->result_array();
  }

  // Returns an array of an unique character's items
  public function getCharInventory ($char_id, $need_id = 0) {
    $btn_edit = "concat('<div class=\"btn-group\"><button class=\"btn btn-primary btn-xs\" onclick=\"edit_item(',item_id,')\"><i class=\"fa fa-edit\"></i></button><button class=\"btn btn-danger btn-xs\" onclick=\"prompt_delete_item(',item_id,')\"><i class=\"fa fa-remove\"></i></button></div>') as edit";
    $fields = ["quantity","name", "description", $btn_edit];
    if($need_id == 1) {
      $fields[] = "item_id";
    }
    $this->db->select($fields);
    $this->db->where("char_id",$char_id);
    $this->db->order_by("name");
    return $this->db->get("inventory")->result_array();
  }

  // Adds or remove 5% to a character's competence depending on $sign (if not set, creates the table row)
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

  // Adds a skill into the character's skill table
  public function addSkill($char, $name, $cost, $desc) {
    $this->db->set('char_id', $char);
    $this->db->set('name',    $name);
    $this->db->set('worth',   $cost);
    $this->db->set('effect',  $desc);
    $this->db->insert('skill');
  }

  // Adds an item into the character's inventory table
  public function addItem($char, $name, $qty, $desc) {
    $this->db->set('char_id',      $char);
    $this->db->set('name',         $name);
    $this->db->set('quantity',     $qty);
    $this->db->set('description',  $desc);
    $this->db->insert('inventory');
  }

  // Updates a skill in the character's skill table
  public function editSkill($id, $name, $cost, $desc) {
    $this->db->set('name',    $name);
    $this->db->set('worth',   $cost);
    $this->db->set('effect',  $desc);
    $this->db->where('skill_id',$id);
    //echo $this->db->get_compiled_insert("skill");
    $this->db->update('skill');
  }

  // Updates a item in the character's inventory table
  public function editItem($id, $name, $qty, $desc) {
    $this->db->set('name',        $name);
    $this->db->set('quantity',    $qty);
    $this->db->set('description', $desc);
    $this->db->where('item_id',   $id);
    //echo $this->db->get_compiled_insert("skill");
    $this->db->update('inventory');
  }

  // Deletes skill identified by $skill_id
  public function deleteSkill ($skill_id) {
    $this->db->where('skill_id',$skill_id);
    $this->db->delete('skill');
  }

  // Deletes item identified by $item_id
  public function deleteItem ($item_id) {
    $this->db->where('item_id',$item_id);
    $this->db->delete('inventory');
  }

  // Returns info array of a specific skill
  public function getSkillInfo ($skill_id) {
    return $this->db->where('skill_id',$skill_id)->get('skill')->row_array();
  }

  // Returns info array of a specific item
  public function getItemInfo ($item_id) {
    return $this->db->where('item_id',$item_id)->get('inventory')->row_array();
  }

  // Updates a character's statistic, identified by $column
  public function updateChar ($char_id, $column, $value) {
    $this->db->set($column,$value)->where('char_id',$char_id)->update('jdr_chars');
  }
}