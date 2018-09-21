<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Praca extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Praca_model', 'praca');
    }

	public function index(){
        $dados ['pracaTable'] = $this->praca->getPracaTable();
		$this->template->load('template', 'praca/listar', $dados);
	}

	public function salvar(){
		$dados ['msg'] = '';
		$dados ['erro'] = '';

		if(!empty($this->input->post('nome'))){
            $data['nome'] = $this->input->post('nome');

            if(empty($this->input->post('id'))){
                if($this->praca->salvar($data)){
                	$dados ['msg'] = 'Praca cadastrado com sucesso';
                }else{
                	$dados ['erro'] = 'Erro ao cadastrar o praca';
                }
            }
        }
       $this->template->load('template', 'praca/salvar', $dados);
	}

    

}