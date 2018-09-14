<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
    }

	public function index(){
        $dados ['adminTable'] = $this->admin->getAdminTable();
        
		$this->template->load('template', 'admin/listar', $dados);
	}

	public function salvar(){
		$dados ['msg'] = '';
		$dados ['erro'] = '';

		if(!empty($this->input->post('nome'))){
            $data['nome'] = $this->input->post('nome');
            $data['login'] = $this->input->post('login');
            $data['senha'] = md5($this->input->post('senha'));
            

            if(empty($this->input->post('id'))){
                if($this->admin->salvar($data)){
                	$dados ['msg'] = 'Administrador Cadastrado com sucesso';
                }else{
                	$dados ['erro'] = 'Erro ao cadastrar o administrador';
                }
            }
        }
       $this->template->load('template', 'admin/salvar', $dados);
	}

}