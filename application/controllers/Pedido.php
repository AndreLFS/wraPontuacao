<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1')){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Pedido_model', 'pedido');
    }

	public function index(){
        $dados ['pedidoTable'] = $this->pedido->getPedidoTable();
		$this->template->load('template', 'pedido/listar', $dados);
	}

	public function salvar(){
		$dados ['msg'] = '';
		$dados ['erro'] = '';

		if(!empty($this->input->post('nome'))){
            $data['nome'] = $this->input->post('nome');

            if(empty($this->input->post('id'))){
                if($this->pedido->salvar($data)){
                	$dados ['msg'] = 'Pedido cadastrado com sucesso';
                }else{
                	$dados ['erro'] = 'Erro ao cadastrar o pedido';
                }
            }
        }
       $this->template->load('template', 'pedido/salvar', $dados);
	}

    

}