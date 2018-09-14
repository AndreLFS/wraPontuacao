<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Cliente_model', 'cliente');
        $this->load->model('Praca_model', 'praca');
    }

	public function index(){
		$dados ['clienteTable'] = $this->cliente->getClienteTable();
        
        $this->template->load('template', 'cliente/listar', $dados);
	}

	public function salvar(){
		$dados ['msg'] = '';
		$dados ['erro'] = '';
        $dados ['select_praca'] = $this->praca->select_praca();
		if(!empty($this->input->post('nome'))){
            $data['nome'] = $this->input->post('nome');
            $data['cpf'] = $this->input->post('cpf');
            $data['senha'] = md5($this->input->post('cpf'));
            $data['idPraca'] = $this->input->post('praca');
            $data['rua'] = $this->input->post('rua');
            $data['numero'] = $this->input->post('numero');
            $data['bairro'] = $this->input->post('bairro');
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('estado');
            //$data['ponto_referencia'] = $this->input->post('ponto_referencia');

            if(empty($this->input->post('id'))){
                if($this->cliente->salvar($data)){
                	$dados ['msg'] = 'Cliente cadastrado com sucesso';
                }else{
                	$dados ['erro'] = 'Erro ao cadastrar o cliente';
                }
            }
        }
       $this->template->load('template', 'cliente/salvar', $dados);
	}

}