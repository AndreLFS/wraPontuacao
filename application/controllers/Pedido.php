<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Pedido_model', 'pedido');
        $this->load->model('Praca_model', 'praca');
    }

	public function index(){
        $dados ['pedidoTable'] = $this->pedido->getPedidoTable();
        $this->template->load('template', 'pedido/listar', $dados);
    }

    public function detalhes($id){
        $dados ['pedido'] = $this->pedido->getPedidoCliente($id);
        $this->template->load('template', 'pedido/detalhes', $dados);
    }

    public function confirmar($id){
        if(isset($id)){
            $this->pedido->confirmar($id, '1');
            $dados ['pedido'] = $this->pedido->getPedidoCliente($id);
            $this->template->load('template', 'pedido/detalhes', $dados);
        }
    }
    public function confirmados(){
        $dados ['select_Praca'] = $this->praca->select_Praca();
        $dados ['tabel'] = $this->pedido->getPedidoTablePraca();
$dados ['cabecalho'] = $this->pedido->cabecalho();

        $this->template->load('template', 'pedido/carga', $dados);
    
    }
    

    

}