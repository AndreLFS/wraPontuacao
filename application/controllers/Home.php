<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Brinde_model', 'brinde');
    }


	public function index(){
		$lista = $this->brinde->getList();
		$itens = '';
		$a = 0;
		foreach($lista as $product_item){
			$itens .= '<div class="col-sm-4">'.$this->load->view('brinde', $product_item, TRUE).'</div>';
			if($a >= 2) {
				$a = 0;
				$itens .= '</div><div class="row">';
			} else {
				$a++;
			}
		}
		$dados['produtos'] = $itens;
		
		$this->template->load('template', 'home', $dados);
	}

}