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
      <td>'.$logponto['quantidade'].'</td>
      <td>'.$logponto['entrada'].'</td>
      </tr>';
    }      
    return $tabela;
  }
}
?>