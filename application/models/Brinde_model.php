<?php
class Brinde_model extends CI_Model {


  public function salvar($brinde = null){
    if($brinde != null){
      $this->db->insert('brinde', $brinde); 
     if($this->db->insert_id() > 0) {
        return $this->db->insert_id();
      }
    }
    return null;
  }

   public function getBrindeTable(){
    $query = $this->db->get('brinde');
    $brindes = $query->result_array();
    $tabela = '';
    foreach ($brindes as $brinde){
      $tabela .='<tr><td>'.$brinde['idBrinde'].'</td>
        <td>'.$brinde['titulo'].'</td>
        <td>'.$brinde['pontuacao'].'</td>
        <td>
          <button type="button" class="btn btn-primary btn-xs"><a href="'.base_url().'brinde/editar/'.$brinde['idBrinde'].'"><i class="fa fa-pencil"></i></a></button>
            <button type="button" class="btn btn-danger btn-xs"><a href="'.base_url().'brinde/apagar/'.$brinde['idBrinde'].'"><i class="fa fa-trash"></i></a></button>  
        </td
        </tr>';
    }      
	    return $tabela;
	}

  public function getList($id = null){
    if($id === null){
      $query = $this->db->get('brinde');
      $brindes = $query->result_array();

      foreach ($brindes as $brinde => $item){
        $brindes[$brinde]['imagem'] = $this->imagemBrinde($item['idBrinde']);
      }
      return $brindes;
    }else{
      $query = $this->db->get_where('brinde', array('idBrinde' => $id));
      $brindes = $query->result();
      $brindes['0']->imagem = $this->imagemBrinde($id);
      return $brindes['0'];
    }
    
  }

  private function imagemBrinde($brinde){
    return ($this->db->get_where('brindeimg', array('idBrinde' => $brinde))->result()['0']->url);
  }
}
?>