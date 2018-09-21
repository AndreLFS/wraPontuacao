<?php
class Ponto_model extends CI_Model {

  public function salvar($logpontos = null){
    if($logpontos != null){
      $this->db->insert('logpontos', $logpontos); 
      if($this->db->insert_id() > 0) {
        return true;
      }
    }
    return false;
  }

  public function getPontoTable(){
    $query = $this->db->get('logpontos');
    $logpontos = $query->result_array();
    $tabela = '';
    foreach ($logpontos as $logponto){
      $tabela .='<tr><td>'.$logponto['idLogPontos'].'</td>
      <td>'.$logponto['data'].'</td>
      <td>'.$logponto['pontos'].'</td>
      <td>'.$logponto['entrada'].'</td>
      </tr>';
    }      
    return $tabela;
  }

  public function pontos($id = null){
    $this->db->select_sum('restante'); 
    $this->db->where('idCliente', $id); 
    $this->db->where('vencido', 'false'); 
    $this->db->where('entrada', '1'); 
    $positivos =  $this->db->get('logpontos')->result()['0']->restante; 

    $this->db->select_sum('restante'); 
    $this->db->where('idCliente', $id); 
    $this->db->where('vencido', 'false'); 
    $this->db->where('entrada', '0'); 
    $negativos =  $this->db->get('logpontos')->result()['0']->restante; 
    //se a query retornar vazio o valor tente a ser nulo e na conta isso de um erro
    if ($positivos == null) {
      $positivos = 0;
    }
    if ($negativos == null) {
      $negativos = 0;
    }
    return $positivos - $negativos;
  }

  public function criarPedido($cliente, $pontos){
    $this->db->select('idLogPontos'); 
    $this->db->select('restante'); 
    $this->db->where('idCliente', $cliente); 
    $this->db->where('vencido', 'false'); 
    $this->db->where('entrada', '1'); 
    $this->db->order_by("data", "asc");
    $logpontos =  $this->db->get('logpontos')->result_array(); 
    foreach ($logpontos as $logponto){
      //testando se os pontos são menores que o restante
      //pq se for serão necessarios mais de um
      if(($pontos - $logponto['restante']) > 0){
        $this->update(array('restante' => 0), $logponto['idLogPontos']);
        $pontos -= $logponto['restante'];
      }else{
        $this->update(array('restante' => ( $logponto['restante'] - $pontos)), $logponto['idLogPontos']);
         $pontos = 0;
         return true;
         break;
      }
    }
    return false;   
  }

  public function update($dados = NULL, $id = NULL){
    if($dados != NULL && $id != NULL){
      $this->db->update('logpontos', $dados, array('idLogPontos' => $id));
    }
  }
}
?>