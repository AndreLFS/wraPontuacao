<?php
class Admin_model extends CI_Model {


  public function salvar($admin = null){
    if($admin != null){
      $this->db->insert('admin', $admin); 
     if($this->db->insert_id() > 0) {
        return true;
      }
    }
    return false;
  }
  public function login($dados = NULL){
    if($dados != NULL){
      $query = $this->db->get_where('admin', $dados);
      //se tiver mais de um registro o login é positivo
      if($query->num_rows() > 0){
        return $query->result() ; 
      }
    }
    return false;
  }

  public function getAdminTable(){
    $query = $this->db->get('admin');
    $admins = $query->result_array();
    $tabela = '';
    foreach ($admins as $admin){
      $tabela .='<tr><td>'.$admin['idAdmin'].'</td>
        <td>'.$admin['nome'].'</td>
        <td>'.$admin['login'].'</td>
        <td>
          <button type="button" class="btn btn-primary btn-xs"><a href="'.base_url().'admin/editar/'.$admin['idAdmin'].'"><i class="fa fa-pencil"></i></a></button>
            <button type="button" class="btn btn-danger btn-xs"><a href="'.base_url().'admin/apagar/'.$admin['idAdmin'].'"><i class="fa fa-trash"></i></a></button>  
        </td
        </tr>';
    }      
    return $tabela;
  }
  
}
?>