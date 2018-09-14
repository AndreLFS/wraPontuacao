<?php
class Praca_model extends CI_Model {

  public function salvar($admin = null){
    if($admin != null){
      $this->db->insert('praca', $admin); 
      if($this->db->insert_id() > 0) {
        return true;
      }
    }
    return false;
  }

  public function select_Praca(){
     $query = $this->db->get('praca');
    $pracas = $query->result_array();
    $select = '<option></option>';
    foreach ($pracas as $praca){
      $select .='<option value='.$praca['idPraca'].'>'.$praca['nome'].'</option>';
    }      
    return $select;
  }

  public function getPracaTable(){
    $query = $this->db->get('praca');
    $pracas = $query->result_array();
    $tabela = '';
    foreach ($pracas as $praca){
      $tabela .='<tr><td>'.$praca['idPraca'].'</td>
      <td>'.$praca['nome'].'</td>
      <td>
      <button type="button" class="btn btn-primary btn-xs"><a href="'.base_url().'praca/editar/'.$praca['idPraca'].'"><i class="fa fa-pencil"></i></a></button>
      <button type="button" class="btn btn-danger btn-xs"><a href="'.base_url().'praca/apagar/'.$praca['idPraca'].'"><i class="fa fa-trash"></i></a></button>  
      </td
      </tr>';
    }      
    return $tabela;
  }
}
?>