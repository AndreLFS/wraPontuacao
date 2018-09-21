<?php
class Cliente_model extends CI_Model {

  function __construct(){
      parent::__construct();
      $this->load->model('Ponto_model', 'ponto');
  }

  public function salvar($admin = null){
    if($admin != null){
      $this->db->insert('cliente', $admin); 
      if($this->db->insert_id() > 0) {
        return true;
      }
    }
    return false;
  }

  public function login($dados = NULL){
    if($dados != NULL){
      $query = $this->db->get_where('cliente', $dados);
      //se tiver mais de um registro o login é positivo
      if($query->num_rows() > 0){
        return $query->result() ; 
      }
    }
    return false;
  }

  public function getClienteTable(){
    $query = $this->db->get('cliente');
    $clientes = $query->result_array();
    $tabela = '';
    foreach ($clientes as $cliente){
      $tabela .='<tr><td>'.$cliente['idCliente'].'</td>
      <td>'.$cliente['nome'].'</td>
      <td>'.$cliente['cpf'].'</td>
      <td>'.$cliente['pontos'].'</td>
      <td>
      <button type="button" class="btn btn-primary btn-xs"><a href="'.base_url().'cliente/editar/'.$cliente['idCliente'].'"><i class="fa fa-pencil"></i></a></button>
      <button type="button" class="btn btn-danger btn-xs"><a href="'.base_url().'cliente/apagar/'.$cliente['idCliente'].'"><i class="fa fa-trash"></i></a></button>  
      </td
      </tr>';
    }      
    return $tabela;
  }

   public function getCliente($id){
    $query = $this->db->get_where('cliente', array('idCliente' => $id));
    $query->result()['0']->pontos = $this->ponto->pontos($id);
    return  $query->result()['0'];
  }


  public function update($dados = NULL, $id = NULL){
    if($dados != NULL && $id != NULL){
      $this->db->update('cliente', $dados, array('idCliente' => $id));
    }
  }
  public function getVendedoraByPraca($praca = null){
    if ($praca != null) {   
      return $this->db
          ->where("idPraca", $praca)
          ->order_by("nome")
          ->get("cliente");
   }
  }

  public function select_Vendedora($praca = null){
      $vendedoras = $this->getVendedoraByPraca($praca);
      $option = "<option value=''></option>";
      foreach($vendedoras ->result() as $linha) {
          $option .= "<option value='$linha->idCliente'>$linha->nome</option>"; 
      }
      return  $option;
  }
}
?>