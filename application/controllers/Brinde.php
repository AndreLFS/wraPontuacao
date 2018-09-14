<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brinde extends MY_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata("logado") != '1'){
            redirect(base_url('AcessoNegado'));
        }
        $this->load->model('Brinde_model', 'brinde');
        $this->load->model('Img_model', 'img');
    }

	public function index(){
		$dados ['brindeTable'] = $this->brinde->getBrindeTable();
        
        $this->template->load('template', 'brinde/listar', $dados);
	}
    public function visualizar($id){
        $dados['brinde'] = $this->brinde->getList($id);
        
        $this->template->load('template', 'brinde/visualizar', $dados);
    }
	public function salvar(){
		$dados ['msg'] = '';
		$dados ['erro'] = '';

		if(!empty($this->input->post('titulo'))){
            $data['titulo'] = $this->input->post('titulo');
            $data['pontuacao'] = $this->input->post('pontuacao');
            $data['dataLimite'] = $this->input->post('dataLimite');
            $data['descricao'] = $this->input->post('descricao');

            $idBrinde = ($this->brinde->salvar($data));
            if(!empty($idBrinde)){
                //se tiver fotos ele faz todo o tratamento
                if(isset($_FILES['fotos'])) {
                    //pasta para upload da foto
                    $config['upload_path'] ='./uploads/img/';
                    //tipo de arquivo permitido
                    $config['allowed_types'] = 'gif|jpg|png';
                    //codificação do nome
                    $config['encrypt_name']  = TRUE;
                    //puxando biblioteca para fazer o upload
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('fotos')){
                        //se tiver dado um erro ele ira imprimir na tela
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                    else{
                        //se n der erro salvo o nome do arquivo na variavel
                        $img = $this->upload->data()['file_name'];
                        //redimencionar a imagem
                        $configImg['image_library'] = 'gd2';
                        $configImg['source_image'] = './uploads/img/'.$img;
                        $configImg['create_thumb'] = FALSE;
                        $configImg['maintain_ratio'] = TRUE;
                        $configImg['width']         = 500;
                        $configImg['height']       = 500;
                        $configImg['new_image'] = './uploads/pequenas/'.$img;;
                        $this->load->library('image_lib', $configImg);
                        $this->image_lib->resize();
                        if (!$this->image_lib->resize()) {
                            echo $this->image_lib->display_errors();
                        }
                    }
                }

                $imagem['url'] = $img;
                $imagem['idBrinde'] = $idBrinde;
                if(!empty($this->img->salvar($imagem))){
                    $dados ['msg'] = 'Brinde cadastrado com sucesso';
                }else{
                    $dados ['erro'] = 'Erro ao cadastrar o brinde';
                }
            }else{
                $dados ['erro'] = 'Erro ao cadastrar o brinde';
            }
        }
       $this->template->load('template', 'brinde/salvar', $dados);
	}
}