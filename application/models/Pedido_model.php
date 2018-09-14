<?php
class Pedido_model extends CI_Model {


  public function getPedidoTable(){
    $query = $this->db->get('pedido');
    $pedidos = $query->result_array();
    $tabela = '';
    foreach ($pedidos as $pedido){
      $tabela .='<tr><td>'.$pedido['idPedido'].'</td>
        <td>'.$pedido['data'].'</td>
        <td>'.$pedido['status'].'</td>
        <td>'.$pedido['praca'].'</td>
        <td>
          <button type="button" class="btn btn-primary btn-xs"><a href="'.base_url().'pedido/editar/'.$pedido['idPedido'].'"><i class="fa fa-pencil"></i></a></button>
            <button type="button" class="btn btn-danger btn-xs"><a href="'.base_url().'pedido/apagar/'.$pedido['idPedido'].'"><i class="fa fa-trash"></i></a></button>  
        </td
        </tr>';
    }      
    return $tabela;
  }
  
}
?>