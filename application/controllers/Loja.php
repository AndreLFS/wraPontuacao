<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends MY_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('Cliente_model', 'cliente');
        $this->load->model('Brinde_model', 'brinde');
        $this->load->model('Ponto_model', 'ponto');
        $this->load->model('Pedido_model', 'pedido');
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
		$dados['cliente'] = $this->cliente->getCliente($this->session->userdata("logado"));
		$this->template->load('templateLoja', 'home', $dados);
	}

	public function visualizar($id){
        $dados['brinde'] = $this->brinde->getList($id);
        $dados['cliente'] = $this->cliente->getCliente($this->session->userdata("logado"));
        $this->template->load('templateLoja', 'brinde/visualizar', $dados);
    }

    public function informacoes(){
        $dados['cliente'] = $this->cliente->getCliente($this->session->userdata("logado"));
        $this->template->load('templateLoja', 'cliente/visualizar', $dados);
    }
    public function senha(){
    	$id = $this->session->userdata("logado");
    	$dados['cliente'] = $this->cliente->getCliente($id);

    	if(!empty($this->input->post('senhaAtual'))){
    		$senhaAtual = md5($this->input->post('senhaAtual'));
    		$novaSenha =  md5($this->input->post('nova'));
    		$confirmaSenha =  md5($this->input->post('confirmar'));
    		if($novaSenha === $confirmaSenha){
    			$data['senha'] = md5($this->input->post('nova'));
	    		if($senhaAtual === $dados['cliente']->senha){
	    			$cliente['senha'] = $novaSenha;
	    			$this->cliente->update($cliente, $id);
	    			$dados['msg'] = 'Senha Alterada com sucesso';
	    		}else{
	    			$dados['erro'] = 'Senha atual incorreta!';
	    		}
    		}else{
    			$dados['erro'] = 'As senhas não coincidem!';
    		}
    	}
        $this->template->load('templateLoja', 'cliente/alterarSenha', $dados);
    }

    public function pontos(){
        $dados['cliente'] = $this->cliente->getCliente($this->session->userdata("logado"));
        $dados['pontosTable'] = $this->ponto->getPontoTable();
        $this->template->load('templateLoja', 'cliente/pontos', $dados);
    }

    public function carrinho($id){
        $dados['brinde'] = $this->brinde->getList($id);
        $dados['cliente'] = $this->cliente->getCliente($this->session->userdata("logado"));
        $this->template->load('templateLoja', 'brinde/carrinho', $dados);
    }

    public function pedido($id = null){
        if($id != null){
            $brindeCompra = $this->brinde->getList($id);
            $cliente = $this->cliente->getCliente($this->session->userdata("logado"));
            $dados['cliente'] = $cliente;
            $dados['brinde'] = $brindeCompra;
            if( $cliente->pontos >= $brindeCompra->pontuacao ){
                $brinde['data'] = 'current_date';
                $brinde['status'] = '0';
                $brinde['idCliente'] = $cliente->idCliente;
                $brinde['idPraca'] = $cliente->idPraca;
                $brinde['idBrinde'] =  $brindeCompra->idBrinde;
                $brinde['pontos'] =  $brindeCompra->pontuacao;
                $brinde['data'] =   date('Y-m-d');
                $pedido = $this->pedido->salvar($brinde);

                $this->ponto->criarPedido($cliente->idCliente, $brindeCompra->pontuacao);
                redirect(base_url('loja/msg/realizado'));
                return;
            }else{
                redirect(base_url('loja/msg/negado'));
                return;
            }
        }
        $this->template->load('templateLoja', 'brinde/carrinho', $dados);
    }
     public function msg($msg = null){
        $dados['cliente'] = $this->cliente->getCliente($this->session->userdata("logado")); 
        if($msg === 'negado'){
            $this->template->load('templateLoja', 'pedido/negado', $dados);
        }else{
            $this->template->load('templateLoja', 'pedido/realizado', $dados);
        }
    }

    public function pedidos(){
        $dados ['pedidoTable'] = $this->pedido->getPedidoTableCliente($this->session->userdata("logado"));
        $this->template->load('template', 'cliente/pedido', $dados);
    }

}