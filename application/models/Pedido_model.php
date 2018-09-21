<?php
class Pedido_model extends CI_Model {

  public function salvar($pedido = null){
    if($pedido != null){
      $this->db->insert('pedido', $pedido); 
      if($this->db->insert_id() > 0) {
        return true;
      }
    }
    return false;
  }

  public function getPedidoTable(){
    $this->db->join('praca', 'pedido.idPraca = praca.idPraca');
    $this->db->order_by('pedido.idPraca');
    $query = $this->db->get('pedido');
    $pedidos = $query->result_array();
    $tabela = '';
    foreach ($pedidos as $pedido){
      $tabela .='<tr>
        <td> <a href="'.base_url('pedido/detalhes/').$pedido['idPedido'].'" >'.$pedido['idPedido'].'</a></td> 
        <td>'.$this->pedidoStatus($pedido['status']).'</td>
        <td>'.$pedido['nome'].'</td>
        <td>
          <button type="button" class="btn btn-primary btn-xs"><a class="icon" href="'.base_url().'pedido/editar/'.$pedido['idPedido'].'"><i class="fa fa-pencil"></i></a></button>
            <button type="button" class="btn btn-danger btn-xs"><a class="icon" href="'.base_url().'pedido/apagar/'.$pedido['idPedido'].'"><i class="fa fa-trash"></i></a></button>  
        </td
        </tr>';
    }      
    return $tabela;
  }

  public function getPedidoTableCliente($cliente){
    $this->db->where('idCliente', $cliente); 
    $this->db->join('brinde', 'pedido.idBrinde = brinde.idBrinde');
    $this->db->join('brindeimg', 'brindeimg.idBrinde = brinde.idBrinde');
    $query = $this->db->get('pedido');
    $pedidos = $query->result_array();
    $tabela = '';
    foreach ($pedidos as $pedido){
      $tabela .='<tr>
        <td>'.$pedido['idPedido'].'</td>
        <td><img src="'.base_url('uploads/pequenas/'.$pedido['url']).'" width="13%"/></td>
        <td>'.$pedido['pontos'].'</td>
        <td>'.$pedido['data'].'</td>
        <td>'.$this->pedidoStatus($pedido['status']).'</td>
        </tr>';
    }      
    return $tabela;
  }

  public function getPedidoCliente($id){
    $this->db->join('praca p', 'pedido.idPraca = p.idPraca');
    $this->db->join('cliente c ', 'pedido.idCliente = c.idCliente');
    $this->db->join('brinde b ', 'pedido.idBrinde = b.idBrinde');
    $this->db->join('brindeimg i', 'i.idBrinde = b.idBrinde');
    $this->db->select('i.*, b.*, c.*, p.nome as pracaNome, pedido.*');
    $query = $this->db->get_where('pedido', array('idPedido' => $id));
    $pedido = $query->result()['0'];
    $pedido->descricaoStatus = $this->pedidoStatus($pedido->status);
    return $pedido;
  }

  public function confirmar($id, $statusAtual){
    if($id != null){
      $this->db->update('pedido', array('status' => $statusAtual), array('idPedido' => $id)); 
      return true;
    }
    return false;
  }

  private function pedidoStatus($status){
    if($status == 0){
      return 'Em Analise';
    }else if($status == 1){
      return 'Confirmado';
    }else if($status == 2){
      return 'A caminho';
    }else{
      return 'Entregue';
    }
  }

  public function getPedidoTablePraca(){
    $this->db->join('praca p', 'pedido.idPraca = p.idPraca');
    $this->db->join('cliente c ', 'pedido.idCliente = c.idCliente');
    $this->db->join('brinde b ', 'pedido.idBrinde = b.idBrinde');
    $this->db->join('brindeimg i', 'i.idBrinde = b.idBrinde');
    $this->db->select('i.*, b.*, c.*, p.nome as pracaNome, pedido.*');
    $query = $this->db->get_where('pedido', array('status' => '1'));
    $pedidos = $query->result_array();
    $tabela = '';
    foreach ($pedidos as $pedido){
      $tabela .='<tr>
        <td>'.$pedido['nome'].'</td> 
        <td>'.$pedido['pracaNome'].'</td> 
        <td> Logradouro: '.$pedido['rua'].' Numero: '.$pedido['numero'].' Bairro: '.
        $pedido['bairro'].' Cidade: '.$pedido['cidade'].' Estado: '.$pedido['estado'].' Ponto Referencia: '.$pedido['numero'].'</td>
        <td>'.$pedido['descricao'].'</td>
        </tr>';
    }      
    return $tabela;
  }

  public function cabecalho(){
    $this->db->join('brinde b ', 'pedido.idBrinde = b.idBrinde');
    $this->db->select('b.descricao,  count(pedido.idBrinde) as quantidade');
    $this->db->group_by('pedido.idBrinde');
    $query = $this->db->get_where('pedido', array('status' => '1', 'idPraca' => '1'));
    $pedidos = $query->result_array();
    $tabela ='';
     foreach ($pedidos as $pedido){
      $tabela .='<tr>
        <td>'.$pedido['descricao'].'</td> 
        <td>'.$pedido['quantidade'].'</td> 
        </tr>';
    }     
    return $tabela;
  }

  
}
?>