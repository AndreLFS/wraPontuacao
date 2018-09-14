<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function index(){
		$dados['erro'] = '';
		$this->load->view('login', $dados);
	}

	public function entrar(){
		if(!empty($this->input->post("login"))){
			$cliente['cpf'] = $this->input->post("login");
			$cliente['senha'] = md5($this->input->post("senha"));

			$this->load->model('cliente_model', 'cliente');

	        $query = $this->cliente->login($cliente);
	        //primeiro testa se é um cliente
	        if($query != false){
	        	//se for cliente seta a sessão dele com o id da cliente
	            $this->session->set_userdata("logado", $query['0']->idCliente);
				redirect(base_url('loja'));
				return;
	        }else{
	        	$data['login'] = $this->input->post("login");
				$data['senha'] = md5($this->input->post("senha"));
				$this->load->model('admin_model', 'admin');
				$adm = $this->admin->login($data);
				if($adm != false){
					//se for admin seta a sessao como 1, para saber q é um admin
					$this->session->set_userdata("logado", '1');
					redirect(base_url('home'));
					return;
				}else{
					$dados['erro'] = "Usuário/Senha incorretos";
					$this->load->view('login', $dados);
					return;
				}
			}
		}
		$dados['erro'] = "Erro No Login";
		$this->load->view('login', $dados);
	}


	public function logout(){
		$this->session->unset_userdata("logado");
		redirect(base_url());
	}
}
