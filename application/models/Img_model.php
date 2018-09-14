<?php
class Img_model extends CI_Model {


  public function salvar($brinde = null){
    if($brinde != null){
      $this->db->insert('brindeimg', $brinde); 
     if($this->db->insert_id() > 0) {
        return $this->db->insert_id();
      }
    }
    return null;
  }
}
?>