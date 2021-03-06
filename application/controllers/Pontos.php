<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Praca_model', 'praca');
        $this->load->model('Ponto_model', 'ponto');
        $this->load->model('Cliente_model', 'cliente');
    }

	public function index(){
        $dados ['pracaTable'] = $this->praca->getPracaTable();
		$this->template->load('template', 'praca/listar', $dados);
	}

	public function salvar(){
    	$dados ['msg'] = '';
    	$dados ['erro'] = '';
        $dados ['praca'] = $this->praca->select_Praca();
        if(!empty($this->input->post('pontos'))){
            $data['idCliente'] = ($this->input->post('cliente'));
            $data['pontos'] = ($this->input->post('pontos'));
            $data['restante'] = $data['pontos'];
            $data['data'] = ($this->input->post('data'));
            $data['descricao'] = ($this->input->post('descricao'));
            $data['entrada'] = '1';
            if($this->ponto->salvar($data)){
                $dados ['msg'] = 'Cadastrado Com sucesso';
            }else{
                $dados ['erro'] = 'Erro no cadastro';
            }
        }
        $this->template->load('template', 'pontos/salvar', $dados);
	}

    

}